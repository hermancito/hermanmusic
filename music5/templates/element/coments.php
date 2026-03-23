<?php
//ejecutamos coments del controlador de comentarios 
$stars=$this->requestAction('/comentarios/coments');
$coments = json_decode($stars, true);
//echo var_dump($stars);
//echo var_dump($destacados);
foreach($coments as $comentario){

?>
<article>
	<div class="large-12 columns">
		<p><b><?= h($comentario['user']['name']) ?></b></p>
		<p><?= h($comentario['coment']) ?></p>
		<p><small><?= h($comentario['created']) ?></small></p>
	</div>
</article>
<hr>
<?php
}
?>
<article>
	<div class="large-12 columns">
		<div class="panel">
		<h4>Envianos tus comentarios</h4>
		<?php
		if(isset($current_user)){ 
            //echo $this->element('addcoments');
            echo $this->Html->link('Añade tus comentarios', array(
		        'controller'=>'comentarios',
		        'action'=>'add'),
		        array('class'=>'button'));  
        }else{
            echo '<p>Regístrate '.
                $this->Html->link(__('aqui'), ['controller'=>'users', 'action' => 'add'])
                .' y envíanos tus comentarios y peticiones';
        } 
		?>			
		</div>
	</div>
</article>