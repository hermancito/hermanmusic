<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<style>
    
@media screen and (max-width:640px) {
    .identif{
        width: 100%;
        margin-top: 60px;
    }
    .home{
        width: 100%;
        margin-top: 60px;

    }
}
@media screen and (max-width:1024px) and (min-width:640px) {
    .identif{
        width: 70%;
        margin-top: 60px;
        margin-left: 20%;
    }
    .home{
        width: 80%;
        margin-top: 60px;
        margin-left: 10%;
    }
}
@media screen and (min-width:1024px) {
    .identif{
        width: 50%;
        margin-top: 60px;
        margin-left: 20%;
    }
    .home{
        width: 80%;
        margin-top: 60px;
        margin-left: 10%;
    }
}

.registro{
    width: 70%;
    margin-top: 60px;
    margin-left: 10%;
}
ul.pagination li a {
    color: rgba(0, 0 ,0 , 0.54);
}

ul.pagination li.active a {
    background-color: #DCE47E;
    color: #FFF;
    font-weight: bold;
    cursor: default;
}
ul.pagination .disabled:hover a {
    background: none;
}

.paginator {
    text-align: center;
}

.paginator ul.pagination li {
    float: none;
    display: inline-block;
}

.paginator p {
    text-align: right;
    color: rgba(0, 0 ,0 , 0.54);
}
</style>
<div class="identif">
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Panel de administración</h3>
                <?= $this->Html->image('logo-bina.png', ['alt' => 'Blanc i Negre animació']);?>
            </div>
            <div class="panel-body">
                <?= $this->Flash->render('auth') ?>
                <?= $this->Form->create() ?>
                <legend><?= __('Por favor, ingresa tu email y password') ?></legend>
                <div class="form-group">
                    <label>Email</label>
                    <?= $this->Form->control('email',  array('label'=>'', 'class'=>'form-control')) ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <?= $this->Form->control('password',  array('label'=>'', 'class'=>'form-control')) ?>
                </div>
                <!--<div class="form-group">
                    <?/*= $this->Recaptcha->display() */?>
                </div>-->
                <div class="form-group">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                    <?= $this->Form->button(__('Login'), ['class'=>'btn btn-success btn-lg btn-block']);?>
                    </div>
                    <!--<div class="col-xs-4 col-sm-4 col-md-4">
                    <?/*= $this->Html->link('Registrarse', ['controller' => 'Users', 'action' => 'registrousers'],
                    ['class' => 'btn btn-info btn-lg btn-block']);;*/?>
                    </div>-->
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <?= $this->Html->link('Olvidé contraseña', ['controller' => 'Users', 'action' => 'forgotpassword'],
                            ['class' => 'btn btn-default btn-lg btn-block']);;?>
                    </div>

                <?= $this->Form->end() ?>
                <?php
                // echo $this->Html->link('He olvidado la contraseña', array(
                //     'controller'=>'users',
                //     'action'=>'add'),
                //     array('class'=>'button'));
                ?>
            </div>
        </div>
    </div>
</div>