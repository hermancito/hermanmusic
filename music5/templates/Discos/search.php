<?php
echo $this->Html->script(array('addtocart.js'), array('inline'=>false));
//si la busqueda está vacía
if($ajax != 1){
?>
	<h1>Buscar artista o grupo</h1>
	<br>
	<div class="row">
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
        <?php
          echo $this->Form->button('Buscar', ['class'=>'button default']);
          echo $this->Form->end();
    
        ?>
      
      </div>
	</div>
	<br>
	<br>
<?php
}
?>

<?php 
if(!empty($search)){
	if(!empty($discos)){
?>
	<div class="row">
		<div class="large-12 columns">
	<?php foreach ($discos as $disco): ?>
		<div class="large-4 columns">
			<div class="panel" style="height:420px">
				<div class="media-object">
		 			<div class="media-object-section">
		    			<div class="thumbnail">
						<?
		                if(!empty(h($disco->portada))){
		                    echo $this->Html->image('../files/Discos/portada/' . h($disco->portada), ['alt' => 'portada disco', 'class'=>'portada']);
		                    //echo $this->Html->image(h($enventa->portada), array('alt' => 'portada disco'));
		                }else{
		                    h($disco->portada);
		                }
		                ?>
						</div>
		  			</div>
		  			<div class="media-object-section">
						<p><small><?= h($disco->name) ?></small></p>
						<p><?= h($disco->banda) ?></p>
						<?= $this->Html->link(__('Ver'), ['action' => 'view', $disco->id], ['class'=>'button tiny info']) ?>
						<p>Formato: <?= h($disco->formato) ?></p>
						<?php
						if(isset($current_user) && $current_user['role'] == "Administrador"){
							echo $this->Html->link(__('Editar'), ['action' => 'edit', $disco->id], ['class'=>'button tiny warning']);
						}
						if($disco->vta == 1){
							echo '<p>Disco en venta:'.$disco->precio.' €</p>';
							echo $this->Form->button('Agregar a carrito', ['class'=>'button tiny addtocart botonCarrito', 'id'=>$disco->id]);
						}
						
						?>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
	</div>
<?php
	}else{
?>

<?php
	}

?>
<?php
}
?>