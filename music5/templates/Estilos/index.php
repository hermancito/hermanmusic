<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Estilo> $estilos
 */
?>
<div class="estilos index content">
    <?= $this->Html->link(__('New Estilo'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Estilos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('imagen') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($estilos as $estilo): ?>
                <tr>
                    <td><?= $this->Number->format($estilo->id) ?></td>
                    <td><?= h($estilo->name) ?></td>
                    <td><?= h($estilo->imagen) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $estilo->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estilo->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $estilo->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $estilo->id),
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