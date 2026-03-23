<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artista $artista
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Artista'), ['action' => 'edit', $artista->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Artista'), ['action' => 'delete', $artista->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artista->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Artistas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Artista'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="artistas view content">
            <h3><?= h($artista->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($artista->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Paise') ?></th>
                    <td><?= $artista->hasValue('paise') ? $this->Html->link($artista->paise->name, ['controller' => 'Paises', 'action' => 'view', $artista->paise->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Estilo') ?></th>
                    <td><?= $artista->hasValue('estilo') ? $this->Html->link($artista->estilo->name, ['controller' => 'Estilos', 'action' => 'view', $artista->estilo->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($artista->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Coment') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($artista->coment)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>