<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cdvario> $cdvarios
 */
?>
<div class="cdvarios index content">
    <?= $this->Html->link(__('New Cdvario'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cdvarios') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('confirmado') ?></th>
                    <th><?= $this->Paginator->sort('listarep') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cdvarios as $cdvario): ?>
                <tr>
                    <td><?= $this->Number->format($cdvario->id) ?></td>
                    <td><?= h($cdvario->name) ?></td>
                    <td><?= $cdvario->hasValue('user') ? $this->Html->link($cdvario->user->name, ['controller' => 'Users', 'action' => 'view', $cdvario->user->id]) : '' ?></td>
                    <td><?= h($cdvario->confirmado) ?></td>
                    <td><?= h($cdvario->listarep) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cdvario->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cdvario->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $cdvario->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $cdvario->id),
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