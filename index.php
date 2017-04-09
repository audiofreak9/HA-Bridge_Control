<?php
require_once('config.php');
if (($_COOKIE[username] == $user) && ($_COOKIE[password] == md5($pass))) {
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
<title>HA Bridge Control</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/normalize.css">
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<style>
body{margin:0;padding:10px 0 0 0}
.l{display:none}
.btn{margin-bottom:4px}
.btn-group-xs{margin-right:4px}
.progress{margin-bottom:10px}
.min-height{height:15px}
.hideOverflow
{
    overflow:hidden;
    white-space:nowrap;
    text-overflow:ellipsis;
    width:100%;
    display:block;
}
.glyphicon.glyphicon-dot-on:before {
    content: "\25cf";
    font-size: 1.5em;
    color:green;
}
.glyphicon.glyphicon-dot-off:before {
    content: "\25cf";
    font-size: 1.5em;
    color:red;
}
</style>
</head>
<body>
<div class="container" role="main">
<?php
for($x = 0; $x <= count($ha_devices) - 1; $x++) {
        //$dev_level = round(($ha_devices[$x]["deviceState"]["bri"] / 255)*100);
        $dev_level = (is_numeric($ha_devices[$x]["deviceState"]["bri"])) ? round(($ha_devices[$x]["deviceState"]["bri"] / 255)*100) : 0;
        $bar_level = ($ha_devices[$x]["deviceState"]["on"] == 1) ? round(($ha_devices[$x]["deviceState"]["bri"] / 255)*100) : 0 ;
        require('loop.php');
}
?>
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="panel panel-default clearfix">
                        <div class="panel-heading clearfix">
                                <div class="col-md-8 col-lg-8 pull-left"><div class="hideOverflow">HA-Bridge</div></div>
                                <div class="col-md-4 col-lg-4 pull-right"></div>
                        </div>
                        <div class="panel-body row-fluid">
                                <div class="col-sm-12 col-md-5 col-lg-4 clearfix"><a href="http://<?php echo $SN; ?>">HA-Bridge</a></div>
                        </div>
                </div>
        </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
var SN = '<?php echo $SN; ?>';
var port = '<?php echo $port; ?>';
</script>
<script src="js/controlscript.js"></script>
</body>
</html>
<?php
}else{
   header('Location: login.php');
}
?>
