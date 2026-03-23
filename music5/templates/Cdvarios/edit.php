<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cdvario $cdvario
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $clientes
 * @var string[]|\Cake\Collection\CollectionInterface $discos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cdvario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cdvario->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cdvarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cdvarios form content">
            <?= $this->Form->create($cdvario) ?>
            <fieldset>
                <legend><?= __('Edit Cdvario') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('confirmado');
                    echo $this->Form->control('listarep');
                    echo $this->Form->control('clientes._ids', ['options' => $clientes]);
                    echo $this->Form->control('discos._ids', ['options' => $discos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
