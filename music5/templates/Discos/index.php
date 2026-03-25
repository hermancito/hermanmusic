<?php
if(isset($current_user) && $current_user['role']=='Administrador'){
    $this->layout = 'admin';
}else{
    $this->layout = 'default';
}
?>
<div class="large-12 columns">
    <div class="large-6 columns">
        <h3>Discos</h3>
    </div>
    <div class="large-6 columns">
        <?php
        if(isset($current_user) && $current_user['role']=='Administrador'){
            echo $this->Html->link('Agregar disco', ['action'=>'add'], ['class' => 'button']);
        }
        ?>
    </div>
    <?php
    if(!isset($current_user) || $current_user['role']=='Usuario'){
        ?>
        <div class="large-12 columns">
            <?php foreach ($discos as $disco): ?>
                <div class="large-4 columns">
                    <div class="panel marcodisco">
                        <?php
                        if(!empty(h($disco->portada))){
                            echo $this->Html->image('../files/discos/portada/' . h($disco['portada']), ['class'=>'portada'], ["alt" => $disco['name']]);
                        }else{
                            h($disco->portada);
                        }
                        ?>
                        <br><br>
                        <p><i><?= h($disco->name) ?></i></p>
                        <p><?= h($disco->banda) ?></p>
                        <p><?= h($disco->formato) ?></p>
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $disco->id], ['class'=>'button tiny info botondisco']) ?>

                    </div>
                </div>
            <?php endforeach; ?>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </ul>
                <p><?= $this->Paginator->counter() ?></p>
            </div>
        </div>
        <?php
    }else{
        ?>

        <table class="responsive" id="myTable">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('name', ['label'=>'Nombre']) ?></th>
                <th><?= $this->Paginator->sort('banda') ?></th>
                <th><?= $this->Paginator->sort('formato') ?></th>
                <th><?= $this->Paginator->sort('portada') ?></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($discos as $disco): ?>
                <tr>
                    <td><?= h($disco->name) ?></td>
                    <td><?= h($disco->banda) ?></td>
                    <td><?= h($disco->formato) ?></td>
                    <td><?= $this->Html->link(
                                $this->Html->image('../files/Discos/portada/' . h($disco->portada), ['class'=>'portada', 'style'=>'width:50px; height:50px'],
                                ["alt" => $disco->name]), ['controller'=>'discos', 'action' => 'view', $disco->id],
                                ['escape' => false]
                            );
                        ?>
                    </td>
                    <td>
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $disco->id], ['class'=>'button tiny info']) ?>
                    </td>
                    <?php
                    if(isset($current_user) && $current_user['role']=='Administrador'){
                        ?>
                        <td>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $disco->id], ['class'=>'button tiny warning']) ?>
                        </td>
                        <td>
                            <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $disco->id], ['confirm' => __('Are you sure you want to delete # {0}?', $disco->id), 'class'=>'button tiny alert']) ?>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <!--<div class="paginator">
        <ul class="pagination">
            <?/*= $this->Paginator->prev('< ' . __('previous')) */?>
            <?/*= $this->Paginator->numbers() */?>
            <?/*= $this->Paginator->next(__('next') . ' >') */?>
        </ul>
        <p><?/*= $this->Paginator->counter() */?></p>
    </div>-->
        <?php
    }
    ?>

</div>