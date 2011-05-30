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

   div.container {
     width:100%;
   border:1px dashed blue;
   float:left;
   }


   div.tiles {
   float:left;
     margin:3px;
   width:25%;
     border:1px dashed green;
   }
    </style>    
  </head>
  <body>
    <h1>Album Listing</h2>
    <div class="container">  
  <?php
    $userid = 'cooper81';
    
// build feed URL
$feedURL = "http://picasaweb.google.com/data/feed/api/user/$userid?kind=album";
    
// read feed into SimpleXML object
$sxml = simplexml_load_file($feedURL);
    
$per_row = 4;
$i = 0;

// get album names and number of photos in each
foreach ($sxml->entry as $entry) {      
  $media = $entry->children('http://search.yahoo.com/mrss/');  // test if $media = url
  $title = $entry->title;
  $gphoto = $entry->children('http://schemas.google.com/photos/2007');
  $numphotos = $gphoto->numphotos;
  $albumid = $gphoto->id;

  $link = "album.php?albumid=$albumid&amp;userid=$userid";

  $thumbnail = get_thumbnail($userid,$albumid);

  $mod = $i % $per_row;
  echo "<div class='tiles'>($i)($mod) <a href='$link'><img src='$thumbnail'/></a><a href='$link'>$title</a></div>\n"; 

  if (($i % $per_row) == 0) {
    echo "<br/>";
  }
  $i++;


}


    ?>
  </div> <!-- container -->  
  </body>
</html>

<?php

  function get_thumbnail($userid,$albumid) {
    // choose random image from set of images in given album.
    $feedURL = "http://picasaweb.google.com/data/feed/api/user/$userid/albumid/$albumid";

    $xml = simplexml_load_file($feedURL);

    // count images; choose a random number between 0 and count -1 as
    // index of picture to show.
    $count = count($xml->entry);
    $random = rand(0,($count - 1));

    $entry = $xml->entry[$random];
    $media = $entry->children('http://search.yahoo.com/mrss/');
    $thumbnail = $media->group->thumbnail[1]->attributes()->{'url'};
    return $thumbnail;
  }
?>