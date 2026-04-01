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
        <?= $this->fetch('content') ?>
    </div>

</div>

<script>
    $(document).foundation();
    var basePath = "<?php echo \Cake\Routing\Router::url('/'); ?>";
    $(document).ready(function(){
        $('.alert-box').delay(6000).fadeOut('slow');
    });
</script>
</body>
</html>