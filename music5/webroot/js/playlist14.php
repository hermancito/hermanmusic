<?php
for($j=0; $j<15; $j++){
$num=mt_rand(1,13);
switch ($num) {
	case '1':
		$dir = "mp3/hardrock/";
		break;
	case '2':
		$dir = "mp3/heavymetal/";
		break;
	case '3':
		$dir = "mp3/poprock/";
		break;
	case '4':
		$dir = "mp3/pop/";
		break;
	case '5':
		$dir = "mp3/numetal/";
		break;
	case '6':
		$dir = "mp3/techno/";
		break;
	case '7':
		$dir = "mp3/blues/";
		break;
	case '8':
		$dir = "mp3/r&b/";
		break;
	case '9':
		$dir = "mp3/soul/";
		break;
	case '10':
		$dir = "mp3/rock/";
		break;
	case '11':
		$dir = "mp3/rockalternativo/";
		break;
	case '12':
		$dir = "mp3/punkrock/";
		break;
	case '13':
		$dir = "mp3/garage/";
		break;
	default:
		$dir = "mp3/garage/";
		break;
}
// setting the directory to search for mp3 files
//$dir = "mp3/soul/";

// reading the directory and inserting the mp3 files in the playlist array
$playlist = array();
$fdir = opendir($dir);
while($i = readdir($fdir)) {
   // if a .mp3 string is found, add the file to the array
   if (strpos(strtolower($i),".mp3") !== false)
  	   $playlist[] = $i;
  	}
print_r(array_rand($playlist, 1));
// close the directory
closedir($fdir);
}


sort($playlist);// make an alphabetical ordered list (if you don't want an ordered list, just comment this line)
//shuffle($playlist_aleat);// make a randomized list (if you don't want a randomized list, just comment this line)

header("Content-type: text/xml");
// echoing the playlist to flash
echo "<player showDisplay=\"yes\" showPlaylist=\"yes\" autoStart=\"no\">\n";
for ($i=0; $i<sizeof($playlist); $i++) {
   // for the title it filters the directory and the .mp3 extension out
   $title = str_replace(".mp3","",$playlist[$i]);
   // clean filename (convert "_" into " ")
   $title = str_replace("_", " ", $title);
   echo "  <song path=\"$dir{$playlist[$i]\" title=\"$title\" />";
}
echo "</player>";
?>