<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CdvariosCliente Entity
 *
 * @property int $id
 * @property int $cdvario_id
 * @property int $cliente_id
 * @property string $pago
 * @property bool $finalizado
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Cdvario $cdvario
 * @property \App\Model\Entity\Cliente $cliente
 */
class CdvariosCliente extends Entity
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
        'cdvario_id' => true,
        'cliente_id' => true,
        'pago' => true,
        'finalizado' => true,
        'created' => true,
        'modified' => true,
        'cdvario' => true,
        'cliente' => true,
    ];
}
