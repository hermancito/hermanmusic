<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cdvario Entity
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property bool $confirmado
 * @property bool $listarep
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Cliente[] $clientes
 * @property \App\Model\Entity\Disco[] $discos
 */
class Cdvario extends Entity
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
        'user_id' => true,
        'confirmado' => true,
        'listarep' => true,
        'user' => true,
        'clientes' => true,
        'discos' => true,
    ];
}
