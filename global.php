<?

// Global vars + functions

$UPLOAD_DIR = 'uploads/';
$ROOT_URL = 'http://192.168.250.43/~me/dropui.local/';
$ROOT_URL = 'http://dropui.com/';

function generateURL(){
  
  $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $res = "";
  $length = 4; // of URL

  for ($x = 0; $x < 1; $x++) {
    for ($i = 0; $i < $length; $i++) {
        $res .= $chars[mt_rand(0, strlen($chars)-1)];
    }
    $UPLOAD_DIR = $UPLOAD_DIR . $res . '/';
    // If folder already exists go around loop again
    if(file_exists($UPLOAD_DIR){
      $i--;
    }
  }

  return $res;
}

?>