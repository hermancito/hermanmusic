<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comentario $comentario
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Comentario'), ['action' => 'edit', $comentario->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Comentario'), ['action' => 'delete', $comentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comentario->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Comentarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Comentario'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="comentarios view content">
            <h3><?= h($comentario->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $comentario->hasValue('user') ? $this->Html->link($comentario->user->name, ['controller' => 'Users', 'action' => 'view', $comentario->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($comentario->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($comentario->created) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Coment') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($comentario->coment)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>