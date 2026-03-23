<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CdvariosDisco $cdvariosDisco
 * @var \Cake\Collection\CollectionInterface|string[] $cdvarios
 * @var \Cake\Collection\CollectionInterface|string[] $discos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cdvarios Discos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cdvariosDiscos form content">
            <?= $this->Form->create($cdvariosDisco) ?>
            <fieldset>
                <legend><?= __('Add Cdvarios Disco') ?></legend>
                <?php
                    echo $this->Form->control('cdvario_id', ['options' => $cdvarios]);
                    echo $this->Form->control('disco_id', ['options' => $discos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
