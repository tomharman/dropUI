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
  
    <style type="text/css">
      body { background: #fff; margin: 0; padding: 0; overflow: auto; }
    </style>
    
    <script type="text/javascript">
      function OpenLink(theLink){
        window.location.href = theLink.href;
      }
      
      <? if($_GET['page']==0)?>
      if (window.navigator.userAgent.indexOf('iPhone') != -1) {
    		if (window.navigator.standalone == true) {
    			//initialize();
    			document.location.href = '<?=$ROOT_URL?>/iphone.php?id=<?= $_GET["id"]; ?>&page=0';
    		}else{
    			document.write('<img src="assets/img/iPhone-predownload.gif" />');
    		}
    	}else{
        // document.location.href = 'please-open-from-iphone.html';
    	}
    	<? } ?>
    
    </script>
    
  </head>
  <body>
  
  
  <?
  
  $dir  = getcwd() . '/uploads/' . $_GET['id'] . '/';
  $files = scandir($dir);
  
  // removes first, blank to records from array
  array_splice($files, 0, 2);
  

if($_GET['page']==0){ ?>
  
<!-- show instructions -->

  <div id="overlay">
    <nav>
      <a href="<?=$ROOT_URL?>iphone.php?id=<?= $_GET["id"]; ?>&amp;page=<?= $_GET['page']+1?>" onclick="OpenLink(this); return false">previous screen</a>
      <a href="<?=$ROOT_URL?>iphone.php?id=<?= $_GET["id"]; ?>&amp;page=<?= $_GET['page']-1?>" onclick="OpenLink(this); return false">next screen</a>
    </nav>
    <div id="meta">
      <p><?= $_GET['page']?> of <?=count($files)?></p>
      <p><a href="http://dropui.com/<?= $_GET['id']; ?>" onclick="OpenLink(this); return false">dropui.com/<?= $_GET['id']; ?></a></p>
    </div>
  </div>
  
  <img src="uploads/<?= $_GET['id']; ?>/<?=$files1[$_GET['page']]?>" width="640" height="920" />

  <!-- <img name="Instructions" src="assets/img/iPhone-instructions.png" width="640" height="920" border="0" id="Instructions" usemap="#m_Instructions" alt="" />
  <map name="m_Instructions" id="m_Instructions">
  <area shape="rect" coords="197,0,640,920" href="http://192.168.250.43/~me/dev.dropui.local/iphone.php?id=<?= $_GET["id"]; ?>&amp;page=<?= $_GET['page']+1?>"  onclick="OpenLink(this); return false" alt="" /> -->

<? } elseif($_GET['page']==count($files)) { ?>  
  
  <img name="Instructions" src="assets/img/iPhone-end.gif" width="640" height="920" border="0" id="Instructions" usemap="#m_Instructions" alt="" /><map name="m_Instructions" id="m_Instructions">
  <area shape="rect" coords="0,0,187,920" href="http://192.168.250.43/~me/dev.dropui.local/iphone.php?id=<?= $_GET["id"]; ?>&amp;page=<?= $_GET['page']-1?>" onclick="OpenLink(this); return false" alt="" />
  
<? } else { ?>

<!-- <a href="http://192.168.250.43/~me/dev.dropui.local/iphone.php?id=<?= $_GET["id"]; ?>&amp;page=<?= $_GET['page']+1?>">
   -->
  
  <img src="uploads/<?= $_GET['id']; ?>/<?=$files1[$_GET['page']]?>" width="640" height="920"  border="0" id="Instructions" usemap="#m_Instructions" alt="" /><map name="m_Instructions" id="m_Instructions" />
  <area shape="rect" coords="0,0,187,920" href="http://192.168.250.43/~me/dev.dropui.local/iphone.php?id=<?= $_GET["id"]; ?>&amp;page=<?= $_GET['page']-1?>" onclick="OpenLink(this); return false" alt="" />
  <area shape="rect" coords="197,0,640,920" href="http://192.168.250.43/~me/dev.dropui.local/iphone.php?id=<?= $_GET["id"]; ?>&amp;page=<?= $_GET['page']+1?>"  onclick="OpenLink(this); return false" alt="" />

<? } ?>  
  
    <!-- <img name="Instructions" src="assets/img/iPhone-instructions.png" width="640" height="920" border="0" id="Instructions" usemap="#m_Instructions" alt="" /><map name="m_Instructions" id="m_Instructions">
    <area shape="rect" coords="197,0,640,920" href="Instructions2.htm"  onclick="OpenLink(this); return false" alt="" /> -->
    </map>
  </body>
</html>
