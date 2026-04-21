<div class="large-12 columns">
            <div class="panel">
               <h1>Bienvenido</h1>
               <p>Esta es mi web de música, con la que quiero compartir con mis amigos toda mi discografía e información sobre la misma.</p>
               <p>En la tienda puedes comprar algunos de mis discos a un buen precio y en buen estado.</p>
               <p>Al registrate como usuario podrás oir mi selección semanal de música o una selección de podcasts de Radio 3. También podrás encargarme que te elabore un CD de varios con canciones de los discos que tu elijas, o bien, elaborar una lista de reproducción y solicitar su publicación en hermanmusic; si al oirla te gusta podrás comprar la grabación de la misma</p>
               
            </div>
            <div class="row">
                <div class="large-6 columns">
                   <?php
                        if(!isset($current_user)){
                            echo $this->Html->link('Acceder', ['controller'=>'users', 'action'=>'login'], ['class'=>'button default calltoaction']);
                        }
                   ?>
                </div>
                <div class="large-6 columns">
                   <?php
                        if(!isset($current_user)){
                            echo $this->Html->link('Registrarse', ['controller'=>'users', 'action'=>'add'], ['class'=>'button default calltoaction']);
                        }
                   ?> 
                </div>
            </div>
            
        </div>
        
    
