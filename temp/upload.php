<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Anime</title>
</head>
<body>
    <h1>Subir Información de Anime</h1>
    <form action="subir_anime.php" method="post" enctype="multipart/form-data">
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
