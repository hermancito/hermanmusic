<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Artista Entity
 *
 * @property int $id
 * @property string $name
 * @property string $paise_id
 * @property string $coment
 * @property int $estilo_id
 *
 * @property \App\Model\Entity\Paise $paise
 * @property \App\Model\Entity\Estilo $estilo
 */
class Artista extends Entity
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
        'paise_id' => true,
        'coment' => true,
        'estilo_id' => true,
        'paise' => true,
        'estilo' => true,
    ];
}
