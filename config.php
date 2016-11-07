<?php
//Update the $port variable to match your chosen ha-bridge port
$port = 80;
//Get Server Name (IP)
$SN = $_SERVER['SERVER_NAME'];
//Get the devices from the bridge, put them into an array
$ha_devices = json_decode(file_get_contents("http://$SN:" . $port . "/api/devices"), true);
$deviceTypes = array();
//Get each device type into an array
foreach ($ha_devices as $ha_device) $deviceTypes[] = $ha_device["deviceType"];
//Sort by device type to group similar
array_multisort($deviceTypes, SORT_DESC, $ha_devices);
//Determine half the device count
$halfval = ceil(count($ha_devices) / 2);
?>