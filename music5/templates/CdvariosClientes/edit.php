<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CdvariosCliente $cdvariosCliente
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
                ['action' => 'delete', $cdvariosCliente->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cdvariosCliente->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cdvarios Clientes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cdvariosClientes form content">
            <?= $this->Form->create($cdvariosCliente) ?>
            <fieldset>
                <legend><?= __('Edit Cdvarios Cliente') ?></legend>
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
