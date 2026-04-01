<?php 
if(isset($current_user) && $current_user['role']=='Administrador'){
    $this->layout = 'admin';
}else{
    $this->layout = 'default';
}
?>
<div class="large-12 columns">
    <div class="large-6 columns">
        <h3>Estilos</h3>    
    </div>
    <div class="large-6 columns">
        <?php
            if(isset($current_user) && $current_user['role']=='Administrador'){
                echo $this->Html->link('Agregar estilo', ['action'=>'add'], ['class' => 'button']);
            }
        ?>
    </div>
    <div class="large-12 columns">
    <?php foreach ($estilos as $estilo): ?>
        <div class="large-3 columns">
        <div class="panel marcoestilo">
            
            <?= $this->Html->link(__('Artistas'), ['action' => 'view', $estilo->id], ['class'=>'button tiny warning']) ?>
            <p><?= h($estilo->name) ?></p>
            <?= $this->Html->image('64x64/' . h($estilo->imagen)); ?>
            <?php 
                if(isset($current_user) && $current_user['role']=='Administrador'){
            ?>
            <p>
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $estilo->id], ['class'=>'button tiny info']) ?>
            
                <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $estilo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estilo->id), 'class'=>'button tiny alert']) ?>
            </p>
            <?php 
                }
            ?>
        </div>
        </div>
    <?php endforeach; ?>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
