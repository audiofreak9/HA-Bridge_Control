<?php
//Update the $SN variable to match your ha-bridge Server Name (IP)
$SN = $_SERVER['SERVER_NAME'];
//Update the $port variable to match your chosen ha-bridge port
$port = 80;
//Update the username and password to your choice
$user = 'username';
$pass = 'password';
//Get the devices from the bridge, put them into an array
$ha_devices = json_decode(file_get_contents("http://$SN:" . $port . "/api/devices"), true);
$deviceTypes = array();
//Get each device type into an array for sorting
foreach ($ha_devices as $ha_device) $deviceTypes[] = $ha_device["deviceType"];
//Sort by device type to group similar
array_multisort($deviceTypes, SORT_DESC, $ha_devices);
?>