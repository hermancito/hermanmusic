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
            <div class="panel">
                <h2 style="color:olive">El video del mes</h2>
                <iframe width="100%" height="270" src="http://www.youtube.com/embed/xuKd65C6jvU" frameborder="0" allowfullscreen></iframe>
                    <p>Los Dictators son unos macarras neoyorquinos coetáneos de Los Ramones injustamente desconocidos</p>
                    <p>La pinta del cantante es espectacular</p>    
            </div>
            
            <!-- <h2>Otros videos destacados</h2>
                <div class="large-4 columns">
                    <iframe width="100%" height="270" src="http://www.youtube.com/embed/YAO0Xdp_IWs" frameborder="0" allowfullscreen></iframe>
                <p>El video de la semana corresponde a: <a href="#">The Cramps</a>.</p>
                <p>Lux Interior y Poison Ivy en plena forma</p>
                    <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                </div>
                <div class="large-4 columns">
                    <iframe width="100%" height="270" src="http://www.youtube.com/embed/EYJOq6VnV2U" frameborder="0" allowfullscreen></iframe>
                    <p>Esta es la época de oro de Siouxie and the Banshees. Grabaron el directo "Nocturne" con temas emblemáticos como este "Israel"</p>
                    <p>A la guitarra vemos a un jovencito Robert Smith que ya había formado a "The Cure"</p>
                    <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                </div>
                <div class="large-4 columns">
                    <iframe width="100%" height="80" src="http://www.youtube.com/embed/GYuwLyD2qJ4" frameborder="0" allowfullscreen></iframe>
                    <p>Radio Futura tocaron techo con el disco "Escuela de calor"</p>
                    <p>Santiago Auseron y compañia en pura estética 80's</p>
                    <p class="readmore"><a href="#">Continue Reading &raquo;</a></p>
                </div> -->
        </div>
        
    
