<?php 
    // $host = 'bvhokde1zvdnddgp1xkk-mysql.services.clever-cloud.com';
    // $port = '3306';
    // $dbname = 'bvhokde1zvdnddgp1xkk';
    // $username = 'uptn6lzuw8z2ofp6';
    // $password = 'PdvrUhKqEUZXF6oMLJeE';
    // $conn = new mysqli($host, $username, $password, $dbname, $port);
    
    $host = 'autorack.proxy.rlwy.net';
    $port = '22439';
    $dbname = 'railway';
    $username = 'root';
    $password = 'KCsgbSvvqIYrbLbPeLYpmoULtmMoonIy';
    $conn = new mysqli($host, $username, $password, $dbname, $port);

    // $host = 'localhost';
    // $dbname = 'anime_db';
    // $username = 'root';
    // $password = '';
    // $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
?>