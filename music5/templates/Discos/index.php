<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Disco> $discos
 */
?>
<div class="discos index content">
    <?= $this->Html->link(__('New Disco'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Discos') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('banda') ?></th>
                    <th><?= $this->Paginator->sort('anyo') ?></th>
                    <th><?= $this->Paginator->sort('copy') ?></th>
                    <th><?= $this->Paginator->sort('formato') ?></th>
                    <th><?= $this->Paginator->sort('portada') ?></th>
                    <th><?= $this->Paginator->sort('portada_dir') ?></th>
                    <th><?= $this->Paginator->sort('vta') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th><?= $this->Paginator->sort('destacado') ?></th>
                    <th><?= $this->Paginator->sort('reciente') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($discos as $disco): ?>
                <tr>
                    <td><?= $this->Number->format($disco->id) ?></td>
                    <td><?= h($disco->name) ?></td>
                    <td><?= h($disco->banda) ?></td>
                    <td><?= h($disco->anyo) ?></td>
                    <td><?= h($disco->copy) ?></td>
                    <td><?= h($disco->formato) ?></td>
                    <td><?= h($disco->portada) ?></td>
                    <td><?= h($disco->portada_dir) ?></td>
                    <td><?= h($disco->vta) ?></td>
                    <td><?= $this->Number->format($disco->precio) ?></td>
                    <td><?= h($disco->destacado) ?></td>
                    <td><?= h($disco->reciente) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $disco->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $disco->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $disco->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $disco->id),
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