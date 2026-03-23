<?php
// setting the directory to search for mp3 files
$dir = "mp3/";

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
shuffle($playlist);// make a randomized list (if you don't want a randomized list, just comment this line)

header("Content-type: text/xml");
// echoing the playlist to flash
echo "<player showDisplay=\"yes\" showPlaylist=\"yes\" autoStart=\"no\">\n";
for ($i=0; $i<sizeof($playlist); $i++) {
   // for the title it filters the directory and the .mp3 extension out
   $title = str_replace(".mp3","",$playlist[$i]);
   // clean filename (convert "_" into " ")
   $title = str_replace("_", " ", $title);
   echo "  <song path=\"$dir{$playlist[$i]}\" title=\"$title\" />";
}
echo "</player>";
?>

