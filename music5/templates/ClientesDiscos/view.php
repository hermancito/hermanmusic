<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientesDisco $clientesDisco
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Clientes Disco'), ['action' => 'edit', $clientesDisco->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Clientes Disco'), ['action' => 'delete', $clientesDisco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientesDisco->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Clientes Discos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Clientes Disco'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="clientesDiscos view content">
            <h3><?= h($clientesDisco->pago) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cliente') ?></th>
                    <td><?= $clientesDisco->hasValue('cliente') ? $this->Html->link($clientesDisco->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $clientesDisco->cliente->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Disco') ?></th>
                    <td><?= $clientesDisco->hasValue('disco') ? $this->Html->link($clientesDisco->disco->name, ['controller' => 'Discos', 'action' => 'view', $clientesDisco->disco->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pago') ?></th>
                    <td><?= h($clientesDisco->pago) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($clientesDisco->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($clientesDisco->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($clientesDisco->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Finalizado') ?></th>
                    <td><?= $clientesDisco->finalizado ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>