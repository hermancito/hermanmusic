<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ae3d20c3-1525-420d-8e40-cc0b77cb1598", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php 
	$this->layout('default');
    echo $this->Html->script(array('reproductor.js'), array('inline'=>false));
    
    // setting the directory to search for mp3 files
		$dir = "mp3/hardrock";

		// reading the directory and inserting the mp3 files in the playlist array
		$playlist = array();
		$fdir = opendir($dir);
		while($i = readdir($fdir)) {
		   // if a .mp3 string is found, add the file to the array
		   if (strpos(strtolower($i),".mp3") !== false)
		  	   $playlist[] = $i;
		}
		// close the directory
		closedir($fdir);

		sort($playlist);// make an alphabetical ordered list (if you don't want an ordered list, just comment this line)
		//shuffle($playlist);// make a randomized list (if you don't want a randomized list, just comment this line)
?>
<h2>Reproductor de música</h2>
<div class="large-12 columns">
    <h3>La lista de la semana. Disfrútala!!!!</h3>
	<audio id="audio" preload="auto" tabindex="0" controls="" >
		<?php echo '<source src="../'.$dir.'/'.$playlist[0].'">'; ?>
	  <!-- <source src="../mp3/hardrock/Audioslave - Gasoline.mp3"> -->
	  Your Fallback goes here
	</audio>
	<ul id="playlist">
        <?php
		// echoing the playlist
		for ($i=0; $i<sizeof($playlist); $i++) {
		   // for the title it filters the directory and the .mp3 extension out
		   $title = str_replace(".mp3","",$playlist[$i]);
		   // clean filename (convert "_" into " ")
		   $title = str_replace("_", " ", $title);
		   echo "<li class='canciones'>";
		   echo '<a href="../'.$dir.'/'.$playlist[$i].'" title="'.$title.'">'.$title.'</a>';
		   echo "</li>";
		}
		
		?>
    </ul>
<span class='st_sharethis_large' displayText='ShareThis'></span>
	<span class='st_whatsapp_large' displayText='WhatsApp'></span>
	<span class='st_facebook_large' displayText='Facebook'></span>
	<span class='st_twitter_large' displayText='Tweet'></span>
	<span class='st_email_large' displayText='Email'></span>
	<span class='st_googleplus_large' displayText='Google +'></span>
</div>


