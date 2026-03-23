<?php 
$this->layout = 'default';
?>
<div class="large-12 columns">
	<h2>Próximos conciertos en Valencia</h2>
</div>
<div class="large-12 columns">
<?php 
echo $this->Html->image('conciertos.jpg', array('alt' => 'conciertos en Valencia'));
?>
<p><i>Información extraida de www.nvivo.es</i></p>
<div class="panel">

  <script language="JavaScript" src="https://feed2js.org//feed2js.php?src=http://www.nvivo.es/feed/ciudad/2509954/rss&chan=y&num=8&desc=1&utf=y"  charset="UTF-8" type="text/javascript"></script>
  <noscript>
  <a href="https://feed2js.org//feed2js.php?src=http://www.nvivo.es/feed/ciudad/2509954/rss&chan=y&num=8&desc=1&utf=y&html=y">View RSS feed</a>
  </noscript>
  </div>
</div>