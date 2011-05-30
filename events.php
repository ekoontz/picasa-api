<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Qdoba Street Tacos | Seattle | Free Street Tacos | Mexican Food</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/pageStyles.css" rel="stylesheet" type="text/css">
<style type="text/css">
#contentWrap {
	padding: 0px;
	height: 700px;
}

.eventItem {
	 width:230px;
	 height:235px;
	 float:left; 
	 position:relative; 
}

.galleryRowLast {
	
}
div.tiles { 
width:25%;
float:left;
display:block;
text-align:center;
padding-bottom:25px;
height:150px;
}

</style>
<script src="js/ga.js" async="" type="text/javascript"></script><script type="text/javascript">

function roll(img_name, img_src) {
   document[img_name].src = img_src;
}

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22082458-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>

<div id="headerWrap">
      <div id="header">
          <div id="headerImage">
              <a href="http://qdobastreettacos.com/index.php"><img src="images/headerImage.png" alt="Qdoba Street Tacos"></a>
          </div>
      </div>
</div>
<div id="wrapper">

	<div id="container">
    
        <div id="contentWrap">
        
            <div id="navWrap">
	<div id="navigation">
    	<a href="http://qdobastreettacos.com/events.php"><img src="images/navEvent.png" alt="Event Photos" style="padding-right: 30px; padding-left: 90px;"></a>
        <a href="http://qdobastreettacos.com/index.php"><img src="images/navHome.png" alt="Event Photos"></a>
    </div>            	
</div><!-- NAV WRAP -->            
           	<div id="pageWrap">
            	<img src="images/pageHeaderEvent.png" alt="Event Photos" style="padding-bottom: 0px;"><br><br>                 
                <div id="photoGallery">
                <!-- include code for gallery-->
                    
<?php
    $userid = 'cooper81';
    
// build feed URL
$feedURL = "http://picasaweb.google.com/data/feed/api/user/$userid?kind=album";
    
// read feed into SimpleXML object
$sxml = simplexml_load_file($feedURL);
    
// get album names and number of photos in each
//echo "<ul>";
foreach ($sxml->entry as $entry) {
  $media = $entry->children('http://search.yahoo.com/mrss/'); // test if $media = url
  $title = $entry->title;
  $gphoto = $entry->children('http://schemas.google.com/photos/2007');
  $numphotos = $gphoto->numphotos;
  $albumid = $gphoto->id;

  $link = "album.php?albumid=$albumid&amp;userid=$userid";

  $thumbnail = get_thumbnail($userid,$albumid);

 /* echo "<li><a href='$link'><img src='$thumbnail'/></a><a href='$link'>$title</a></li>\n";  */
  
echo "<div class='tiles'><a href='$link'><img src='$thumbnail'/></a><br /><a href='$link'>$title</a></div>"; 


 
}
 
 //echo "</ul>";
    ?>                    
                    
         
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
                    
                    
                    
                </div> <!-- PhotoGallery END -->   
            </div> <!-- PAGE WRAP END -->  
    	</div><!-- CONTENT WRAP -->
        
        <div id="footerBack" class="boneText">
	<div id="footer">
        <div id="footerLeft">
            2011 © <a href="http://qdoba.com/" target="_blank">QDOBA MEXICAN GRILL</a>
        </div>
        <div id="footerCenter">
            <a href="http://qdobastreettacos.com/events.php">EVENT PHOTOS</a> | <a href="http://qdobastreettacos.com/index.php">HOME</a> | <a href="http://qdobastreettacos.com/pdf/officialRules.pdf" target="_blank">OFFICIAL RULES</a>
        </div>
        <div id="footerRight">
            <img src="images/footerLogo.png" alt="Qdoba">
        </div>
    </div>
</div>
<br><br>


    
    </div><!-- CONTAINER -->

</div><!-- WRAPPER -->

<div id="brownFooter"></div>


</body></html>