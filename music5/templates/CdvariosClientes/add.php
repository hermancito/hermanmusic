<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CdvariosCliente $cdvariosCliente
 * @var \Cake\Collection\CollectionInterface|string[] $cdvarios
 * @var \Cake\Collection\CollectionInterface|string[] $clientes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cdvarios Clientes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cdvariosClientes form content">
            <?= $this->Form->create($cdvariosCliente) ?>
            <fieldset>
                <legend><?= __('Add Cdvarios Cliente') ?></legend>
                <?php
                    echo $this->Form->control('cdvario_id', ['options' => $cdvarios]);
                    echo $this->Form->control('cliente_id', ['options' => $clientes]);
                    echo $this->Form->control('pago');
                    echo $this->Form->control('finalizado');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
