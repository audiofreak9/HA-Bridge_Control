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
</style>
</head>
<body>
<div class="container" role="main">
<?php
require_once('config.php');
for($x = 0; $x <= count($ha_devices) - 1; $x++) {
        $dev_level = round(($ha_devices[$x]["deviceState"]["bri"] / 255)*100);
?>
        <form class="form-inline" id="<?php echo $ha_devices[$x]["id"]; ?>">
        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
                <div class="panel panel-info clearfix">
                        <div class="panel-heading clearfix">
                                <div class="col-md-8 col-lg-8 pull-left hideOverflow"><?php echo str_replace(". ", ".", ucwords(str_replace(".", ". ", $ha_devices[$x]["name"]))); ?></div>
                                <div class="col-md-4 col-lg-4 pull-right"><span class="badge l" id="l<?php echo $ha_devices[$x]["id"]; ?>"><?php echo $dev_level . '%'; ?></span></div>
                        </div>
                        <div class="panel-body row-fluid">
                                <div class="col-sm-12 col-md-5 col-lg-4 clearfix">
                                        <div class="btn-group-xs pull-left">
                                                <button type="submit" class="act btn btn-xs btn-success" name="action" value="on"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></button>
                                                <button type="submit" class="act btn btn-xs btn-danger" name="action" value="off"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></button>
                                        </div>
                                        <div class="btn-group-xs pull-left">
                                                <button type="submit" class="upd btn btn-xs btn-success" name="action" value="on"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button>
                                                <button type="submit" class="upd btn btn-xs btn-danger" name="action" value="off"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button>
                                        </div>
                                </div>
                                <div class="col-sm-12 col-md-7 col-lg-8">
                                        <div class="progress">
                                                <div class="progress-bar progress-bar-success progress-bar-striped" id="prog<?php echo $ha_devices[$x]["id"]; ?>" role="progressbar" aria-valuenow="<?php echo $dev_level; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $dev_level; ?>%">
                                                              <?php echo $dev_level . '%'; ?>
                                                </div>
                                        </div>
                                        <div class="min-height">
                                                <input class="sl" id="sl<?php echo $ha_devices[$x]["id"]; ?>" type="<?php echo ((strpos($ha_devices[$ha_val]["onUrl"],"percent") > 0)||($ha_devices[$x]["dimUrl"]))? "range" : "hidden" ; ?>" min="1" max="100" step="1" value="<?php echo (($dev_level < 100) && ($dev_level != 0)) ? $dev_level : "100"; ?>" />
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <input type="hidden" id="ps<?php echo $ha_devices[$x]["id"]; ?>" value="<?php echo (($dev_level < 100) && ($dev_level != 0)) ? $dev_level : "100"; ?>" />
        </form>
<?php
}
?>
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
