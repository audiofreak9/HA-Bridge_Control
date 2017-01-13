<?php
require_once('config.php');
if (($_POST['username'] == $user) && ($_POST['password'] == $pass)) {
    if (isset($_POST['rememberme'])) {
        /* Set cookie to last 1 year */
        setcookie('username', $_POST['username'], time()+60*60*24*365);
        setcookie('password', md5($_POST['password']), time()+60*60*24*365);
    } else {
        /* Cookie expires when browser closes */
        setcookie('username', $_POST['username']);
        setcookie('password', md5($_POST['password']));
     }
     header('Location: /control');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link href="images/startup.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<link rel="apple-touch-icon" href="images/x10switch_icon.png"/>
<title>HA Bridge Control - Login</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<style>
body{margin:0;padding:10px 0 0 0}
.btn{margin-bottom:4px}
.min-height{height:35px}
</style>
<body>
<div class="container" role="main">
        <div class="col-xs-12 col-xs-offset-0 col-md-6 col-md-offset-3">
                <div class="panel panel-info clearfix">
                        <div class="panel-heading clearfix">Login</div>
                        <div class="panel-body row-fluid clearfix">
                                <form name="login" method="post" class="form-inline" action="login.php">
                                <div class="col-xs-12 col-sm-3 col-md-4 pull-left min-height">Username: </div><div class="col-xs-12 col-sm-9 col-md-8 pull-left min-height"><input type="text" name="username"></div>
                                <div class="col-xs-12 col-sm-3 col-md-4 pull-left min-height">Password: </div><div class="col-xs-12 col-sm-9 col-md-8 pull-left min-height"><input type="password" name="password"></div>
                                <div class="col-xs-12 min-height clear">Remember Me: <input type="checkbox" name="rememberme" value="1"></div>
                                <div class="col-xs-12 min-height"><button type="submit" class="btn btn-xs">Login</button></div>
                                </form>
                        </div>
                </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
