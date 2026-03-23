<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClientesDiscosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClientesDiscosTable Test Case
 */
class ClientesDiscosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClientesDiscosTable
     */
    protected $ClientesDiscos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.ClientesDiscos',
        'app.Clientes',
        'app.Discos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ClientesDiscos') ? [] : ['className' => ClientesDiscosTable::class];
        $this->ClientesDiscos = $this->getTableLocator()->get('ClientesDiscos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ClientesDiscos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ClientesDiscosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ClientesDiscosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
