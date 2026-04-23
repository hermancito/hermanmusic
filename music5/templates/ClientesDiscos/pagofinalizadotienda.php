<div class="large-12 columns">
	<h1>Gracias por haber comprado en hermanmusic</h1>
	<h2>Con tu envío recibirás la factura o recibo</h2>
	<p>Si necesitas alguna aclaración sobre tu pedido no dudes en ponerte en contacto con nosotros en: info@hermanmusic.formatext.es</p>
    <p><b>Discos comprados:</b></p>
	<?php 
    foreach($clientes as $cliente){
        echo '<div class="panel">';
        echo '<p>Título del CD: '.$cliente->disco->name.'</p>';
        echo '<p>Banda: '.$cliente->disco->banda.'</p>';
        echo '</div>';
        $fpago=$cliente->pago;
    }
    ?>
    <p><b>Total compra:</b></p>
    <p>
    <?php 
        echo 'Total discos: '. $total.' €';
    ?>
    </p>
    <p><?php
    if($fpago != "EnMano"){
        echo "<p>Gastos de envio: 5€</p>"; 
    }else{
        echo "<p>Gastos de envio: No se aplican</p>";
    }
    ?>
    </p>
    <p><b>
    <?php
        if($fpago != "EnMano"){
            $importe=$total+5;
        }else{
            $importe=$total;
        }
        echo 'Importe Total: '. $importe.' €';
    ?>
    </b></p>
</div>