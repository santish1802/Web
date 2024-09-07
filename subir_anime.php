<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Anime</title>
</head>
<body>
    <h1>Subir Información de Anime</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener datos del formulario
        $nombre = $_POST['nombre'] ?? '';
        $temporada = $_POST['temporada'] ?? '';
        $descripcion = $_POST['descripcion'] ?? '';
        $descripcion_breve = $_POST['descripcion_breve'] ?? '';
        $etiquetas = $_POST['etiquetas'] ?? '';
        $opciones = $_POST['opciones'] ?? [];
        $generos = $_POST['generos'] ?? [];

        // Procesar opciones
        $campos_opciones = ['portada', 'tendencia', 'reciente', 'proximo'];
        foreach ($campos_opciones as $campo) {
            $$campo = in_array($campo, $opciones) ? 1 : 0;
        }

        // Manejo de imágenes
        $upload_dir = 'uploads/' . str_replace(' ', '-', $nombre);
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $imagenes = ['vertical' => 'imagen_portada_vertical', 'horizontal' => 'imagen_portada_horizontal'];
        $rutas_imagenes = [];

        foreach ($imagenes as $tipo => $campo) {
            if ($_FILES[$campo]['error'] === UPLOAD_ERR_OK) {
                $tmp_name = $_FILES[$campo]['tmp_name'];
                $name = basename($_FILES[$campo]['name']);
                $ruta_destino = "$upload_dir/$name";
                
                if (move_uploaded_file($tmp_name, $ruta_destino)) {
                    $rutas_imagenes[$tipo] = $ruta_destino;
                }
            }
        }

        // Conectar a la base de datos
        require_once "config/config.php";

        // Insertar anime en la base de datos
        $sql = "INSERT INTO anime (nombre, temporada, descripcion, descripcion_breve, etiquetas, 
                imagen_portada_vertical, imagen_portada_horizontal, portada, tendencia, reciente, proximo)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssiiii", $nombre, $temporada, $descripcion, $descripcion_breve, $etiquetas, 
                              $rutas_imagenes['vertical'], $rutas_imagenes['horizontal'], 
                              $portada, $tendencia, $reciente, $proximo);

            if ($stmt->execute()) {
                $anime_id = $stmt->insert_id;

                // Insertar los géneros en la tabla anime_genero
                $sql_genero = "INSERT INTO anime_genero (anime_id, genero_id) VALUES (?, ?)";
                $stmt_genero = $conn->prepare($sql_genero);

                foreach ($generos as $genero_id) {
                    $stmt_genero->bind_param("ii", $anime_id, $genero_id);
                    $stmt_genero->execute();
                }

                echo "Nuevo registro creado exitosamente";
            } else {
                throw new Exception("Error al insertar el registro");
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conn->close();
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre del Anime:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="temporada">Temporada:</label>
        <input type="text" id="temporada" name="temporada" required><br><br>
        
        <label for="descripcion">Descripción del Anime:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br><br>
        
        <label for="descripcion_breve">Descripción Breve:</label><br>
        <textarea id="descripcion_breve" name="descripcion_breve" rows="2" cols="50" required></textarea><br><br>
        
        <label for="etiquetas">Etiquetas (separadas por comas):</label>
        <input type="text" id="etiquetas" name="etiquetas"><br><br>
        
        <label for="generos">Géneros:</label><br>
        <?php
        require "config/config.php";
        $sql = "SELECT id, nombre FROM genero";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<input type="checkbox" name="generos[]" value="' . $row['id'] . '">';
                echo '<label for="genero">' . $row['nombre'] . '</label><br>';
            }
        } else {
            echo 'No hay géneros disponibles.';
        }

        $conn->close();
        ?>
        <br>
        
        <label for="imagen_portada_vertical">Imagen Portada Vertical:</label>
        <input type="file" id="imagen_portada_vertical" name="imagen_portada_vertical" accept="image/*"><br><br>
        
        <label for="imagen_portada_horizontal">Imagen Portada Horizontal:</label>
        <input type="file" id="imagen_portada_horizontal" name="imagen_portada_horizontal" accept="image/*"><br><br>
        
        <label>Opciones:</label><br>
        <input type="checkbox" id="portada" name="opciones[]" value="portada">
        <label for="portada">Portada</label><br>
        <input type="checkbox" id="tendencia" name="opciones[]" value="tendencia">
        <label for="tendencia">Tendencia</label><br>
        <input type="checkbox" id="reciente" name="opciones[]" value="reciente">
        <label for="reciente">Reciente</label><br>
        <input type="checkbox" id="proximo" name="opciones[]" value="proximo">
        <label for="proximo">Próximo</label><br><br>
        
        <input type="submit" value="Subir Anime">
    </form>
</body>
</html>
