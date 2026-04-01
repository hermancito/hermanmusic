<script type="text/javascript">var switchTo5x=true;</script>

<script type="text/javascript">stLight.options({publisher: "ae3d20c3-1525-420d-8e40-cc0b77cb1598", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php 
	
	//$this->viewBuilder()->setLayout('default');

	echo $this->Html->script('reproductor.js', ['block' => true]);

	$dir = WWW_ROOT . 'mp3' . DS . 'hardrock';

	$playlist = [];

	if (is_dir($dir)) {
		$fdir = opendir($dir);

		while (($file = readdir($fdir)) !== false) {
			if (str_contains(strtolower($file), '.mp3')) {
				$playlist[] = $file;
			}
		}

		closedir($fdir);
	}

	sort($playlist);
?>
?>
<h2>Reproductor de música</h2>
<div class="large-12 columns">
    <h3>La lista de la semana. Disfrútala!!!!</h3>
	<audio id="audio" preload="auto" controls>
		<?php if (!empty($playlist)): ?>
			<source src="/mp3/hardrock/<?= h($playlist[0]) ?>" type="audio/mpeg">
		<?php endif; ?>
	</audio>
	<ul id="playlist">
	<?php foreach ($playlist as $file): ?>
		<?php
			$title = str_replace('.mp3', '', $file);
			$title = str_replace('_', ' ', $title);
		?>
		<li class="canciones">
			<a href="/mp3/hardrock/<?= h($file) ?>" title="<?= h($title) ?>">
				<?= h($title) ?>
			</a>
		</li>
	<?php endforeach; ?>
	</ul>
<span class='st_sharethis_large' displayText='ShareThis'></span>
	<span class='st_whatsapp_large' displayText='WhatsApp'></span>
	<span class='st_facebook_large' displayText='Facebook'></span>
	<span class='st_twitter_large' displayText='Tweet'></span>
	<span class='st_email_large' displayText='Email'></span>
	<span class='st_googleplus_large' displayText='Google +'></span>
</div>


