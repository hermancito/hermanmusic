<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Disco Entity
 *
 * @property int $id
 * @property string $name
 * @property string $banda
 * @property string $anyo
 * @property string $copy
 * @property string $formato
 * @property string $portada
 * @property string $portada_dir
 * @property bool $vta
 * @property int $precio
 * @property bool $destacado
 * @property string $coment
 * @property bool $reciente
 *
 * @property \App\Model\Entity\Song[] $songs
 * @property \App\Model\Entity\Cdvario[] $cdvarios
 * @property \App\Model\Entity\Cliente[] $clientes
 */
class Disco extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'banda' => true,
        'anyo' => true,
        'copy' => true,
        'formato' => true,
        'portada' => true,
        'portada_dir' => true,
        'vta' => true,
        'precio' => true,
        'destacado' => true,
        'coment' => true,
        'reciente' => true,
        'songs' => true,
        'cdvarios' => true,
        'clientes' => true,
    ];
}
