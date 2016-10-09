<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<link href="images/startup.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<link rel="apple-touch-icon" href="images/x10switch_icon.png"/>
<title>HA-Bridge Control</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap-responsive.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<style>
body{margin:0;padding:10px 0 0 0}
.l{display:none}
</style>
</head>
<body>
<div class="container" role="main">
        <div class="panel panel-default">
                <div class="panel-heading">HA-Bridge Devices</div>
                <div class="panel-body">
<?php
require('config.php');
for($x = 0; $x <= count($ha_devices) - 1; $x++) {
        $dev_level = round(($ha_devices[$x]["deviceState"]["bri"] / 255)*100);
?>
               <div class="col-sm-3">
                        <div class="row-fluid">
                                <form class="form-inline" id="<?php echo $ha_devices[$x]["id"]; ?>">
                                        <div class="col-sm-12 col-md-12" style="margin-bottom:6px">
                                                <h4><span class="label label-primary col-xs-12"><?php echo str_replace(". ", ".", ucwords(str_replace(".", ". ", $ha_devices[$x]["name"]))); ?></span></h4>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                                <button type="submit" class="act btn btn-xs btn-success" name="action" value="on" data-toggle="tooltip" title="action"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> On</button>
                                                <button type="submit" class="act btn btn-xs btn-danger" name="action" value="off" data-toggle="tooltip" title="action"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Off</button>
                                                <button type="submit" class="upd btn btn-xs btn-info" name="action" value="on" data-toggle="tooltip" title="update"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> On</button>
                                                <button type="submit" class="upd btn btn-xs btn-info" name="action" value="off" data-toggle="tooltip" title="update"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Off</button>
                                                &nbsp;<span class="badge l" id="l<?php echo $ha_devices[$x]["id"]; ?>"><?php echo $dev_level . '%'; ?></span>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                                <div class="progress">
                                                        <div class="progress-bar progress-bar-success progress-bar-striped" id="prog<?php echo $ha_devices[$x]["id"]; ?>" role="progressbar" aria-valuenow="<?php echo $dev_level; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $dev_level; ?>%">
                                                               <?php echo $dev_level . '%'; ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12" style="margin:5px 0 10px;height:15px">
                                                <input class="sl" id="sl<?php echo $ha_devices[$x]["id"]; ?>" type="<?php echo ((strpos($ha_devices[$ha_val]["onUrl"],"percent") > 0)||($ha_devices[$x]["dimUrl"]))? "range" : "hidden" ; ?>" min="1" max="100" step="1" value="<?php echo (($dev_level < 100) && ($dev_level != 0)) ? $dev_level : "100"; ?>" />
                                                <input type="hidden" id="ps<?php echo $ha_devices[$x]["id"]; ?>" value="<?php echo (($dev_level < 100) && ($dev_level != 0)) ? $dev_level : "100"; ?>" />
                                        </div>
                                </form>
                        </div>
                </div>
<?php
}
?>
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
