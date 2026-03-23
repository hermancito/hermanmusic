<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'La música de Herman';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('electric27.ico', '/electric27.ico',['type' => 'icon']); ?>
    <?= $this->Html->css('foundation.css') ?>
    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>
    <?= $this->Html->script(array('jquery.js', 'foundation.min.js', 'jquery-ui.min.js', 'search.js')) ?>
    <?= $this->fetch('script') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    
</head>
<body>
<?php echo $this->element('menu'); ?>
<br><br>
<div class="row">
    <div class="large-12 columns">
    <?= $this->Flash->render() ?>
    </div>
</div>
<br>
    <div id="msg"></div>
<br>
<div class="row">
    <div class="large-12 columns">
        <div class="large-8 columns">
            <?= $this->fetch('content') ?>
        </div>
        
        <div class="large-4 columns">
            <h3>Discos destacados</h3>
            <?php echo $this->element('destacados'); ?>
        </div>
    </div>

</div>
<div class="row">
    <div class="large-12 columns">
        <div class="large-6 columns">
            <h4>Últimas adquisiciones</h4>
                <?php echo $this->element('ultimos'); ?>    
        </div>
        <div class="large-6 columns">
            <h4>Vuestros comentarios</h4>
                <?php echo $this->element('coments'); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="large-12 columns">
        <h4>Enlaces recomendados</h4>
        <div class="large-4 columns">
            <a href="http://www.mondosonoro.com/">
            <?php
            echo $this->Html->image('mondo_sonoro.jpg', array('alt' => 'Revista Mondo Sonoro'));
            ?> 
            </a>    
        </div>
        <div class="large-4 columns">
            <a href="http://www.montereydiscos.es/">
            <?php
            echo $this->Html->image('monterrey.jpg', array('alt' => 'Tienda de discos Monterey'));
            ?> 
            </a>
            
        </div>
        <div class="large-4 columns">
            <a href="http://www.ruta66.es/">
            <?php
            echo $this->Html->image('ruta66.jpg', array('alt' => 'Revista Ruta 66'));
            ?> 
            </a>
                
        </div>
    </div>
</div>
    <footer>
    	<div class="fixedfooter">
        <ul>
            <li><a class="active" href="http://www.hermanmusic.formatext.es/">Home</a></li>
            <li><a href="http://www.hermanmusic.formatext.es/pages/privacidad">Política de privacidad</a></li>
            <li><a href="mailto:info@hermanmusic.formatext.es">Contacto: info@hermanmusic.formatext.es</a></li>
            <li><a href="#about"><i>Desarrollo y diseño web:</i> Javier Hernández</a></li>
        </ul>
        
    </div>
    </footer>
    
<script>
    $(document).foundation();
    var basePath = "<?php echo \Cake\Routing\Router::url('/'); ?>";
    $(document).ready(function(){
        $('.alert-box').delay(6000).fadeOut('slow');
    }); 
</script>
</body>
</html>
