<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Qdoba Street Tacos | Seattle | Free Street Tacos | Mexican Food</title>
<script type="text/javascript" src="jquery.tools.min.js"></script>
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<link href="css/pageStyles.css" rel="stylesheet" type="text/css" />
<link href="css/apple.css" rel="stylesheet" type="text/css" />

<style type="text/css">
#contentWrap {
	padding: 0px;
}
div.tiles { 
width:20%;
float:left;
display:block;
text-align:center;
padding-bottom:25px;
height:150px;
}
</style>
<script type="text/javascript">

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
              <a href="index.php"><img src="images/headerImage.png" alt="Qdoba Street Tacos" /></a>
          </div>
      </div>
</div>
<div id="wrapper">

	<div id="container">
    
        <div id="contentWrap">

        
            <div id="navWrap">
	<div id="navigation">
    	<a href="events.php"><img src="images/navEvent.png" alt="Event Photos" style="padding-right:30px;padding-left:90px;" /></a>
        <a href="index.php"><img src="images/navHome.png" alt="Event Photos" /></a>
    </div>            	
</div><!-- NAV WRAP -->            
           	<div id="pageWrap">
            	<img src="images/pageHeaderEvent.png" alt="Event Photos" style="padding-bottom:0px;" /><br /><br />

                <?php

    if ($_REQUEST['userid']) {
      $userid = $_REQUEST['userid'];
    }

    if ($_REQUEST['albumid']) {
      $albumid = $_REQUEST['albumid'];
    }

    // build feed URL
    $feedURL = "http://picasaweb.google.com/data/feed/api/user/$userid/albumid/$albumid";
    
    // read feed into SimpleXML object
    $sxml = simplexml_load_file($feedURL);
    
    // get album name and number of photos
    $counts = $sxml->children('http://a9.com/-/spec/opensearchrss/1.0/');
    $total = $counts->totalResults;
    ?>
<div class='bold' style='padding-bottom:20px;font-size:24px;'><?php echo $sxml->title; ?></div>
<p>
Thanks for hanging out at our Free Street Taco event!  We hope you had a great time and enjoyed your authentic Street Taco.  Find your photo below, and when you share it with your friends on Facebook you’ll instantly receive a coupon, redeemable at any Puget Sound area Qdoba location!
</p>
<br /><br />

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
      $thumbnail = $media->group->thumbnail[2];
      $tags = $media->group->keywords;
      
      echo "<div class='tiles'>";

      $fullsize = $media->group->content->attributes()->{'url'};

     /* echo "<a href=\"$fullsize\" >";
      
      echo "<img src=\"" .
$thumbnail->attributes()->{'url'} . "\" id=\"qdoba\"    />";
      echo "</a>";

      
      echo "</div>\n";*/
      



      echo "<a href=\"photos.php?enlargement=$fullsize&album=$albumid\" >";
      
      echo "<img src=\"" .
$thumbnail->attributes()->{'url'} . "\" id=\"qdoba\"    />";
      echo "</a>";

      
      echo "</div>\n";
      
    }
    ?>
                
            </div>   
            
    
    	</div><!-- CONTENT WRAP -->
        
        <div id="footerBack" class="boneText">
	<div id="footer">

        <div id="footerLeft">
            2011 © <a href="http://qdoba.com" target="_blank">QDOBA MEXICAN GRILL</a>
        </div>
        <div id="footerCenter">
            <a href="events.php">EVENT PHOTOS</a> | <a href="index.php">HOME</a> | <a href="pdf/officialRules.pdf" target="_blank">OFFICIAL RULES</a>

        </div>
        <div id="footerRight">
            <img src="images/footerLogo.png" alt="Qdoba" />
        </div>
    </div>
</div>
<br /><br />


    
    </div><!-- CONTAINER -->

</div><!-- WRAPPER -->

<div id="brownFooter"></div>

</body>
</html>
