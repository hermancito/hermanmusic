<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Song $song
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Song'), ['action' => 'edit', $song->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Song'), ['action' => 'delete', $song->id], ['confirm' => __('Are you sure you want to delete # {0}?', $song->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Song'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="songs view content">
            <h3><?= h($song->titulo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Titulo') ?></th>
                    <td><?= h($song->titulo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Disco') ?></th>
                    <td><?= $song->hasValue('disco') ? $this->Html->link($song->disco->name, ['controller' => 'Discos', 'action' => 'view', $song->disco->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($song->id) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Letra') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($song->letra)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>