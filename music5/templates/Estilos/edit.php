<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estilo $estilo
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $estilo->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $estilo->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Estilos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="estilos form content">
            <?= $this->Form->create($estilo) ?>
            <fieldset>
                <legend><?= __('Edit Estilo') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('imagen');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
