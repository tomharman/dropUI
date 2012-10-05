<?
  
  require_once('global.php');
  session_start();
  
  // Each time the page is loaded, generate new random public id
  unset($_SESSION['public_id']);
  $_SESSION['public_id'] = generateURL();

?>

<!DOCTYPE html>
<html>
    <head>
      
        <meta charset="utf-8" />
        <title>Drop UI – A Super Quick iPhone Prototyping tool for Designers</title>
        
        <!-- Our CSS stylesheet file -->
        <link rel="stylesheet" href="assets/css/styles.css" />
        
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    
    <body>
		
		<header>
			<h1>HTML5 File Upload with jQuery and PHP</h1>
			<p>url: <?= $_SESSION['public_id'] ?></p>
		</header>
		
		<div id="dropbox">
			<span class="message">Drop images here to upload. <br /><i>(they will only be visible to you)</i></span>
		</div>
		
        <footer>
	        <h2>HTML5 File Upload with jQuery and PHP</h2>
            <a class="tzine" href="http://tutorialzine.com/2011/09/html5-file-upload-jquery-php/">Read &amp; Download on</a>
        </footer>
        
        <!-- Including The jQuery Library -->
    		<script src="http://code.jquery.com/jquery-1.6.3.min.js"></script>
		
    		<!-- Including the HTML5 Uploader plugin -->
    		<script src="assets/js/jquery.filedrop.js"></script>
		
    		<!-- The main script file -->
        <script src="assets/js/script.js"></script>
        
        <script type="text/javascript">
          
          // if user is accessing page from an iPhone then do this...
          if (window.navigator.userAgent.indexOf('iPhone') != -1) {
        		if (window.navigator.standalone == true) {
        		  // app running from iPhone Homescreen
              
        		}else{
        		  // app running from iPhone Safari
        		  <? if(!isset($_GET['id'])){ ?>
        		    // no id specified, throw an error or say you need to add images from a computer
        		  <? } ?>
          		  document.location.href = '<?=$ROOT_URL?>iphone.php?id=<?= $_GET["id"]; ?>&amp;page=0';
          		  // - show generic instructions on how to download 'app' to homescreen, iPhone optimized
        		}
        	}
        </script>
        
    
    </body>
</html>

