<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Song $song
 * @var string[]|\Cake\Collection\CollectionInterface $discos
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $song->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $song->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Songs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="songs form content">
            <?= $this->Form->create($song) ?>
            <fieldset>
                <legend><?= __('Edit Song') ?></legend>
                <?php
                    echo $this->Form->control('titulo');
                    echo $this->Form->control('letra');
                    echo $this->Form->control('disco_id', ['options' => $discos]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
