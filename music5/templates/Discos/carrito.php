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
            <?php for($i=0; $i<count($carritos); $i++): ?>
            <tr id="row-<?php echo $carritos[$i]->id; ?>">
                <td>
                    <?php
                    if(!empty(h($carritos[$i]->portada))){
                        echo $this->Html->image('../files/discos/portada/' . h($carritos[$i]->portada_dir) . '/portrait_' . h($carritos[$i]->portada), ['alt' => 'portada disco', 'class'=>'portada']);
                        //echo $this->Html->image(h($enventa->portada), array('alt' => 'portada disco'));
                    }else{
                        h($carritos[$i]->portada);
                    }
                 ?>
                </td>
                <td>
                    <?php echo $carritos[$i]->name; ?>
                </td>
                <td>
                    <?php echo $carritos[$i]->precio.' €'; ?>
                </td>
                <td>
                    <?= $this->Html->link('Borrar', ['action'=>'borraitem', $carritos[$i]->id], ['class' => 'button tiny alert']) ?>
                </td>
            </tr>
            
            <?php
            $total+=$carritos[$i]->precio;
            endfor; ?>
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