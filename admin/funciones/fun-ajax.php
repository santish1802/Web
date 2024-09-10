<?php

// @c-red MODAL
require "../../config/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_modal'])) {
    $id_modal = $_POST['id_modal'];
    // Consulta SQL modificada para obtener datos del usuario con ID 
    $sql = "SELECT anime.id, anime.nombre, anime.temporada, anime.descripcion, anime.descripcion_breve, anime.imagen_portada_horizontal, anime.imagen_portada_vertical, GROUP_CONCAT(genero.nombre SEPARATOR ', ') AS generos, anime.portada, anime.tendencia, anime.reciente, anime.proximo FROM anime JOIN anime_genero ON anime.id = anime_genero.anime_id JOIN genero ON genero.id = anime_genero.genero_id WHERE anime.id = ? GROUP BY anime.id;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_modal);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Crear una tabla para mostrar los datos del usuario
        echo '<table class="table pers" border="1">';
        // Mostrar los datos del usuario
        while ($row = $result->fetch_assoc()) {
            echo '<tr><td class="td_gris">ID</td><td>' . $row["id"] . '</td></tr>';
            echo '<tr><td class="td_gris">Nombre</td><td>' . $row["nombre"] . '</td></tr>';
            echo '</ul></td></tr>';
            echo '<tr><td class="td_gris">Balones prestados</td><td>' . $row["temporada"] . '</td></tr>';
            echo '<tr><td class="td_gris">Descripcio</td><td>' . $row["descripcion"] . '</td></tr>';
            echo '<tr><td class="td_gris">D. Breve</td><td>' . $row["descripcion_breve"] . '</td></tr>';
            echo '<tr><td class="td_gris">Img. Vertical</td><td><img class="w-100" src="/' . $row["imagen_portada_vertical"] . '" alt=""></td></tr>';
            echo '<tr><td class="td_gris">Img. Horizontal</td><td>' . $row["imagen_portada_horizontal"] . '</td></tr>';
        }
        echo '</table>';
    }
    $stmt->close();
    $conn->close();
}
// @c-red EDITAR ANIME
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_edit'])) {
    $anime_id = intval($_POST['anime_id']);

    // Obtener datos del formulario
    $campos = ['nombre', 'nombre_h', 'temporada', 'descripcion', 'descripcion_breve', 'etiquetas'];
    foreach ($campos as $campo) {
        $$campo = $_POST[$campo] ?? '';
    }
    $opciones = $_POST['opciones'] ?? [];
    $generos = $_POST['generos'] ?? [];

    // Procesar opciones
    $campos_opciones = ['portada', 'tendencia', 'reciente', 'proximo'];
    foreach ($campos_opciones as $campo) {
        $$campo = in_array($campo, $opciones) ? 1 : 0;
    }

    // Manejo de imágenes
    $upload_dir = '../../uploads/' . str_replace(' ', '-', $nombre_h);
    if ($nombre !== $nombre_h) {
        $new_upload_dir = '../../uploads/' . str_replace(' ', '-', $nombre);
        
        // Renombrar el directorio si existe
        if (is_dir($upload_dir)) {
            !@rename($upload_dir, $new_upload_dir);
        }
        
        // Actualizar la variable $upload_dir
        $upload_dir = $new_upload_dir;
    }
    
    // Crear el directorio si no existe
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $imagenes = ['vertical' => 'imagen_portada_vertical', 'horizontal' => 'imagen_portada_horizontal'];
    $rutas_imagenes = [];

    // Obtener datos actuales del anime
    $stmt = $conn->prepare("SELECT imagen_portada_vertical, imagen_portada_horizontal FROM anime WHERE id = ?");
    $stmt->bind_param("i", $anime_id);
    $stmt->execute();
    $anime = $stmt->get_result()->fetch_assoc();

    foreach ($imagenes as $tipo => $campo) {
        if ($_FILES[$campo]['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES[$campo]['tmp_name'];
            $name = basename($_FILES[$campo]['name']);
            $ruta_destino = "$upload_dir/$name";

            if (move_uploaded_file($tmp_name, $ruta_destino)) {
                $rutas_imagenes[$tipo] = $ruta_destino;

                // Eliminar imagen anterior si existe
                if (!empty($anime[$campo]) && file_exists($anime[$campo])) {
                    unlink($anime[$campo]);
                }
            }
        } else {
            // Mantener la imagen existente si no se sube una nueva
            $rutas_imagenes[$tipo] = $anime[$campo];
        }
    }

    // Actualizar anime en la base de datos
    $sql = "UPDATE anime SET nombre = ?, temporada = ?, descripcion = ?, descripcion_breve = ?, 
            etiquetas = ?, imagen_portada_vertical = ?, imagen_portada_horizontal = ?, 
            portada = ?, tendencia = ?, reciente = ?, proximo = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssiiiii",
        $nombre,
        $temporada,
        $descripcion,
        $descripcion_breve,
        $etiquetas,
        $rutas_imagenes['vertical'],
        $rutas_imagenes['horizontal'],
        $portada,
        $tendencia,
        $reciente,
        $proximo,
        $anime_id
    );

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
        echo "Error al actualizar el anime";
    }

    $conn->close();
}
// @c-red CREAR ANIME
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_crear'])) {
    // Obtener datos del formulario
    $campos = ['nombre', 'temporada', 'descripcion', 'descripcion_breve', 'etiquetas'];
    foreach ($campos as $campo) {
        $$campo = $_POST[$campo] ?? '';
    }
    $opciones = $_POST['opciones'] ?? [];
    $generos = $_POST['generos'] ?? [];

    // Procesar opciones
    $campos_opciones = ['portada', 'tendencia', 'reciente', 'proximo'];
    foreach ($campos_opciones as $campo) {
        $$campo = in_array($campo, $opciones) ? 1 : 0;
    }

    // Manejo de imágenes
    $upload_dir = '../../uploads/' . str_replace(' ', '-', $nombre);
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
    // Insertar anime en la base de datos
    $sql = "INSERT INTO anime (nombre, temporada, descripcion, descripcion_breve, etiquetas, 
            imagen_portada_vertical, imagen_portada_horizontal, portada, tendencia, reciente, proximo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssssssiiii",
            $nombre,
            $temporada,
            $descripcion,
            $descripcion_breve,
            $etiquetas,
            $rutas_imagenes['vertical'],
            $rutas_imagenes['horizontal'],
            $portada,
            $tendencia,
            $reciente,
            $proximo
        );

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
// @c-red ELIMINAR ANIME
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_el'])) {
    $id = $_POST['id_el']; // Obtener el ID de usuario de la URL
    $sql = "DELETE FROM anime WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}