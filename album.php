<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Listing album contents</title>
    <style>
    body {
      font-family: Verdana;      
    }
    h2 {
      color: red; 
      text-decoration: none;  
    }
    span.attr {
      font-weight: bolder;  
    }
    img {
      float: left;  
    }
    </style>    
  </head>
  <body>
    <form action="?" method="get">
        <select name="userid" onchange="submit();">
          <option value="">Choose a user:</option>
          <option>ekoontz</option>
          <option>cooper81</option>
        </select>
    </form>

    <?php


    $userid = 'ekoontz';

if ($_REQUEST['userid']) {
  $userid = $_REQUEST['userid'];
 }

    // build feed URL
    $feedURL = "http://picasaweb.google.com/data/feed/api/user/$userid?kind=photo";
    
    // read feed into SimpleXML object
    $sxml = simplexml_load_file($feedURL);
    
    // get album name and number of photos
    $counts = $sxml->children('http://a9.com/-/spec/opensearchrss/1.0/');
    $total = $counts->totalResults; 
    ?>
    <h1><?php echo $sxml->title; ?></h1>
    <?php echo $total; ?> photo(s) found.
    <p/>

    <?php    
    // iterate over entries in album
    // print each entry's title, size, dimensions, tags, and thumbnail image
    foreach ($sxml->entry as $entry) {
      $title = $entry->title;
      $summary = $entry->summary;
      
      $gphoto = $entry->children('http://schemas.google.com/photos/2007');
      $size = $gphoto->size;
      $height = $gphoto->height;
      $width = $gphoto->width;
      
      $media = $entry->children('http://search.yahoo.com/mrss/');
      $thumbnail = $media->group->thumbnail[1];
      $tags = $media->group->keywords;
      
      echo "<h2>$summary</h2>\n";
      echo "<table><tr><td><img src=\"" . 
      $thumbnail->attributes()->{'url'} . "\"/></td>\n";
      echo "<td><span class=\"attr\">File</span>: $title 
      <br />\n";
      echo "<span class=\"attr\">Size</span>: $size bytes 
      ($height x $width) <br />\n";
      echo "<span class=\"attr\">Tags</span>: $tags 
      </td></tr></table>\n";
    }
    ?>
    
  </body>
</html>     
