<?php
declare(strict_types=1);

namespace App;

use Cake\Core\Configure;
use Cake\Core\ContainerInterface;
use Cake\Datasource\FactoryLocator;
use Cake\ORM\Locator\TableLocator;
use Cake\Event\EventManagerInterface;
use Cake\Http\BaseApplication;
use Cake\Http\MiddlewareQueue;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Cake\Error\Middleware\ErrorHandlerMiddleware;

use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Identifier\AbstractIdentifier;
use Authentication\Identifier\PasswordIdentifier;
use Authentication\Middleware\AuthenticationMiddleware;
use Cake\Routing\Router;
use Psr\Http\Message\ServerRequestInterface;

class Application extends BaseApplication implements AuthenticationServiceProviderInterface
{
    public function bootstrap(): void
    {
        parent::bootstrap();

        // Evitar fallback para tablas que no existan
        FactoryLocator::add('Table', (new TableLocator())->allowFallbackClass(false));
    }

    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue->add(new ErrorHandlerMiddleware(Configure::read('Error')))
            // Other middleware that CakePHP provides.
            ->add(new AssetMiddleware())
            ->add(new RoutingMiddleware($this))
            ->add(new BodyParserMiddleware())

            // Add the AuthenticationMiddleware. It should be
            // after routing and body parser.
            ->add(new AuthenticationMiddleware($this));

        return $middlewareQueue;
    }

    public function services(ContainerInterface $container): void
    {
        // Si quieres inyección de dependencias en tablas
    }

    public function events(EventManagerInterface $eventManager): EventManagerInterface
    {
        return $eventManager;
    }

    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $service = new AuthenticationService();

        // Define dónde redirigir si no está autenticado
        $service->setConfig([
            'unauthenticatedRedirect' => [
                'prefix' => false,
                'plugin' => false,
                'controller' => 'Users',
                'action' => 'login',
            ],
            'queryParam' => 'redirect',
        ]);

        // Campos de login
        $fields = [
            'username' => 'username',
            'password' => 'password',
        ];

        // Load the authenticators. Session should be first.
        $service->loadAuthenticator('Authentication.Session');
        $service->loadAuthenticator('Authentication.Form', [
            'fields' => $fields,
            'loginUrl' => Router::url([
                'prefix' => false,
                'plugin' => null,
                'controller' => 'Users',
                'action' => 'login',
            ]),
            'identifiers' => [
                PasswordIdentifier::class => ['fields' => $fields],
            ],
        ]);

        return $service;
    }
}