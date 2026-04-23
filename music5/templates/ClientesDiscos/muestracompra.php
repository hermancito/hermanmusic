<div class="large-12 columns">
    <h3>Resumen de compra</h3>
    <div class="panel">
       <h4>Datos personales</h4>
        <hr>
        <?php foreach($clientesDiscos as $clientesDisco){
            $nombre = $clientesDisco->cliente->name.' '.$clientesDisco->cliente->last_name;
            $dir = $clientesDisco->cliente->direcc;
            $pob = $clientesDisco->cliente->poblacion;
            foreach($provincias as $provincia){
                $prov = $provincia->name;
            }
            $cp = $clientesDisco->cliente->cp;
            $nif = $clientesDisco->cliente->nif;
            $tfno = $clientesDisco->cliente->tfno;
            $mail = $clientesDisco->cliente->email;
    
        }
        ?>
        <p><b>Nombre: </b><?= h($nombre) ?></p>
        <p><b>Dirección: </b><?= h($dir) ?></p>
        <p><b>Población: </b><?= h($pob) ?></p>
        <p><b>Provincia: </b><?= h($prov) ?></p>
        <p><b>Cod.Postal: </b><?= h($cp) ?></p>
        <p><b>NIF: </b><?= h($nif) ?></p>
        <p><b>Teléfono: </b><?= h($tfno) ?></p>
        <p><b>E-mail: </b><?= h($mail) ?></p> 
    </div>
    <div class="panel">
        <h4><?= __('Discos comprados') ?></h4>
        <?php $total=0; ?>
        <table class="responsive">
            <thead>
                <tr>
                    <th>Disco</th>
                    <th>Banda</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientesDiscos as $clientesDisco): ?>
                <tr>
                    <td><?= h($clientesDisco->disco->name) ?></td>
                    <td><?= h($clientesDisco->disco->banda) ?></td>
                    <td><?= h($clientesDisco->disco->precio).' €' ?></td>
                </tr>
                <?php $total += $clientesDisco->disco->precio; ?>
                <?php $fpago=$clientesDisco->pago ?>
                <?php endforeach; ?>
                <tr>
                    <td><b>Total compra</b></td>
                    <td></td>
                    <td><?php
                        echo $total.' €';
                        if($fpago != 'EnMano'){
                            $importe=$total+5;    
                        }else{
                            $importe=$total;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Gastos de envío: </td>
                    <td></td>
                    <td>
                        <?php
                        if($fpago != 'EnMano'){
                            echo "5 €";    
                        }else{
                            echo "No se aplican";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><b>Importe a pagar:</b></td>
                    <td></td>
                    <td><?php echo $importe.' €';?></td>
                </tr>
                <tr>
                    <td><b>Forma de pago</b></td>
                    <td></td>
                    <td><?php echo $fpago; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
   
    <?php
        echo $this->Html->link('Finalizar compra', ['controller' => 'clientes-discos', 'action' => 'finalizacompra', $total], ['class' => 'button success']);
    ?>
</div>