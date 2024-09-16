<?php

// @c-red MODAL
require "../../config/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_modal'])) {
    $id_modal = $_POST['id_modal'];

    // Consulta SQL para obtener datos del anime con su ID
    $sql = "SELECT anime.id, anime.nombre, anime.temporada, anime.descripcion, anime.descripcion_breve, anime.imagen_portada_horizontal, anime.imagen_portada_vertical, GROUP_CONCAT(genero.nombre SEPARATOR ', ') AS generos, anime.portada, anime.tendencia, anime.reciente, anime.proximo 
            FROM anime 
            JOIN anime_genero ON anime.id = anime_genero.anime_id 
            JOIN genero ON genero.id = anime_genero.genero_id 
            WHERE anime.id = ? 
            GROUP BY anime.id;";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_modal);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<table class="table pers" border="1">';
        while ($row = $result->fetch_assoc()) {
            echo '<tr><td class="td_gris">ID</td><td>' . $row["id"] . '</td></tr>';
            echo '<tr><td class="td_gris">Nombre</td><td>' . $row["nombre"] . '</td></tr>';
            echo '<tr><td class="td_gris">Temporada</td><td>' . $row["temporada"] . '</td></tr>';
            echo '<tr><td class="td_gris">Descripción</td><td>' . $row["descripcion"] . '</td></tr>';
            echo '<tr><td class="td_gris">Descripción Breve</td><td>' . $row["descripcion_breve"] . '</td></tr>';
            echo '<tr><td class="td_gris">Img. Vertical</td><td><img src="/' . $row["imagen_portada_vertical"] . '" alt=""></td></tr>';
            echo '<tr><td class="td_gris">Img. Horizontal</td><td><img src="/' . $row["imagen_portada_horizontal"] . '" alt=""></td></tr>';
        }
        echo '</table>';
    }


    $conn->close();
}
// @c-red EDITAR ANIME
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_edit'])) {
    $anime_id = intval($_POST['anime_id']);

    $campos = ['nombre', 'nombre_h', 'temporada', 'descripcion', 'descripcion_breve', 'etiquetas'];
    foreach ($campos as $campo) {
        $$campo = $_POST[$campo] ?? '';
    }
    $opciones = $_POST['opciones'] ?? [];
    $generos = $_POST['generos'] ?? [];

    $campos_opciones = ['portada', 'tendencia', 'reciente', 'proximo'];
    foreach ($campos_opciones as $campo) {
        $$campo = in_array($campo, $opciones) ? 1 : 0;
    }

    $upload_dir = '../../uploads/' . str_replace(' ', '-', $nombre_h);
    if ($nombre !== $nombre_h) {
        $new_upload_dir = '../../uploads/' . str_replace(' ', '-', $nombre);

        if (is_dir($upload_dir)) {
            @rename($upload_dir, $new_upload_dir);
        }

        $upload_dir = $new_upload_dir;
    }

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $imagenes = ['vertical' => 'imagen_portada_vertical', 'horizontal' => 'imagen_portada_horizontal'];
    $rutas_imagenes = [];

    $stmt = $conn->prepare("SELECT imagen_portada_vertical, imagen_portada_horizontal FROM anime WHERE id = ?");
    $stmt->execute([$anime_id]);
    $anime = $stmt->fetch(PDO::FETCH_ASSOC);

    foreach ($imagenes as $tipo => $campo) {
        if ($_FILES[$campo]['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES[$campo]['tmp_name'];
            $name = basename($_FILES[$campo]['name']);

            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $unique_name = uniqid() . '.' . $ext;
            $ruta_destino = "$upload_dir/$unique_name";

            if (move_uploaded_file($tmp_name, $ruta_destino)) {
                $rutas_imagenes[$tipo] = $ruta_destino;

                if (!empty($anime[$campo]) && file_exists($anime[$campo])) {
                    unlink($anime[$campo]);
                }
            }
        } else {
            $rutas_imagenes[$tipo] = $anime[$campo];
        }
    }

    $sql = "UPDATE anime SET nombre = ?, temporada = ?, descripcion = ?, descripcion_breve = ?, 
            etiquetas = ?, imagen_portada_vertical = ?, imagen_portada_horizontal = ?, 
            portada = ?, tendencia = ?, reciente = ?, proximo = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
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
    ]);

    if ($stmt) {
        $conn->query("DELETE FROM anime_genero WHERE anime_id = $anime_id");

        $sql_genero = "INSERT INTO anime_genero (anime_id, genero_id) VALUES (?, ?)";
        $stmt_genero = $conn->prepare($sql_genero);

        foreach ($generos as $genero_id) {
            $stmt_genero->execute([$anime_id, $genero_id]);
        }

        echo "Anime actualizado exitosamente";
    } else {
        echo "Error al actualizar el anime";
    }

    $conn->close();
}
// @c-red CREAR ANIME
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_crear'])) {
    $campos = ['nombre', 'temporada', 'descripcion', 'descripcion_breve', 'etiquetas'];
    foreach ($campos as $campo) {
        $$campo = $_POST[$campo] ?? '';
    }
    $opciones = $_POST['opciones'] ?? [];
    $generos = $_POST['generos'] ?? [];

    $campos_opciones = ['portada', 'tendencia', 'reciente', 'proximo'];
    foreach ($campos_opciones as $campo) {
        $$campo = in_array($campo, $opciones) ? 1 : 0;
    }

    $upload_dir = '../../uploads/' . str_replace(' ', '-', $nombre);
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $imagenes = ['vertical' => 'imagen_portada_vertical', 'horizontal' => 'imagen_portada_horizontal'];
    $rutas_imagenes = ['vertical' => '', 'horizontal' => ''];

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

    $sql = "INSERT INTO anime (nombre, temporada, descripcion, descripcion_breve, etiquetas, 
            imagen_portada_vertical, imagen_portada_horizontal, portada, tendencia, reciente, proximo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
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
        ]);

        $anime_id = $conn->insert_id;

        // Insertar los géneros en la tabla anime_genero
        $sql_genero = "INSERT INTO anime_genero (anime_id, genero_id) VALUES (?, ?)";
        $stmt_genero = $conn->prepare($sql_genero);

        foreach ($generos as $genero_id) {
            $stmt_genero->execute([$anime_id, $genero_id]);
        }

        echo "Nuevo registro creado exitosamente";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $conn->close(); // Cerrar la conexión
    }
}

// @c-red ELIMINAR ANIME
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_el'])) {
    $id = $_POST['id_el'];
    $nombre = $_POST['nm_el'];
    $upload_dir = '../../uploads/' . str_replace(' ', '-', $nombre);

    $sql = "DELETE FROM anime WHERE id = ?";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        echo "Registro eliminado exitosamente";

        // Eliminar los archivos dentro de la carpeta
        if (is_dir($upload_dir)) {
            $files = scandir($upload_dir);
            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    unlink($upload_dir . '/' . $file);
                }
            }
            // Después de eliminar todos los archivos, eliminar la carpeta
            rmdir($upload_dir);
            echo "Carpeta eliminada exitosamente";
        } else {
            echo "La carpeta no existe o ya fue eliminada";
        }
    } catch (Exception $e) {
        echo "Error al eliminar el registro: " . $e->getMessage();
    } finally {
        $conn->close();
    }
}
