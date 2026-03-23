<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CdvariosDisco $cdvariosDisco
 * @var string[]|\Cake\Collection\CollectionInterface $cdvarios
 * @var string[]|\Cake\Collection\CollectionInterface $discos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cdvariosDisco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cdvariosDisco->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cdvarios Discos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cdvariosDiscos form content">
            <?= $this->Form->create($cdvariosDisco) ?>
            <fieldset>
                <legend><?= __('Edit Cdvarios Disco') ?></legend>
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
