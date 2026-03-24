<?php
$identity = $this->request->getAttribute('identity');
$current_user = $identity ? $identity->toArray() : null;
?>

<div class="fixed">
<nav class="top-bar" role="navigation">
<ul class="title-area">
    <li class="name">
        <h1>
            <?= $this->Html->link('Inicio', ['controller' => 'Pages', 'action' => 'display', 'home']) ?>
        </h1>
    </li>
</ul>

<section class="top-bar-section">
<ul class="left">

<li class="has-dropdown">
    <a href="#">Discoteca</a>
    <ul class="dropdown">
        <li><?= $this->Html->link('Artistas', ['controller'=>'Artistas','action'=>'index']) ?></li>
        <li><?= $this->Html->link('Discos', ['controller'=>'Discos','action'=>'index']) ?></li>
        <li><?= $this->Html->link('Discos Destacados', ['controller'=>'Discos','action'=>'discosdestacados']) ?></li>
        <li><?= $this->Html->link('Discos Recientes', ['controller'=>'Discos','action'=>'discosrecientes']) ?></li>
        <li><?= $this->Html->link('Estilos', ['controller'=>'Estilos','action'=>'index']) ?></li>
    </ul>
</li>

<li><?= $this->Html->link('Tienda', ['controller'=>'Discos','action'=>'tienda']) ?></li>

<li><?= $this->Html->link('Conciertos', ['controller'=>'Pages','action'=>'display','conciertos']) ?></li>

<?php if ($current_user): ?>
<li class="has-dropdown">
    <a href="#">Listas de reproducción</a>
    <ul class="dropdown">
        <li><?= $this->Html->link('Lista de Herman', ['controller'=>'Pages','action'=>'display','jplayer1']) ?></li>
        <li><?= $this->Html->link('Podcast Radio 3', ['controller'=>'Pages','action'=>'display','podcast']) ?></li>
        <li><?= $this->Html->link('Listas solicitadas', ['controller'=>'Cdvarios','action'=>'indexlistas', $current_user['id']]) ?></li>
    </ul>
</li>
<?php endif; ?>

<li>
<?php
if ($current_user && $current_user['role'] === 'Administrador') {
    echo $this->Html->link('CDs de varios', ['controller'=>'Cdvarios','action'=>'index']);
} elseif ($current_user && $current_user['role'] === 'Usuario') {
    echo $this->Html->link('Tus CD de varios', ['controller'=>'Cdvarios','action'=>'indexuser', $current_user['id']]);
}
?>
</li>

<li class="active">
<?php
if ($current_user && $current_user['role'] === 'Usuario') {
    echo $this->Html->link(
        'Perfil ' . $current_user['name'],
        ['controller'=>'Users','action'=>'view', $current_user['id']]
    );
} else {
    echo $this->Html->link('Acceso usuarios', ['controller'=>'Users','action'=>'login']);
}
?>
</li>

<li>
<?= $this->Html->image('carrito_blanco.png', [
    'alt' => 'Carrito',
    'url' => ['controller' => 'Discos', 'action' => 'carrito']
]) ?>
</li>

<li>
<?php if ($current_user): ?>
    <?= $this->Html->link('SALIR', ['controller'=>'Users','action'=>'logout']) ?>
<?php endif; ?>
</li>

<li class="search">
<div class="row collapse postfix-round">
<div class="small-9 columns">
<?= $this->Form->create(null, [
    'type'=>'get',
    'url'=>['controller'=>'Discos', 'action'=>'search']
]) ?>

<?= $this->Form->control('search', [
    'type'=>'search',
    'label'=>false,
    'class'=>'s',
    'placeholder'=>'Buscar artista o grupo'
]) ?>
</div>

<div class="small-3 columns">
<?= $this->Form->button('Buscar', ['class'=>'small button tiny']) ?>
<?= $this->Form->end() ?>
</div>
</div>
</li>

</ul>

<?php if ($current_user && $current_user['role'] === 'Administrador'): ?>
<ul class="right">
<li class="has-dropdown">
    <a href="#">Admin</a>
    <ul class="dropdown">
        <li><?= $this->Html->link('Usuarios', ['controller'=>'Users','action'=>'index']) ?></li>
        <li><?= $this->Html->link('Comentarios', ['controller'=>'Comentarios','action'=>'index']) ?></li>
        <li><?= $this->Html->link('Compras CD varios', ['controller'=>'CdvariosClientes','action'=>'index']) ?></li>
        <li><?= $this->Html->link('Clientes', ['controller'=>'Clientes','action'=>'index']) ?></li>
        <li><?= $this->Html->link('Compras CDs', ['controller'=>'ClientesDiscos','action'=>'index']) ?></li>
    </ul>
</li>
</ul>
<?php endif; ?>

</section>
</nav>
</div>