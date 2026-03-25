<div class="large-12 columns">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Por favor, introduce tu e-mail y contraseña') ?></legend>
        <?= $this->Form->control('username', ['label' => 'E-mail']) ?>
        <?= $this->Form->control('password', ['label' => 'Contraseña']) ?>
    </fieldset>
<?= $this->Form->button(__('Entrar')); ?>
<?= $this->Html->link('   He olvidado la contraseña', ['action'=>'olvidopass']) ?>
<?= $this->Form->end() ?>
<?php 
    echo $this->Html->link('Registro nuevo usuario', array(
        'controller'=>'users',
        'action'=>'add'),
        array('class'=>'button')); 
?>

</div>