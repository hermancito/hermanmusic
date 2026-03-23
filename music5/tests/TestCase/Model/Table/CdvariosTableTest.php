<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CdvariosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CdvariosTable Test Case
 */
class CdvariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CdvariosTable
     */
    protected $Cdvarios;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Cdvarios',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('Cdvarios') ? [] : ['className' => CdvariosTable::class];
        $this->Cdvarios = $this->getTableLocator()->get('Cdvarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cdvarios);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\CdvariosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\CdvariosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
