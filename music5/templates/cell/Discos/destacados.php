<?php
//ejecutamos el controlador de index de profesores 
//$destacados=$this->requestAction(['controller' => 'discos', 'action' => 'destacados']);
foreach($destacados as $destacado){
?>
<article>
	<div class="large-12 columns">
	<?php 
		echo $this->Html->image(h($destacado->portada), array('alt' => 'portada disco'));
	?>
	<p><?= h($destacado->name) ?></p>
    <p><?= h($destacado->banda) ?></p>
	</div>
</article>
<?php
}
?>