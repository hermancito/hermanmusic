<?php 
	$this->layout('default');
    
?>
<h1>Reproductor de música</h1>
<div id="content1" class="large-12 columns">
    <h2>Tu lista de reproducción. Disfrútala!!!!</h2>
    <table align="center" border="0" cellspacing="0"cellpadding="0"><tbody><tr><td>
    <div align="center">
    <script language='JavaScript' src='../js/musicplayer1.js' type='text/javascript'></script>
    </div>
    <tr><td><div align="center"><font face="Arial" font size="1"><a href="http://www.websitemusicplayer.com" target="_blank">website music player</a></font></div>
    </td></tr></tbody></table>
   <br class="clear" />
</div>
<div class="large-12 columns">
	<p>Solicita tu propia lista eligiendo los discos tú mismo. Intentaremos publicártela en breve. Una vez la oigas, si te gusta, puedes encargarnos que te la grabenos en un CD variado</p>
	<?php 
		echo $this->Html->link('CREAR LISTA DE REPRODUCCIÓN', ['controller'=>'cdvarios', 'action'=>'addlistarep', $current_user['id']], ['class' => 'button']);
	?>
</div>
