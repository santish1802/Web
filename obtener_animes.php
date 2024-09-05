<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anime_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener animes recientes
$sql = "SELECT * FROM anime WHERE portada = 1";
$result = $conn->query($sql);

$animes = [];
if ($result->num_rows > 0) {
    // Guardar los resultados en un array
    while($row = $result->fetch_assoc()) {
        $animes[] = $row;
    }
}

$conn->close();
?>
