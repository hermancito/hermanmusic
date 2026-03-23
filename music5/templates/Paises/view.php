<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Paise $paise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Paise'), ['action' => 'edit', $paise->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Paise'), ['action' => 'delete', $paise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paise->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Paises'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Paise'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="paises view content">
            <h3><?= h($paise->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($paise->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($paise->name) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Artistas') ?></h4>
                <?php if (!empty($paise->artistas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Coment') ?></th>
                            <th><?= __('Estilo Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($paise->artistas as $artista) : ?>
                        <tr>
                            <td><?= h($artista->id) ?></td>
                            <td><?= h($artista->name) ?></td>
                            <td><?= h($artista->coment) ?></td>
                            <td><?= h($artista->estilo_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Artistas', 'action' => 'view', $artista->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Artistas', 'action' => 'edit', $artista->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Artistas', 'action' => 'delete', $artista->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $artista->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>