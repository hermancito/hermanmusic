<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstilosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstilosTable Test Case
 */
class EstilosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstilosTable
     */
    protected $Estilos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Estilos',
        'app.Artistas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Estilos') ? [] : ['className' => EstilosTable::class];
        $this->Estilos = $this->getTableLocator()->get('Estilos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Estilos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\EstilosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
