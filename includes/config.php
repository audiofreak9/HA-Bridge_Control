<?php
//Update the $SN variable to match your ha-bridge Server Name (IP)
$SN = "localhost";
//Update the $port variable to match your chosen ha-bridge port
$port = 80;
//Update the 'username' and 'password' to the same used for your HA Bridge's if you chose to secure the bridge
$user = 'username';
$pass = 'password';
$context = stream_context_create(array(
    'http' => array(
        'header'  => "Authorization: Basic " . base64_encode("$user:$pass")
    )
));
?>