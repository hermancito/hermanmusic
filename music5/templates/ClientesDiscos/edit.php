<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ClientesDisco $clientesDisco
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
                ['action' => 'delete', $clientesDisco->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $clientesDisco->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Clientes Discos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="clientesDiscos form content">
            <?= $this->Form->create($clientesDisco) ?>
            <fieldset>
                <legend><?= __('Edit Clientes Disco') ?></legend>
                <?php
                    echo $this->Form->control('cliente_id', ['options' => $clientes]);
                    echo $this->Form->control('disco_id', ['options' => $discos]);
                    echo $this->Form->control('pago');
                    echo $this->Form->control('finalizado');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
