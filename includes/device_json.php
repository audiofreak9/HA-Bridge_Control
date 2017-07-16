<?php
header('Content-Type: application/json');
require_once 'config.php';
//Get the devices from the bridge, put them into an array
$ha_devices = json_decode(file_get_contents("http://$SN:" . $port . "/api/devices", false, $context), true);
$deviceTypes = array();
//Get each device type into an array for sorting
foreach ($ha_devices as $ha_device) $deviceTypes[] = $ha_device["deviceType"];
//Sort by device type to group similar
array_multisort($deviceTypes, SORT_DESC, $ha_devices);
//Output the devices
echo json_encode($ha_devices);
?>