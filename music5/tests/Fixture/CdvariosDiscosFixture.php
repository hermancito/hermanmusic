<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CdvariosDiscosFixture
 */
class CdvariosDiscosFixture extends TestFixture
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
                'disco_id' => 1,
            ],
        ];
        parent::init();
    }
}
