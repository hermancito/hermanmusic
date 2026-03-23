<?php
//ejecutamos el controlador de index de profesores 
$stars=$this->requestAction('/discos/destacados');
$destacados = json_decode($stars, true);
//echo var_dump($stars);
//echo var_dump($destacados);
foreach($destacados as $destacado){

?>
<article>
	<div class="large-12 columns">
		<div class="panel">
			<?php
			//echo $this->Html->image('../files/discos/portada/' . h($destacado['portada_dir']) . '/portrait_' . h($destacado['portada']), ['class'=>'portada']); 
			echo $this->Html->link(
			    $this->Html->image('../files/discos/portada/' . h($destacado['portada_dir']) . '/portrait_' . h($destacado['portada']), ['class'=>'portada'], ["alt" => "Brownies"]), ['controller'=>'discos', 'action' => 'view', $destacado['id']],
			    ['escape' => false]
			);
			?>
			<p><small><?= $this->Html->link(h($destacado['name']), ['controller'=>'discos', 'action' => 'view', $destacado['id']], ['class'=>'enlacenaranja']) ?></small></p>
			<p><?= h($destacado['banda']) ?></p>
		</div>
	</div>
</article>
<?php
}
?>