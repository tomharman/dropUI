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
        <title>DropUI – A Super-Quick iPhone Prototyping tool for Designers</title>
        
        <!-- Our CSS stylesheet file -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Gentium+Book+Basic:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="assets/css/styles.css" />

        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <script type="text/javascript">

          // if user is accessing page from an iPhone then do this...
          if (window.navigator.userAgent.indexOf('iPhone') != -1) {
        		if (window.navigator.standalone == true) {
        		  // app running from iPhone Homescreen

        		}else{
        		  // app running from iPhone Safari
        		  document.write('<h1 style="font-size: 7em; padding: 1.5em 1em">DropUI is super-quick iPhone prototyping tool for designers. <i>A computer is required to get started.</i></h1><style type="text/css">div#container { display: none; }</style>');
        		}
        	}
        </script>
    </head>
    
    <body>
      
      <div id="container">
		
  		<header>
  			<h1>A super-quick iPhone prototyping tool for designers.</h1>
  			<p><!-- Useful for remote research and demonstrating user journeys. --> Simply drag your UI comps onto the iPhone screen on the left. After uploading, these screens will be turned into a tappable iPhone webapp, "downloadable" at the URL below.</p>
    		<div id="url">
    		  <p><a href="<?= $ROOT_URL?><?= $_SESSION['public_id'] ?>"><?= $ROOT_URL?><?= $_SESSION['public_id'] ?></a></p>
          <!-- maybe add email functionality -->
    		</div>
    		<p id="demo-video">Also, here's a <a href="https://vimeo.com/51004204">demonstration video</a>.</p>
    		<div id="credits">
    		  <p>A tiny project by <a href="http://twitter.com/tomharman">@tomharman</a> with help from <a href="www.teehanlax.com/blog/iphone-gui-psd-v4/">Teehan + Lax</a> &amp; <a href="http://tutorialzine.com/2011/09/html5-file-upload-jquery-php/">Tutorial Zine</a>. Source on <a href="https://github.com/tomharman/dropUI">Github</a>. <em>Refreshing this page will start over.</em></p>
    		</div>
  		</header>
  		
	    <div id="iphone-frame">
	      <? date_default_timezone_set('America/New_York') ?>
	      <p id="iphone-time"><?= date('h:i')?></p>
    		<div id="dropbox">
    			<span class="message">Drag and Drop UI Here <br /><i>920px x 640px</i></span>
    		</div>
  		</div>

		</div>

    <!-- Including The jQuery Library -->
		<script src="http://code.jquery.com/jquery-1.6.3.min.js"></script>

		<!-- Including the HTML5 Uploader plugin -->
		<script src="assets/js/jquery.filedrop.js"></script>

		<!-- The main script file -->
    <script src="assets/js/script.js"></script>

    </body>
</html>

