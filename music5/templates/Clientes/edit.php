<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 * @var string[]|\Cake\Collection\CollectionInterface $provincias
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
                ['action' => 'delete', $cliente->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Clientes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="clientes form content">
            <?= $this->Form->create($cliente) ?>
            <fieldset>
                <legend><?= __('Edit Cliente') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('last_name');
                    echo $this->Form->control('direcc');
                    echo $this->Form->control('poblacion');
                    echo $this->Form->control('provincia_id', ['options' => $provincias]);
                    echo $this->Form->control('cp');
                    echo $this->Form->control('nif');
                    echo $this->Form->control('tfno');
                    echo $this->Form->control('email');
                    echo $this->Form->control('cdvarios._ids', ['options' => $cdvarios]);
                    echo $this->Form->control('discos._ids', ['options' => $discos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
