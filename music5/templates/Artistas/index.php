<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Artista> $artistas
 */
?>
<div class="artistas index content">
    <?= $this->Html->link(__('New Artista'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Artistas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('paise_id') ?></th>
                    <th><?= $this->Paginator->sort('estilo_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($artistas as $artista): ?>
                <tr>
                    <td><?= $this->Number->format($artista->id) ?></td>
                    <td><?= h($artista->name) ?></td>
                    <td><?= $artista->hasValue('paise') ? $this->Html->link($artista->paise->name, ['controller' => 'Paises', 'action' => 'view', $artista->paise->id]) : '' ?></td>
                    <td><?= $artista->hasValue('estilo') ? $this->Html->link($artista->estilo->name, ['controller' => 'Estilos', 'action' => 'view', $artista->estilo->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $artista->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $artista->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $artista->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $artista->id),
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