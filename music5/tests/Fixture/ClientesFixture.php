<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ClientesFixture
 */
class ClientesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'direcc' => 'Lorem ipsum dolor sit amet',
                'poblacion' => 'Lorem ipsum dolor sit amet',
                'provincia_id' => 1,
                'cp' => 'Lor',
                'nif' => 'Lorem i',
                'tfno' => 'Lorem i',
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-03-23 12:29:13',
                'modified' => '2026-03-23 12:29:13',
            ],
        ];
        parent::init();
    }
}
