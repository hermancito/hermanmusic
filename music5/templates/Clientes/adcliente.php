<div class="large-12 columns">
<h2>Datos de facturación y envío</h2>
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        
        <?php
            echo $this->Form->control('name', ['label'=>'Nombre']);
            echo $this->Form->control('last_name', ['label'=>'Apellidos']);
            echo $this->Form->control('direcc', ['label'=>'Dirección']);
            echo $this->Form->control('poblacion', ['label'=>'Población']);
            echo $this->Form->control('provincia_id', ['options' => $provincias]);
            echo $this->Form->control('cp', ['label'=>'Código Postal']);
            echo $this->Form->control('nif', ['label'=>'NIF']);
            echo $this->Form->control('tfno', ['label'=>'Teléfono']);
            echo $this->Form->control('email', ['label'=>'E-mail']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Continuar'), ['class'=>'button']) ?>
    <?= $this->Form->end() ?>
</div>