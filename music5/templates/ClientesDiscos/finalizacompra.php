<div class="large-12 columns">
    <h3>Realizar pago en PayPal</h3>
    <img src="https://www.paypal.com/es_ES/ES/i/btn/btn_xpressCheckout.gif" align="left" style="margin-right:7px;"><br>
    <div class="panel">
		<p>Importe discos: <?php echo $total.' €'; ?></p>
		<p>Gastos de envío: 5 €</p>
		<p>Importe total a pagar: <?php $importe=$total+5;  echo $importe.' €'; ?></p>
	</div>
	<div class="panel">
		<?php 
		if($total == 3){
		?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="PQVB4NTUFG2NU">
		<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
		<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
		</form>
		<?php 
		}elseif($total == 6){
		?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="F6569GXLEKLSG">
		<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
		<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
		</form>
		<?php 
		}elseif($total == 9){
		?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="AV48AQGTC76EL">
		<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
		<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
		</form>
		<?php 
		}elseif($total == 12){
		?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="YRGLCLEGQ665C">
		<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
		<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
		</form>
		<?php 
		}elseif($total == 15){
		?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="G3JJL3NTNEUUG">
		<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
		<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
		</form>
		<?php 
		}elseif($total == 18){
		?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="6QTGLN4MTQZ5U">
		<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
		<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
		</form>
		<?php 
		}elseif($total == 21){
		?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="NHBFSLX5RVXT8">
		<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
		<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
		</form>
		<?php 
		}elseif($total == 24){
		?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="MP8DGGE285S7G">
		<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
		<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
		</form>
		<?php 
		}elseif($total == 27){
		?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="K5W7LA4EQQKAE">
		<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
		<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
		</form>
		<?php 
		}elseif($total == 30){
		?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="Q8RGLJDV7J9NN">
		<input type="image" src="https://www.paypalobjects.com/es_ES/ES/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal. La forma rápida y segura de pagar en Internet.">
		<img alt="" border="0" src="https://www.paypalobjects.com/es_ES/i/scr/pixel.gif" width="1" height="1">
		</form>
		<?php 
		}else{
		?>
		<p>El máximo de CD's en una sola compra no puede ser superior a 10. Por favor, si quieres comprar más de 10 CD's hazlo en varias compras. Perdona las molestias</p>
		<?php 
		}
		?>
	</div>
</div>


