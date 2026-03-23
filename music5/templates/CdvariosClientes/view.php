<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CdvariosCliente $cdvariosCliente
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cdvarios Cliente'), ['action' => 'edit', $cdvariosCliente->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cdvarios Cliente'), ['action' => 'delete', $cdvariosCliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cdvariosCliente->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cdvarios Clientes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cdvarios Cliente'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cdvariosClientes view content">
            <h3><?= h($cdvariosCliente->pago) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cdvario') ?></th>
                    <td><?= $cdvariosCliente->hasValue('cdvario') ? $this->Html->link($cdvariosCliente->cdvario->name, ['controller' => 'Cdvarios', 'action' => 'view', $cdvariosCliente->cdvario->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cliente') ?></th>
                    <td><?= $cdvariosCliente->hasValue('cliente') ? $this->Html->link($cdvariosCliente->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $cdvariosCliente->cliente->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Pago') ?></th>
                    <td><?= h($cdvariosCliente->pago) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cdvariosCliente->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($cdvariosCliente->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($cdvariosCliente->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Finalizado') ?></th>
                    <td><?= $cdvariosCliente->finalizado ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>