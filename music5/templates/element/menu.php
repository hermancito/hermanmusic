<div class="fixed">
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
         <h1>
          <?php 
            echo $this->Html->link('Inicio', array('controller' => 'pages', 'action' => 'display', 'home'));
          ?>
         </h1>
         
        </li>
        <!--EL SIGUIENTE <li> ES PARA RESPONSIVE Remove the class "menu-icon" to get rid of menu icon. Take out "Menu"
         to just have icon alone -->
        <li class="toggle-topbar">
          <a href="#"><span>Menu</span></a>
        </li>
      </ul>
     
      <section class="top-bar-section">
      <ul class="left">
        <li class="has-dropdown">
          <a href="#">Discoteca</a>
          <ul class="dropdown">
            <li>
            <?php 
            echo $this->Html->link('Artistas', array(
              'controller'=>'artistas',
              'action'=>'index')); 
            ?>
            </li>
            <li>
            <?php 
            echo $this->Html->link('Discos', array(
              'controller'=>'discos',
              'action'=>'index')); 
            ?>
            </li>
            <li>
                <?php
                echo $this->Html->link('Discos Destacados', array(
                    'controller'=>'discos',
                    'action'=>'discosdestacados'));
                ?>
            </li>
              <li>
                  <?php
                  echo $this->Html->link('Discos Recientes', array(
                      'controller'=>'discos',
                      'action'=>'discosrecientes'));
                  ?>
              </li>
            <li>
            <?php 
            echo $this->Html->link('Estilos', array(
              'controller'=>'estilos',
              'action'=>'index')); 
            ?>
            </li>
          </ul>  
        </li>
                
          <li>
            <?php 
      echo $this->Html->link('Tienda', array(
        'controller'=>'discos',
        'action'=>'tienda')); 
      ?>
          </li>
           
          <li>
            <?php 
      echo $this->Html->link('Conciertos', array(
        'controller'=>'pages',
        'action'=>'display', 'conciertos')); 
      ?>
          </li>
          <?php 
          if(isset($current_user)){
          ?>
            <li class="has-dropdown">
            <a href="#">Listas de reproducción</a>
            <ul class="dropdown">
              <li>
                <?php 
                // echo $this->Html->link('Listas de Herman', array(
                //   'controller'=>'estilos',
                //   'action'=>'listas')); 
                echo $this->Html->link('Lista de Herman', array(
                  'controller'=>'pages',
                  'action'=>'display', 'jplayer1')); 
                ?>
              </li>
              <li>
                <?php 
                echo $this->Html->link('Podcast Radio 3', array(
                  'controller'=>'pages',
                  'action'=>'display', 'podcast')); 
                ?>
              </li>
              <li>
                <?php 
                echo $this->Html->link('Listas solicitadas', array(
                  'controller'=>'cdvarios',
                  'action'=>'indexlistas', $current_user['id'])); 
                ?>
              </li>
            </ul>  
            </li>
          <?php 
          }
          ?>
          <li>
            <?php
                if(isset($current_user) && $current_user['role']=='Administrador'){ 
                echo $this->Html->link('CDs de varios', array(
                  'controller'=>'cdvarios',
                  'action'=>'index'));
                }elseif(isset($current_user) && $current_user['role']=='Usuario'){
                  echo $this->Html->link('Tus CD de varios', array(
                  'controller'=>'cdvarios',
                  'action'=>'indexuser', $current_user['id']));
                } 
            ?>
          </li>
            
          <li class="active">
            <?php
            //solo pueden ver este enlace los usuarios
            if(isset($current_user) && $current_user['role']=='Usuario'){
              echo $this->Html->link('Perfil '.$current_user['name'], array(
              'controller'=>'users',
              'action'=>'view', $current_user['id']));
            }elseif(!$current_user){
               echo $this->Html->link('Acceso usuarios', array(
               'controller'=>'users',
               'action'=>'login'));
             } 
            ?>
          </li>
          <li>
            <?php 
            echo $this->Html->image('carrito_blanco.png', [
                            'alt' => 'Carrito',
                            //'url' => ['controller' => 'Carritos', 'action' => 'index']
                            'url' => ['controller' => 'Discos', 'action' => 'carrito']
                        ]);
            ?>
          </li>
          <!-- <li style="color:white; margin-top:8px">
            <?php
            //$session = $this->request->session();
            //$discosCarrito=$session->read('discos');
            //if(isset($discosCarrito)){
                //$cantcarrito=count($discosCarrito);
            //}else{
                //$cantcarrito=0;
            //}
            //echo ' '.$cantcarrito.' <small>discos en carrito</small>'; 
            ?>
          </li> -->
          <li>
          <?php
          if(isset($current_user)){ 
            echo $this->Html->link('SALIR', array(
            'controller'=>'users',
            'action'=>'logout'));
          } 
          ?>
          </li>  
                
          <li class="search">
            <div class="row collapse postfix-round">
              <div class="small-9 columns">
                <?php 
                echo $this->Form->create('Discos', ['type'=>'GET', 'url'=>['controller'=>'discos', 'action'=>'search']]);
                
                echo $this->Form->input('search', ['type'=>'search', 'label'=>false, 'div'=>false, 'id'=>'s', 'class'=>'s', 'autocomplete'=>'off', 'placeholder'=>'Buscar artista o grupo']);
                ?>
              </div>
              <div class="small-3 columns">
                <?php
                  echo $this->Form->button('Buscar', ['class'=>'small button tiny']);
                  echo $this->Form->end();
            
                ?>
              
              </div>
            </div>
          </li>
        </ul>
        <?php 
        if($current_user['role']=='Administrador'){
        ?>
        <ul class="right">
          <li class="has-dropdown">
            <a href="#">Admin</a>
            <ul class="dropdown">
              <li>
                <?php 
                  echo $this->Html->link('Usuarios', array('controller'=>'users', 'action'=>'index'));
                ?>
              </li>
              <li>
                <?php 
                  echo $this->Html->link('Comentarios', array('controller'=>'comentarios', 'action'=>'index'));
                ?>
              </li>
              <li>
                <?php 
                  echo $this->Html->link('Compras CD varios', array('controller'=>'cdvarios-clientes', 'action'=>'index'));
                ?>
              </li>
              <li>
                <?php 
                  echo $this->Html->link('Clientes', array('controller'=>'clientes', 'action'=>'index'));
                ?>
              </li>
              <li>
                <?php 
                  echo $this->Html->link('Compras CDs', array('controller'=>'clientes-discos', 'action'=>'index'));
                ?>
              </li>
            </ul>
          </li>
        </ul>
        <?php 
        }
        ?>
      </section>
    </nav>
</div>