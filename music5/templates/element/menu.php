<?php
$user = $this->request->getAttribute('identity');
?>

<div class="fixed">
<nav class="top-bar">

<ul>
<li>
<?= $this->Html->link('Inicio', ['controller' => 'Pages', 'action' => 'display', 'home']) ?>
</li>

<li>
<?= $this->Html->link('Tienda', ['controller'=>'Discos','action'=>'tienda']) ?>
</li>

<li>
<?= $this->Html->link('Conciertos', ['controller'=>'Pages','action'=>'display','conciertos']) ?>
</li>

<?php if ($user): ?>

<li>
<?= $this->Html->link(
    'Perfil ' . h($user->name),
    ['controller'=>'Users','action'=>'view', $user->id]
) ?>
</li>

<li>
<?= $this->Html->link('Salir', ['controller'=>'Users','action'=>'logout']) ?>
</li>

<?php else: ?>

<li>
<?= $this->Html->link('Login', ['controller'=>'Users','action'=>'login']) ?>
</li>

<li>
<?= $this->Html->link('Registro', ['controller'=>'Users','action'=>'add']) ?>
</li>

<?php endif; ?>

</ul>

<!-- BUSCADOR -->
<div>

<?= $this->Form->create(null, [
    'type' => 'get',
    'url' => ['controller'=>'Discos','action'=>'search']
]) ?>

<?= $this->Form->control('search', [
    'label' => false,
    'placeholder' => 'Buscar...',
]) ?>

<?= $this->Form->button('Buscar') ?>

<?= $this->Form->end() ?>

</div>

</nav>
</div>