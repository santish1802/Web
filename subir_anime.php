<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $temporada = $_POST['temporada'];
    $descripcion = $_POST['descripcion'];
    $descripcion_breve = $_POST['descripcion_breve'];
    $etiquetas = $_POST['etiquetas'];
    $opciones = isset($_POST['opciones']) ? $_POST['opciones'] : [];
    $generos = isset($_POST['generos']) ? $_POST['generos'] : [];
    $portada = isset($_POST['opciones']) && in_array('portada', $_POST['opciones']) ? 1 : 0;
    $tendencia = isset($_POST['opciones']) && in_array('tendencia', $_POST['opciones']) ? 1 : 0;
    $reciente = isset($_POST['opciones']) && in_array('reciente', $_POST['opciones']) ? 1 : 0;
    $proximo = isset($_POST['opciones']) && in_array('proximo', $_POST['opciones']) ? 1 : 0;

    // Manejo de imágenes
    $upload_dir = 'uploads/' . str_replace(' ', '-', $nombre);
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    $imagen_portada_vertical = $_FILES['imagen_portada_vertical'];
    $imagen_portada_horizontal = $_FILES['imagen_portada_horizontal'];
    $imagen_portada_vertical_path = $imagen_portada_horizontal_path = '';

    if ($imagen_portada_vertical['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $imagen_portada_vertical['tmp_name'];
        $name = basename($imagen_portada_vertical['name']);
        move_uploaded_file($tmp_name, "$upload_dir/$name");
        $imagen_portada_vertical_path = "$upload_dir/$name";
    }

    if ($imagen_portada_horizontal['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $imagen_portada_horizontal['tmp_name'];
        $name = basename($imagen_portada_horizontal['name']);
        move_uploaded_file($tmp_name, "$upload_dir/$name");
        $imagen_portada_horizontal_path = "$upload_dir/$name";
    }

    // Conectar a la base de datos
    require "php/config.php";

    // Insertar anime en la base de datos
    $sql = "INSERT INTO anime (nombre, temporada, descripcion, descripcion_breve, etiquetas, imagen_portada_vertical, imagen_portada_horizontal, portada, tendencia, reciente, proximo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssiiii", $nombre, $temporada, $descripcion, $descripcion_breve, $etiquetas, $imagen_portada_vertical_path, $imagen_portada_horizontal_path, $portada, $tendencia, $reciente, $proximo);

    if ($stmt->execute()) {
        // Obtener el ID del anime recién insertado
        $anime_id = $stmt->insert_id;

        // Insertar los géneros en la tabla anime_genero
        foreach ($generos as $genero_id) {
            $sql_genero = "INSERT INTO anime_genero (anime_id, genero_id) VALUES (?, ?)";
            $stmt_genero = $conn->prepare($sql_genero);
            $stmt_genero->bind_param("ii", $anime_id, $genero_id);
            $stmt_genero->execute();
        }

        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>
