<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Comentario> $comentarios
 */
?>
<div class="comentarios index content">
    <?= $this->Html->link(__('New Comentario'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Comentarios') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comentarios as $comentario): ?>
                <tr>
                    <td><?= $this->Number->format($comentario->id) ?></td>
                    <td><?= $comentario->hasValue('user') ? $this->Html->link($comentario->user->name, ['controller' => 'Users', 'action' => 'view', $comentario->user->id]) : '' ?></td>
                    <td><?= h($comentario->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $comentario->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comentario->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $comentario->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $comentario->id),
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