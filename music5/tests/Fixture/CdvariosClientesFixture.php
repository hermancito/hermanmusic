<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CdvariosClientesFixture
 */
class CdvariosClientesFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'cdvario_id' => 1,
                'cliente_id' => 1,
                'pago' => 'Lorem ipsum dolor sit a',
                'finalizado' => 1,
                'created' => '2026-03-23 12:34:08',
                'modified' => '2026-03-23 12:34:08',
            ],
        ];
        parent::init();
    }
}
