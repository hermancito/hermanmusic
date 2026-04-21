<?php echo $this->Html->script(array('cart.js', 'jquery.animate-colors.js'), array('inline' => false)); ?>
<div class="large-12 columns">
    <h3>Discos en el carrito</h3>    
    <table class="responsive">
        <thead>
            <tr>
                <th>Portada</th>
                <th>Titulo</th>
                <th>Precio</th>
                <th><?= __('Eliminar') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
             $total = 0;
            ?>
            <?php foreach ($carritos as $carrito): ?>
            <tr id="row-<?php echo $carrito->id; ?>">
                <td>
                    <?php
                    if(!empty(h($carrito->portada))){
                        echo $this->Html->image('../files/Discos/portada/' . h($carrito->portada), ['style' => 'width:100px; height:100px'], ['alt' => 'portada disco', 'class'=>'portada']);
                        //echo $this->Html->image(h($enventa->portada), array('alt' => 'portada disco'));
                    }else{
                        h($carrito->portada);
                    }
                 ?>
                </td>
                <td>
                    <?php echo $carrito->name; ?>
                </td>
                <td>
                    <?php echo $carrito->precio.' €'; ?>
                </td>
                <td>
                    <?= $this->Html->link('Borrar', ['action'=>'borraitem', $carrito->id], ['class' => 'button tiny alert']) ?>
                </td>
            </tr>
                       
            <?php
                $total+=$carrito->precio; 
                endforeach; 
            ?>
        </tbody>
    </table>
    <div class="row">
        <div class="large-12 columns">
            <div class="panel">
      
            <span class="total">Total Pedido:</span>
            <span id="total" class="total">
                <?php 
                    echo $total.' €';
                ?>
            </span>

            <br><br>
            
            <?php echo $this->Html->link('Procesar Pedido', ['controller' => 'clientes', 'action' => 'adcliente'], ['class' => 'button success']); ?>

            <?php echo $this->Form->end(); ?>
            <br><br>
            <?php echo $this->Html->link('Borrar todo', array('controller' => 'discos', 'action' => 'quitar'), array('class' => 'button alert', 'confirm' => 'Está seguro de quitar todos los discos del carrito?')); ?>
            </div>
        </div>
    </div>
</div>