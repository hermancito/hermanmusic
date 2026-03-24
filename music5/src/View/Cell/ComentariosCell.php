<?php
declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;
use Cake\Collection\Collection;
/**
 * Comentarios cell
 */
class ComentariosCell extends Cell
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

    public function coments()
    {
        $query=$this->fetchTable('Comentarios')
            ->find('all', ['contain'=>['Users'], 'limit'=>4]);

        $comentarios = $query->all();

        $collection = new Collection($comentarios);
        $comentarios = $collection->sample(6);

        $this->set(compact('comentarios'));
            
               
    }
}
