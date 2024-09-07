<?php
require_once "config/config.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de anime no válido");
}

$anime_id = intval($_GET['id']);

// Obtener datos del anime
$sql = "SELECT * FROM anime WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $anime_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Anime no encontrado");
}

$anime = $result->fetch_assoc();

// Procesar el formulario de edición
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
                
                // Eliminar imagen anterior si existe
                if (!empty($anime["imagen_portada_$tipo"]) && file_exists($anime["imagen_portada_$tipo"])) {
                    unlink($anime["imagen_portada_$tipo"]);
                }
            }
        } else {
            // Mantener la imagen existente si no se sube una nueva
            $rutas_imagenes[$tipo] = $anime["imagen_portada_$tipo"];
        }
    }

    // Actualizar anime en la base de datos
    $sql = "UPDATE anime SET nombre = ?, temporada = ?, descripcion = ?, descripcion_breve = ?, 
            etiquetas = ?, imagen_portada_vertical = ?, imagen_portada_horizontal = ?, 
            portada = ?, tendencia = ?, reciente = ?, proximo = ? WHERE id = ?";
    
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssiiiii", $nombre, $temporada, $descripcion, $descripcion_breve, 
                          $etiquetas, $rutas_imagenes['vertical'], $rutas_imagenes['horizontal'], 
                          $portada, $tendencia, $reciente, $proximo, $anime_id);

        if ($stmt->execute()) {
            // Actualizar géneros
            $conn->query("DELETE FROM anime_genero WHERE anime_id = $anime_id");
            
            $sql_genero = "INSERT INTO anime_genero (anime_id, genero_id) VALUES (?, ?)";
            $stmt_genero = $conn->prepare($sql_genero);

            foreach ($generos as $genero_id) {
                $stmt_genero->bind_param("ii", $anime_id, $genero_id);
                $stmt_genero->execute();
            }

            echo "Anime actualizado exitosamente";
        } else {
            throw new Exception("Error al actualizar el anime");
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Obtener géneros para el formulario
$generos_result = $conn->query("SELECT * FROM genero");
$todos_generos = $generos_result->fetch_all(MYSQLI_ASSOC);

// Obtener géneros actuales del anime
$generos_anime_result = $conn->query("SELECT genero_id FROM anime_genero WHERE anime_id = $anime_id");
$generos_anime = $generos_anime_result->fetch_all(MYSQLI_ASSOC);
$generos_actuales = array_column($generos_anime, 'genero_id');

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Anime</title>
</head>
<body>
    <h1>Editar Anime</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($anime['nombre']); ?>" required><br>

        <label for="temporada">Temporada:</label>
        <input type="text" id="temporada" name="temporada" value="<?php echo htmlspecialchars($anime['temporada']); ?>"><br>

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"><?php echo htmlspecialchars($anime['descripcion']); ?></textarea><br>

        <label for="descripcion_breve">Descripción Breve:</label>
        <textarea id="descripcion_breve" name="descripcion_breve"><?php echo htmlspecialchars($anime['descripcion_breve']); ?></textarea><br>

        <label for="etiquetas">Etiquetas:</label>
        <input type="text" id="etiquetas" name="etiquetas" value="<?php echo htmlspecialchars($anime['etiquetas']); ?>"><br>

        <label for="imagen_portada_vertical">Imagen Portada Vertical:</label>
        <input type="file" id="imagen_portada_vertical" name="imagen_portada_vertical"><br>
        <?php if (!empty($anime['imagen_portada_vertical'])): ?>
            <img src="<?php echo htmlspecialchars($anime['imagen_portada_vertical']); ?>" alt="Portada Vertical Actual" width="100"><br>
        <?php endif; ?>

        <label for="imagen_portada_horizontal">Imagen Portada Horizontal:</label>
        <input type="file" id="imagen_portada_horizontal" name="imagen_portada_horizontal"><br>
        <?php if (!empty($anime['imagen_portada_horizontal'])): ?>
            <img src="<?php echo htmlspecialchars($anime['imagen_portada_horizontal']); ?>" alt="Portada Horizontal Actual" width="100"><br>
        <?php endif; ?>

        <fieldset>
            <legend>Opciones:</legend>
            <input type="checkbox" id="portada" name="opciones[]" value="portada" <?php echo $anime['portada'] ? 'checked' : ''; ?>>
            <label for="portada">Portada</label><br>
            <input type="checkbox" id="tendencia" name="opciones[]" value="tendencia" <?php echo $anime['tendencia'] ? 'checked' : ''; ?>>
            <label for="tendencia">Tendencia</label><br>
            <input type="checkbox" id="reciente" name="opciones[]" value="reciente" <?php echo $anime['reciente'] ? 'checked' : ''; ?>>
            <label for="reciente">Reciente</label><br>
            <input type="checkbox" id="proximo" name="opciones[]" value="proximo" <?php echo $anime['proximo'] ? 'checked' : ''; ?>>
            <label for="proximo">Próximo</label><br>
        </fieldset>

        <fieldset>
            <legend>Géneros:</legend>
            <?php foreach ($todos_generos as $genero): ?>
                <input type="checkbox" id="genero_<?php echo $genero['id']; ?>" name="generos[]" value="<?php echo $genero['id']; ?>" 
                    <?php echo in_array($genero['id'], $generos_actuales) ? 'checked' : ''; ?>>
                <label for="genero_<?php echo $genero['id']; ?>"><?php echo htmlspecialchars($genero['nombre']); ?></label><br>
            <?php endforeach; ?>
        </fieldset>

        <input type="submit" value="Actualizar Anime">
    </form>
</body>
</html>