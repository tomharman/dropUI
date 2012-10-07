<?
  
  require_once('global.php');
  session_start();
  
  // Each time the page is loaded, generate new random public id
  unset($_SESSION['public_id']);
  $_SESSION['public_id'] = generateURL();
  $_SESSION['upload_dir'] = $UPLOAD_DIR . $_SESSION['public_id'] . '/';

?>

<!DOCTYPE html>
<html>
    <head>
      
        <meta charset="utf-8" />
        <title>Drop UI – A Super Quick iPhone Prototyping tool for Designers</title>
        
        
        <!-- Our CSS stylesheet file -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gentium+Book+Basic:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/styles.css" />
        
        
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    
    <body>
      
      <? if(isset($_GET['id'])){ ?>

      <h1>Please load this link from your iPhone</h1>

      <? } else { ?>
      
      <div id="container">
		
  		<header>
  			<h1>A super-quick iPhone prototyping tool for designers.</h1>
  			<p><!-- Useful for remote research and demonstrating user journeys. --> To get started, simply drag your UI comps onto the iPhone screen on the left. After uploading, these screens will be turned into a tappable iPhone webapp, accessible at the URL below. Be careful not to refresh the page, or you'll have to start again.</p>
    		<div id="url">
    		  <p><a href="<?= $ROOT_URL?><?= $_SESSION['public_id'] ?>"><?= $ROOT_URL?><?= $_SESSION['public_id'] ?></a></p>
          <!-- maybe add email functionality -->
    		</div>
    		<div id="credits">
    		  <p>A small project by <a href="http://twitter.com/tomharman">@tomharman</a> with help from <a href="www.teehanlax.com/blog/iphone-gui-psd-v4/">Teehan + Lax's iPhone PSD</a> and <a href="http://tutorialzine.com/2011/09/html5-file-upload-jquery-php/">this HTML5 upload tutorial</a>. Source on <a href="https://github.com/tomharman/dropUI">Github</a>.</p>
    		</div>
  		</header>
	  <!-- <img src="assets/img/iPhone.png" width="403" height="868" alt="IPhone" /> -->
	    <div id="iphone-frame">
	      <? date_default_timezone_set('America/New_York') ?>
	      <p id="iphone-time"><?= date('h:i')?></p>
    		<div id="dropbox">
    			<span class="message">Drag and Drop UI Here <br /><i>920px x 640px</i></span>
    		</div>
  		</div>

		</div>
      
      <? } ?>
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
      		  <? if(isset($_GET['id'])){ ?>
      		    // no id specified, throw an error or say you need to add images from a computer
      		  <? } ?>
        		  document.location.href = '<?=$ROOT_URL?>i/<?= $_GET["id"]; ?>';
        		  // - show generic instructions on how to download 'app' to homescreen, iPhone optimized
      		}
      	}
      </script>

    </body>
</html>

