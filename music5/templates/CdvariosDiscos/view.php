<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CdvariosDisco $cdvariosDisco
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cdvarios Disco'), ['action' => 'edit', $cdvariosDisco->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cdvarios Disco'), ['action' => 'delete', $cdvariosDisco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cdvariosDisco->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cdvarios Discos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cdvarios Disco'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cdvariosDiscos view content">
            <h3><?= h($cdvariosDisco->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Cdvario') ?></th>
                    <td><?= $cdvariosDisco->hasValue('cdvario') ? $this->Html->link($cdvariosDisco->cdvario->name, ['controller' => 'Cdvarios', 'action' => 'view', $cdvariosDisco->cdvario->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Disco') ?></th>
                    <td><?= $cdvariosDisco->hasValue('disco') ? $this->Html->link($cdvariosDisco->disco->name, ['controller' => 'Discos', 'action' => 'view', $cdvariosDisco->disco->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cdvariosDisco->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>