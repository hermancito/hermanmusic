<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CdvariosCliente> $cdvariosClientes
 */
?>
<div class="cdvariosClientes index content">
    <?= $this->Html->link(__('New Cdvarios Cliente'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cdvarios Clientes') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cdvario_id') ?></th>
                    <th><?= $this->Paginator->sort('cliente_id') ?></th>
                    <th><?= $this->Paginator->sort('pago') ?></th>
                    <th><?= $this->Paginator->sort('finalizado') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cdvariosClientes as $cdvariosCliente): ?>
                <tr>
                    <td><?= $this->Number->format($cdvariosCliente->id) ?></td>
                    <td><?= $cdvariosCliente->hasValue('cdvario') ? $this->Html->link($cdvariosCliente->cdvario->name, ['controller' => 'Cdvarios', 'action' => 'view', $cdvariosCliente->cdvario->id]) : '' ?></td>
                    <td><?= $cdvariosCliente->hasValue('cliente') ? $this->Html->link($cdvariosCliente->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $cdvariosCliente->cliente->id]) : '' ?></td>
                    <td><?= h($cdvariosCliente->pago) ?></td>
                    <td><?= h($cdvariosCliente->finalizado) ?></td>
                    <td><?= h($cdvariosCliente->created) ?></td>
                    <td><?= h($cdvariosCliente->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cdvariosCliente->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cdvariosCliente->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $cdvariosCliente->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $cdvariosCliente->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>