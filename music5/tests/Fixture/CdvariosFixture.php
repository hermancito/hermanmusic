<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CdvariosFixture
 */
class CdvariosFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit a',
                'user_id' => 1,
                'confirmado' => 1,
                'listarep' => 1,
            ],
        ];
        parent::init();
    }
}
