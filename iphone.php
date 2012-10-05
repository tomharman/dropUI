<? require_once('global.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="utf-8" />
    <title>Drop UI</title>

    <meta name="viewport" content="user-scalable=no">
    <meta name="viewport" content="width=device-width">
    <link rel="apple-touch-icon-precomposed" href="assets/img/iosicon.png">
    <link rel="apple-touch-startup-image" href="assets/img/iosicon.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="none" />
  
    <base href="<?=$ROOT_URL?>" />
  
    <link rel="stylesheet" href="assets/css/styles.css" />
      
    <script type="text/javascript">
      function OpenLink(theLink){
        window.location.href = theLink.href;
      }
      
      <? if(!isset($_GET['page'])){?>
      if (window.navigator.userAgent.indexOf('iPhone') != -1) {
    		if (window.navigator.standalone == true) {
    			//initialize();
    			document.write('TTTTEST: <?=$ROOT_URL?>i/<?= $_GET["id"]; ?>/0');
    			document.location.href = '<?=$ROOT_URL?>i/<?= $_GET["id"]; ?>/0';
    		}else{
    			document.write('<img src="assets/img/iPhone-predownload.gif" />');
    		}
    	}else{
        // document.location.href = 'please-open-from-iphone.html';
    	}
    	<? } ?>
    
    </script>
    
  </head>
  <body class="iPhone">
  
  
  <?
  
  $dir  = getcwd() . '/uploads/' . $_GET['id'] . '/';
  $files = scandir($dir);
  
  // removes first, blank to records from array
  array_splice($files, 0, 2);
  

if(isset($_GET['page'])){ ?>
  
  <!-- Instructions overlay -->
  <div id="overlay">
    <nav>
      <? if($_GET['page']!=0){?>
      <a id="overlay-previous" href="<?=$ROOT_URL?>i/<?= $_GET["id"]; ?>/<?= $_GET['page']-1?>" onclick="OpenLink(this); return false">previous screen</a>
      <? } if($_GET['page']+1!=count($files)) { ?>
      <a id="overlay-next" href="<?=$ROOT_URL?>i/<?= $_GET["id"]; ?>/<?= $_GET['page']+1?>" onclick="OpenLink(this); return false">next screen</a>
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
