<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cliente Entity
 *
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $direcc
 * @property string $poblacion
 * @property int $provincia_id
 * @property string $cp
 * @property string $nif
 * @property string $tfno
 * @property string $email
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Provincia $provincia
 * @property \App\Model\Entity\Cdvario[] $cdvarios
 * @property \App\Model\Entity\Disco[] $discos
 */
class Cliente extends Entity
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
        'last_name' => true,
        'direcc' => true,
        'poblacion' => true,
        'provincia_id' => true,
        'cp' => true,
        'nif' => true,
        'tfno' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'provincia' => true,
        'cdvarios' => true,
        'discos' => true,
    ];
}
