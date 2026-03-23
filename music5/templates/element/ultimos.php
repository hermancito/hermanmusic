<?php
//ejecutamos el controlador de index de profesores 
$stars=$this->requestAction('/discos/ultimos');
$ultimos = json_decode($stars, true);
//echo var_dump($stars);
//echo var_dump($destacados);
foreach($ultimos as $ultimo){

?>
<article>
	<div class="large-6 columns">
		<div class="panel">
		<div class="media-object">
		  <div class="media-object-section">
		    <div class="thumbnail">
		    <?php 
			//echo $this->Html->image('../files/discos/portada/' . h($ultimo['portada_dir']) . '/portrait_' . h($ultimo['portada']), ['class'=>'portada']);
			echo $this->Html->link(
			    $this->Html->image('../files/discos/portada/' . h($ultimo['portada_dir']) . '/portrait_' . h($ultimo['portada']), ['class'=>'portada'], ["alt" => $ultimo['name']]), ['controller'=>'discos', 'action' => 'view', $ultimo['id']],
			    ['escape' => false]
			);
			?>
		    </div>
		  </div>
		  <div class="media-object-section">
		    <p><small><?= h($ultimo['banda']) ?></small></p>
		    <p><small><?= $this->Html->link(h($ultimo['name']), ['controller'=>'discos', 'action' => 'view', $ultimo['id']], ['class'=>'enlacenaranja']) ?></small></p>
		  </div>
		</div>
		</div>
	</div>
	
</article>
<?php
}
?>