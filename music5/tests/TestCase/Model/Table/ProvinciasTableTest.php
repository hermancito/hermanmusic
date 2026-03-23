<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProvinciasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProvinciasTable Test Case
 */
class ProvinciasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProvinciasTable
     */
    protected $Provincias;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Provincias',
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
        $config = $this->getTableLocator()->exists('Provincias') ? [] : ['className' => ProvinciasTable::class];
        $this->Provincias = $this->getTableLocator()->get('Provincias', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Provincias);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ProvinciasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
