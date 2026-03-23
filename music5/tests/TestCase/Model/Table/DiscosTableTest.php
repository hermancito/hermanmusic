<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiscosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiscosTable Test Case
 */
class DiscosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiscosTable
     */
    protected $Discos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Discos',
        'app.Songs',
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
        $config = $this->getTableLocator()->exists('Discos') ? [] : ['className' => DiscosTable::class];
        $this->Discos = $this->getTableLocator()->get('Discos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Discos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\DiscosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
