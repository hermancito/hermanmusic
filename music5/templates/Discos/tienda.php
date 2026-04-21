<div class="large-12 columns">
	<h2>La tienda de Herman</h2>
	
</div>
<div class="large-12 columns">
	<?php foreach ($enventas as $enventa): ?>
		<div class="large-4 columns">
			<div class="panel" style="height:420px">
				<div class="media-object">
		 			<div class="media-object-section">
		    			<div class="thumbnail">
						<?php
		                if(!empty(h($enventa->portada))){
		                    echo $this->Html->image('../files/Discos/portada/' . h($enventa->portada), ['class'=>'portada'], ["alt" => $enventa->name]);
		                }else{
		                    h($enventa->portada);
		                }
		                ?>
						</div>
		  			</div>
		  			<div class="media-object-section">
						<p><small><?= h($enventa->name) ?></small></p>
						<p><?= h($enventa->banda) ?></p>
						<p>Formato: <?= h($enventa->formato) ?></p>
						<p>Precio: <?= h($enventa->precio) ?> €</p>
						<?php 
						echo $this->Form->button('Agregar a carrito', ['class'=>'button tiny alert addtocart botonCarrito', 'id'=>$enventa->id]);
						?>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
<script>
$(document).ready(function(){
	$('.addtocart').on('click', function(event){
		$.ajax({
			type: "POST",
			url: basePath+"discos/addisco",
			data:{
				id:$(this).attr("id"),
				cantidad: 1
			},
			dataType: "html",
			success: function(data){
				$('#msg').html('<div class="alert-box success">Disco agregado al carrito</div>');
				$('.flash-msg').delay(2000).fadeOut('slow');
			},
			error: function(){
			 	alert('Tenemos problemas!!');
			}
		});
		return false;
	});

	
});
</script>