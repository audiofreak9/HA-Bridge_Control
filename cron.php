<?php
extract($_GET);
if($dev_id) {
        require_once('config.php');
        $url = "http://" . $SN . ":" . $port . "/api/c/lights/" . $dev_id . "/state";
        $data = "'{\"on\":";
        if ($dev_val == "off") {
                $percent = 0;
                $data .= "false";
        }else{
                $data .= "true";
                if(($percent) && ($percent < 100)) {
                        $data .= ", \"bri\":" . round(2.55 * $percent);
                }
        }
        $data .= "}'";
}       
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>HA Bridge Cron</title>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
</head>
<body>
<div>
<?php 
if($dev_id) {
        echo $url; 
?>
<script>
  $.ajax({
    type: 'POST',
    dataType: 'json',
    url: '<?php echo $url; ?>',
    headers: {"X-HTTP-Method-Override": "PUT"},
    data: <?php echo $data; ?>
  });
</script>
<?php
}else{
        echo "Error: no device ID specified.";
}
?>
</div>
</body>
</html>