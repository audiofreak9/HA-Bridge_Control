<?php
//Logout the user when logout is clicked
if ($_GET['logout'] == "true") {
        setcookie('username', "username", time()-60);
        setcookie('password', "invalid", time()-60);
        header('Location: http://' . $_SERVER['SERVER_ADDR'] . ':' . $_SERVER['SERVER_PORT'] . '/login.php');
        exit;
}
//Get the config settings
require_once 'includes/config.php';
//Get the functions file
require_once 'includes/functions.php';
if (($_COOKIE[username] == $user) && ($_COOKIE[password] == md5($pass))) {
        //Get & build variables
        $sort = "SORT_";
        $sort .= ($_GET['sort'] != "") ? $_GET['sort'] : "ASC" ;
        $field = ($_GET['field'] != "") ? $_GET['field'] : "name" ;
        $sorts = array("ASC","DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link href="images/startup.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<link rel="apple-touch-icon" href="images/x10switch_icon.png"/>
<title>HA Bridge Control</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/css/bootstrap-slider.min.css">
<link rel="stylesheet" href="css/control.css">
</head>
<body>
<div class="container" role="main">
<?php
//Get the devices
include 'includes/get_devices.php';
?>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.8.0/bootstrap-slider.min.js"></script>
<script>
var SN = '<?php echo $SN; ?>';
var port = '<?php echo $port; ?>';
</script>
<script src="js/control.js"></script>
</body>
</html>
<?php
}else{
   header('Location: login.php');
}
?>
