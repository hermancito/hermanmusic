<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artista $artista
 * @var \Cake\Collection\CollectionInterface|string[] $paises
 * @var \Cake\Collection\CollectionInterface|string[] $estilos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Artistas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="artistas form content">
            <?= $this->Form->create($artista) ?>
            <fieldset>
                <legend><?= __('Add Artista') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('paise_id', ['options' => $paises]);
                    echo $this->Form->control('coment');
                    echo $this->Form->control('estilo_id', ['options' => $estilos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
