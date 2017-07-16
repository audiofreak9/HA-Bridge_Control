<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
//Get the devices from the bridge, put them into an array
$ha_devices = json_decode(file_get_contents("http://$SN:" . $port . "/api/devices", false, $context), true);
//Get the first devices array keys, aka the fields to sort with
$fields = array_keys($ha_devices[0]);
//Print out the Control Area
echo controls($SN, $fields, $field, $sorts, $sort);
//Sort the ha_devices array
$deviceTypes = array();
//Get each device type into an array for sorting
foreach ($ha_devices as $ha_device) $deviceTypes[] = $ha_device[$field];
//Sort by device type to group similar
array_multisort($deviceTypes, constant($sort), $ha_devices);
//Output the devices
echo deviceLoop($ha_devices);
?>