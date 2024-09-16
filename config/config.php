<?php 
    // $host = 'bvhokde1zvdnddgp1xkk-mysql.services.clever-cloud.com';
    // $port = '3306';
    // $dbname = 'bvhokde1zvdnddgp1xkk';
    // $username = 'uptn6lzuw8z2ofp6';
    // $password = 'PdvrUhKqEUZXF6oMLJeE';
    // $conn = new mysqli($host, $username, $password, $dbname, $port);
    
    // $host = 'localhost';
    // $dbname = 'anime_db';
    // $username = 'root';
    // $port = '3306';
    // $password = '';
    // $conn = new mysqli($host, $username, $password, $dbname);

    // Datos de conexión
    $host = 'autorack.proxy.rlwy.net';
    $port = '22439';
    $dbname = 'railway';
    $username = 'root';
    $password = 'KCsgbSvvqIYrbLbPeLYpmoULtmMoonIy';

    try {
        // Configurar la conexión PDO
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
        // Establecer el modo de errores PDO para que lance excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Mostrar un mensaje en caso de error de conexión
        die("Conexión fallida: " . $e->getMessage());
    }
?>
