<?php 
if(isset($current_user) && $current_user['role']=='Administrador'){
    $this->layout = 'admin';
}else{
    $this->layout = 'default';
}
?>
<div class="large-12 columns">
    <div class="large-6 columns">
        <h3>Artistas</h3>    
    </div>
    <div class="large-6 columns">
        <?php
            if(isset($current_user) && $current_user['role']=='Administrador'){
                echo $this->Html->link('Agregar artista', ['action'=>'add'], ['class' => 'button']);
            }
        ?>
    </div>
    <table class="responsive" id="myTable">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name', ['label'=>'Nombre']) ?></th>
                <th><?= $this->Paginator->sort('paise_id', ['label'=>'Procedencia']) ?></th>
                <th><?= $this->Paginator->sort('estilo_id', ['label'=>'Estilo musical']) ?></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artistas as $artista): ?>
            <tr>
                <td><?= h($artista->name) ?></td>
                <td><?= h($artista->paise->name) ?></td>
                <td><?= $artista->has('estilo') ? $this->Html->link($artista->estilo->name, ['controller' => 'Estilos', 'action' => 'view', $artista->estilo->id]) : '' ?></td>
                <td>
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $artista->id], ['class'=>'button tiny info']) ?>
                </td>
                <?php 
                    if(isset($current_user) && $current_user['role']=='Administrador'){
                ?>
                <td>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $artista->id], ['class'=>'button tiny warning']) ?>
                </td>
                <td>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $artista->id], ['confirm' => __('Are you sure you want to delete # {0}?', $artista->id), 'class'=>'button tiny alert']) ?>
                </td>
                <?php 
                    }
                ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php if(!isset($current_user) || (isset($current_user) && $current_user['role']!='Administrador')): ?>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        </div>
    <?php endif; ?>

</div>

