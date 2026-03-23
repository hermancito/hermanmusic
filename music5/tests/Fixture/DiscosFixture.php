<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DiscosFixture
 */
class DiscosFixture extends TestFixture
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
                'banda' => 'Lorem ipsum dolor sit amet',
                'anyo' => '',
                'copy' => 'Lorem ip',
                'formato' => 'Lorem ip',
                'portada' => 'Lorem ipsum dolor sit amet',
                'portada_dir' => 'Lorem ipsum dolor sit amet',
                'vta' => 1,
                'precio' => 1,
                'destacado' => 1,
                'coment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'reciente' => 1,
            ],
        ];
        parent::init();
    }
}
