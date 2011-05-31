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

                
<div class='bold' style='padding-bottom:20px;font-size:24px;'><?php echo $sxml->title; ?></div>

<!--  smart back button -->
<?php 

$albumid = urlencode($_GET["albumid"]);
$userid = urlencode($_GET["userid"]);

echo "<a href=\"album.php?albumid=$albumid&userid=$userid\">Back to Photos</a>"

?>
<p>

<br /> <br />
Share your photo with your friends on Facebook you’ll instantly receive a coupon, redeemable at any Puget Sound area Qdoba location!</p>
<br /><br />

<?php

      
      echo "<div class='photo'>";
      
$big = $_GET['enlargement'];

echo "<img src=\"$big\">";

    
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