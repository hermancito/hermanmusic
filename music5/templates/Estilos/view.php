<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estilo $estilo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Estilo'), ['action' => 'edit', $estilo->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Estilo'), ['action' => 'delete', $estilo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estilo->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Estilos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Estilo'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="estilos view content">
            <h3><?= h($estilo->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($estilo->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Imagen') ?></th>
                    <td><?= h($estilo->imagen) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($estilo->id) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Artistas') ?></h4>
                <?php if (!empty($estilo->artistas)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Paise Id') ?></th>
                            <th><?= __('Coment') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($estilo->artistas as $artista) : ?>
                        <tr>
                            <td><?= h($artista->id) ?></td>
                            <td><?= h($artista->name) ?></td>
                            <td><?= h($artista->paise_id) ?></td>
                            <td><?= h($artista->coment) ?></td>
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