<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CdvariosDiscosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CdvariosDiscosTable Test Case
 */
class CdvariosDiscosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CdvariosDiscosTable
     */
    protected $CdvariosDiscos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.CdvariosDiscos',
        'app.Cdvarios',
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
        $config = $this->getTableLocator()->exists('CdvariosDiscos') ? [] : ['className' => CdvariosDiscosTable::class];
        $this->CdvariosDiscos = $this->getTableLocator()->get('CdvariosDiscos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CdvariosDiscos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\CdvariosDiscosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\CdvariosDiscosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
