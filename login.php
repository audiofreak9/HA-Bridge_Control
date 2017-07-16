<?php
require_once 'includes/config.php';
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
     header('Location: /');
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
        <div class="col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div class="panel panel-primary clearfix">
                        <div class="panel-heading clearfix text-center"><h4>HA Bridge Control Login <span class="glyphicon glyphicon-log-in"></span></h4></div>
                        <div class="panel-body row-fluid form-group clearfix">
                                <form name="login" method="post" class="form" action="login.php">
                                <div class="form-group"><label for="username"><span class="glyphicon glyphicon-user"></span> Username:</label><input type="text" class="form-control input-lg" name="username" placeholder="Username"></div>
                                <div class="form-group"><label for="password"><span class="glyphicon glyphicon-lock"></span> Password:</label><input type="password" class="form-control input-lg" name="password" placeholder="Password"></div>
                                <div class="form-group"><input type="checkbox" name="rememberme" value="1">&nbsp;&nbsp;Remember Me</div>
                                <div><button type="submit" class="btn btn-default btn-block input-lg">Login</button></div>
                                </form>
                        </div>
                </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>