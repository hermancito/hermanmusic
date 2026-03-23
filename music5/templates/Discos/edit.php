<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Disco $disco
 * @var string[]|\Cake\Collection\CollectionInterface $cdvarios
 * @var string[]|\Cake\Collection\CollectionInterface $clientes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $disco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $disco->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Discos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="discos form content">
            <?= $this->Form->create($disco) ?>
            <fieldset>
                <legend><?= __('Edit Disco') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('banda');
                    echo $this->Form->control('anyo');
                    echo $this->Form->control('copy');
                    echo $this->Form->control('formato');
                    echo $this->Form->control('portada');
                    echo $this->Form->control('portada_dir');
                    echo $this->Form->control('vta');
                    echo $this->Form->control('precio');
                    echo $this->Form->control('destacado');
                    echo $this->Form->control('coment');
                    echo $this->Form->control('reciente');
                    echo $this->Form->control('cdvarios._ids', ['options' => $cdvarios]);
                    echo $this->Form->control('clientes._ids', ['options' => $clientes]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
