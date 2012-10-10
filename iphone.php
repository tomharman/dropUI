<? require_once('global.php'); ?>
<? if(isset($_GET['id'])){ $dir  = getcwd() . '/uploads/' . $_GET['id'] . '/'; } ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8" />
    <title>DropUI – A Super-Quick iPhone Prototyping tool for Designers</title>

    <meta name="viewport" content="width=device-width, user-scalable=no, height=device-height">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="none" />
  
    <base href="<?=$ROOT_URL?>" />
  
    <link rel="apple-touch-icon-precomposed" href="assets/img/iosicon.png" />
    <link rel="apple-touch-startup-image" href="assets/img/iosicon.png" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Gentium+Book+Basic:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
      
    <script type="text/javascript">
      function OpenLink(theLink){
        window.location.href = theLink.href;
      }
      
      <? if(!isset($_GET['page']) && isset($_GET['id'])) { ?>
      if (window.navigator.userAgent.indexOf('iPhone') != -1) {
    		if (window.navigator.standalone == true) {
    			//initialize();
    			document.location.href = '<?=$ROOT_URL?><?= $_GET["id"]; ?>/0';
    		}else{
    			<? if(file_exists($dir)) { ?>
    			document.write('<h1>Tap the share button below and select<br /> <i>Add to <br />Home Screen</i></h1>');
    			<? } else { ?>
    			document.write('<h1><i>DropUI</i><br />ID not found, please check and try again.</h1>');
    			<? } ?>
    		}
    	}else{
        // document.location.href = 'please-open-from-iphone.html';
        document.write('<h1>Please load this link from your iPhone</h1>');
    	}
    	<? } ?>
      // prevent user scrolling in app
      function blockMove() {
        event.preventDefault() ;
      }
    
    </script>
    
  </head>
  <body class="iPhone" ontouchmove="blockMove()">
  
  
<?  if(!isset($_GET['id'])){ ?>
  
  <h1 style="padding: 1.5em 1em">DropUI is super-quick iPhone prototyping tool for designers. <i>A computer is required to get started.</i></h1>
  
  <? } elseif(isset($_GET['page'])) {
  
  $files = scandir($dir);  
  // removes first, blank to records from array
  array_splice($files, 0, 2);
  
  ?>
  
  <!-- Instructions overlay -->
  <div id="overlay">
    <nav>
      <? if($_GET['page']!=0){?>
      <a id="overlay-previous" href="<?=$ROOT_URL?><?= $_GET["id"]; ?>/<?= $_GET['page']-1?>" onclick="OpenLink(this); return false">previous screen</a>
      <? } if($_GET['page']+1!=count($files)) { ?>
      <a id="overlay-next" href="<?=$ROOT_URL?><?= $_GET["id"]; ?>/<?= $_GET['page']+1?>" onclick="OpenLink(this); return false">next screen</a>
      <? } ?>
    </nav>
    <div id="meta">
      <p id="overlay-page"><?= $_GET['page']+1?> of <?=count($files)?></p>
      <p id="overlay-url"><a href="http://dropui.com/<?= $_GET['id']; ?>">dropui.com/<?= $_GET['id']; ?></a></p>
    </div>
  </div>
  
  <!-- Show UI -->
  <img src="uploads/<?= $_GET['id']; ?>/<?=$files[$_GET['page']]?>" width="640" height="920" />

<? } ?>  
  
  </body>
</html>
