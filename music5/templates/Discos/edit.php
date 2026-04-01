<div class="discos form large-9 medium-8 columns content">
    <?= $this->Form->create($disco, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Editar Disco') ?></legend>
        <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('banda');
                    echo $this->Form->control('anyo');
                    echo $this->Form->control('copy');
                    echo $this->Form->control('formato');
                    echo $this->Form->control('portada', ['type' => 'file']);
                    echo $this->Form->hidden('portada_dir', ['default' => '000000']);
                    echo $this->Form->control('vta');
                    echo $this->Form->control('precio');
                    echo $this->Form->control('destacado');
                    echo $this->Form->control('coment');
                    echo $this->Form->control('reciente');
                    echo $this->Form->control('cdvarios._ids', ['options' => $cdvarios]);
                    //echo $this->Form->control('clientes._ids', ['options' => $clientes]);
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Grabar')) ?>
    <?= $this->Form->end() ?>
</div>
