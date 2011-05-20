<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Listing albums</title>
    <style>
body {
   font-family: Verdana;      
 }
    </style>    
  </head>
  <body>
    <h1>Album Listing</h2>
    <?php
    $userid = 'ekoontz';
    
// build feed URL
$feedURL = "http://picasaweb.google.com/data/feed/api/user/$userid?kind=album";
    
// read feed into SimpleXML object
$sxml = simplexml_load_file($feedURL);
    
// get album names and number of photos in each

echo "<ul>";
foreach ($sxml->entry as $entry) {      
  $media = $entry->children('http://search.yahoo.com/mrss/');  // test if $media = url
  $title = $entry->title;
  $gphoto = $entry->children('http://schemas.google.com/photos/2007');
  $numphotos = $gphoto->numphotos;
  $albumid = $gphoto->id;
  echo "<li><a href='album.php?albumid=$albumid&amp;userid=$userid'>$title</a></li>\n"; // try to call to album name
}
echo "</ul>";
    ?>
    
  </body>
</html>
