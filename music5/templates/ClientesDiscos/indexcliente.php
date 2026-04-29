<?php 
echo $this->Html->script(array('addpago.js'), array('inline'=>false));
?>
<div class="large-12 columns">
    <h3>Selecciona la forma de pago</h3>
    <?php
    foreach($clientesDiscos as $clientesDisco){
        $idCliente=$clientesDisco->cliente->id;
    }
    $formaspago = ['Contrareembolso' => 'Contrareembolso', 'PayPal' => 'PayPal', 'EnMano'=>'Recojo y pago en mano'];
    echo $this->Form->control('pago', ['options' => $formaspago, 'class'=>'addpago', 'id'=>$idCliente]);
    ?>
    <h3><?= __('Discos en el carrito') ?></h3>
    <table class="responsive">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Portada') ?></th>
                <th><?= $this->Paginator->sort('Disco') ?></th>
                <th><?= $this->Paginator->sort('Banda') ?></th>
                <th><?= $this->Paginator->sort('Precio') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientesDiscos as $clientesDisco): ?>
            <tr>
                <td>
                    <?php
                        if(!empty(h($clientesDisco->disco->portada))){
                        echo $this->Html->image('../files/Discos/portada/' . h($clientesDisco->disco->portada), ['style' => 'width:100px; height:100px'], ['alt' => 'portada disco', 'class'=>'portada']);
                        //echo $this->Html->image(h($enventa->portada), array('alt' => 'portada disco'));
                    }else{
                        h($clientesDisco->disco->portada);
                    }
                 ?>
                </td>
                <td><?= h($clientesDisco->disco->name) ?></td>
                <td><?= h($clientesDisco->disco->banda) ?></td>
                <td><?= h($clientesDisco->disco->precio).' €' ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>