<?php 
    $host = 'autorack.proxy.rlwy.net';
    $port = '22439';
    $dbname = 'railway';
    $username = 'root';
    $password = 'KCsgbSvvqIYrbLbPeLYpmoULtmMoonIy';
    
    $conn = new mysqli($host, $username, $password, $dbname, $port);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
?>