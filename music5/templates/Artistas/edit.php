<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Artista $artista
 * @var string[]|\Cake\Collection\CollectionInterface $paises
 * @var string[]|\Cake\Collection\CollectionInterface $estilos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $artista->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $artista->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Artistas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="artistas form content">
            <?= $this->Form->create($artista) ?>
            <fieldset>
                <legend><?= __('Edit Artista') ?></legend>
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
