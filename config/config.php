<?php 
    // $host = 'bvhokde1zvdnddgp1xkk-mysql.services.clever-cloud.com';
    // $port = '3306';
    // $dbname = 'bvhokde1zvdnddgp1xkk';
    // $username = 'uptn6lzuw8z2ofp6';
    // $password = 'PdvrUhKqEUZXF6oMLJeE';
    
    $host = 'localhost';
    $port = '3306';
    $dbname = 'anime_db';
    $username = 'root';
    $password = '';

    // $host = 'junction.proxy.rlwy.net';
    // $port = '10848';
    // $dbname = 'railway';
    // $username = 'root';
    // $password = 'iChUyHhupzleykMnYbmAuOudrQDGWMIb';

    $conn = new mysqli($host, $username, $password, $dbname, $port);
    
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
?>