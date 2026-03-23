<?php 
$session = $this->request->session();
$total=$session->read('total');
?>
<div class="large-12 columns">
    <h3>Pago PayPal</h3>
	<form action="https://securepayments.sandbox.paypal.com/webapps/HostedSoleSolu
tionApp/webflow/sparta/hostedSoleSolutionProcess" method="post">
		<input type="hidden" name="cmd" value="_hosted-payment">
		<input type="hidden" name="subtotal" value="50">
		<input type="hidden" name="business" value="NPQEYTM2NLZB2">
		<input type="hidden" name="paymentaction" value="sale">
		<input type="hidden" name="return" value="http://localhost/music/discos/tienda">
		<input type="submit" name="METHOD" value="Pagar">
	</form>
	<?php 
	echo $total;
	 ?>
</div>    