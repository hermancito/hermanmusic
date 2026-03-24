<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Collection\Collection;

/**
 * Discos cell
 */
class DiscosCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array<string, mixed>
     */
    protected array $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize(): void
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
    }

    public function destacados()
    {
        $query = $this->fetchTable('Discos')
            ->find()
            ->where(['destacado' => 1]);

        $destacados = $query->all();

        $collection = new Collection($destacados);
        $destacados = $collection->sample(5);

        $this->set(compact('destacados'));
    }

    public function ultimos()
    {
        $query = $this->fetchTable('Discos')
            ->find()
            ->where(['reciente' => 1]);

        $ultimos = $query->all();

        $collection = new Collection($ultimos);
        $ultimos = $collection->sample(6);

        $this->set(compact('ultimos'));
    }
}
