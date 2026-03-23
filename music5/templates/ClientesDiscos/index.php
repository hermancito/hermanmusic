<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ClientesDisco> $clientesDiscos
 */
?>
<div class="clientesDiscos index content">
    <?= $this->Html->link(__('New Clientes Disco'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Clientes Discos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('cliente_id') ?></th>
                    <th><?= $this->Paginator->sort('disco_id') ?></th>
                    <th><?= $this->Paginator->sort('pago') ?></th>
                    <th><?= $this->Paginator->sort('finalizado') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientesDiscos as $clientesDisco): ?>
                <tr>
                    <td><?= $this->Number->format($clientesDisco->id) ?></td>
                    <td><?= $clientesDisco->hasValue('cliente') ? $this->Html->link($clientesDisco->cliente->name, ['controller' => 'Clientes', 'action' => 'view', $clientesDisco->cliente->id]) : '' ?></td>
                    <td><?= $clientesDisco->hasValue('disco') ? $this->Html->link($clientesDisco->disco->name, ['controller' => 'Discos', 'action' => 'view', $clientesDisco->disco->id]) : '' ?></td>
                    <td><?= h($clientesDisco->pago) ?></td>
                    <td><?= h($clientesDisco->finalizado) ?></td>
                    <td><?= h($clientesDisco->created) ?></td>
                    <td><?= h($clientesDisco->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $clientesDisco->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $clientesDisco->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $clientesDisco->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $clientesDisco->id),
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