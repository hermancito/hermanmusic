<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cdvario $cdvario
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $clientes
 * @var \Cake\Collection\CollectionInterface|string[] $discos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cdvarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cdvarios form content">
            <?= $this->Form->create($cdvario) ?>
            <fieldset>
                <legend><?= __('Add Cdvario') ?></legend>
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
