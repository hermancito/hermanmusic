<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CdvariosClientesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CdvariosClientesTable Test Case
 */
class CdvariosClientesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CdvariosClientesTable
     */
    protected $CdvariosClientes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.CdvariosClientes',
        'app.Cdvarios',
        'app.Clientes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CdvariosClientes') ? [] : ['className' => CdvariosClientesTable::class];
        $this->CdvariosClientes = $this->getTableLocator()->get('CdvariosClientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CdvariosClientes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\CdvariosClientesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\CdvariosClientesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
