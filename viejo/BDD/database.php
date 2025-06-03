<?php
	$server = 'bpbgexskftr7azw9xubh-mysql.services.clever-cloud.com';
    $username = 'u0zzibaomfiuuuhw';
    $password = 'nYwYpmoFrx3xQ4uVwJgq';
    $database = 'bpbgexskftr7azw9xubh';

    $mysqli = new mysqli($server, $username, $password, $database);

    if ($mysqli->connect_error) {
        die("Conexión fallida: " . $mysqli->connect_error);
    }
?>