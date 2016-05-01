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
<title>X10 Bridge Control</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
                <div class="panel-heading">Devices</div>
                <div class="panel-body">
<?php
//Server Name variable
$SN = $_SERVER['SERVER_NAME'];
$rm = array($SN, "http://localhost/", "echo.php?", "action", "hu", "off", "=", "&");
//Get the devices from the bridge, put them into an array
$ha_devices = json_decode(file_get_contents("http://$SN:8080/api/devices"), true);
$deviceTypes = array();
//Get each device type into an array
foreach ($ha_devices as $ha_device) $deviceTypes[] = $ha_device["deviceType"];
//Sort by device type to group similar
array_multisort($deviceTypes, SORT_DESC, $ha_devices);
//Determine half the device count
$halfval = ceil(count($ha_devices) / 2);
for($x = 0; $x <= count($ha_devices) - 1; $x++) {
        $dev_level = round(($ha_devices[$x]["deviceState"]["bri"] / 255)*100);
?>
                <div class="col-sm-4">
                        <div class="row-fluid">
                                <form class="form-inline" id="<?php echo $ha_devices[$x]["id"]; ?>">
                                        <div class="col-sm-12 col-md-6">
                                                <div class="label label-info col-xs-12" style="padding-top:4px">
                                                        <?php echo str_replace(". ", ".", ucwords(str_replace(".", ". ", $ha_devices[$x]["name"]))); ?>
                                                </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                                <button type="submit" class="btn btn-xs btn-success" name="action" value="on">On</button>
                                                <button type="submit" class="btn btn-xs btn-danger" name="action" value="off">Off</button>
                                                &nbsp;<span class="badge l" id="l<?php echo $ha_devices[$x]["id"]; ?>"><?php echo $dev_level . '%'; ?></span>
                                         </div>
                                        <div class="col-sm-12 col-md-12" style="margin-top:10px;height:15px">
                                                <input class="ps" type="<?php echo ((strpos($ha_devices[$ha_val]["onUrl"],"percent") > 0)||($ha_devices[$x]["dimUrl"]))? "range" : "hidden" ; ?>" min="1" max="100" step="1" value="<?php echo (($dev_level < 100) && ($dev_level != 0)) ? $dev_level : "100"; ?>" />
                                                <input type="hidden" id="sl<?php echo $ha_devices[$x]["id"]; ?>" value="<?php echo (($dev_level < 100) && ($dev_level != 0)) ? $dev_level : "100"; ?>" />
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                                <div class="progress">
                                                        <div class="progress-bar progress-bar-success progress-bar-striped" id="prog<?php echo $ha_devices[$x]["id"]; ?>" role="progressbar" aria-valuenow="<?php echo $dev_level; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $dev_level; ?>%">
                                                               <?php echo $dev_level . '%'; ?>
                                                        </div>
                                                </div>
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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js?ver=CDN"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
$(".btn").click(function() {
  var dev_id = $(this).closest("form").attr('id');
  var dev_val = $(this).val();
  var dev_per = $('#sl' + dev_id).attr('value');
  var data = '{"on":';
  if(dev_val == "off") {
    percent = 0;
    data += 'false';
  }else{
    percent = dev_per;
    data += 'true';
    if(dev_per < 100) {
      data += ', "bri":' + Math.round(2.55 * dev_per);
    }
  }
  data += '}';
  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: 'http://<?php echo $SN; ?>:8080/api/c/lights/' + dev_id + '/state',
    headers: {"X-HTTP-Method-Override": "PUT"},
    data: data,
    success : updateProgress(percent, dev_id)
  });
  return false;
});
$('.ps').on("change", function() {
    var my_id = $(this).closest("form").attr('id');
    var level = $(this).val();
    $('#sl' + my_id).val(level);
    $('#l' + my_id).html(level + '%').fadeIn( 400 ).delay( 800 ).fadeOut( 400 ); 
});
function updateProgress(percent, dev_id){
    if(percent > 100) percent = 100;
    $('#prog' + dev_id).css('width', percent+'%');
    $('#prog' + dev_id).html(percent+'%');
}
</script>
</body>
</html>
