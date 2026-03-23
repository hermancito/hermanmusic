<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaisesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaisesTable Test Case
 */
class PaisesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PaisesTable
     */
    protected $Paises;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Paises',
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
        $config = $this->getTableLocator()->exists('Paises') ? [] : ['className' => PaisesTable::class];
        $this->Paises = $this->getTableLocator()->get('Paises', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Paises);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\PaisesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
