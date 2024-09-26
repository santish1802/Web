<?php

// @c-red MODAL
require "../../config/config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_modal'])) {
    $id_modal = $_POST['id_modal'];

    // Consulta SQL para obtener datos del anime con su ID
    $sql = "SELECT * from anime
            WHERE anime.id = ? ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_modal);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<table class="table pers" border="1">';
        while ($row = $result->fetch_assoc()) {
            echo '<tr><td class="td_gris">ID</td><td>' . $row["id"] . '</td></tr>';
            echo '<tr><td class="td_gris">Nombre</td><td>' . $row["nombre"] . '</td></tr>';
            echo '<tr><td class="td_gris">Calificacion</td><td>' . $row["calif"] . '</td></tr>';
            echo '<tr><td class="td_gris">Fecha</td><td>' . $row["fecha"] . '</td></tr>';
            echo '<tr><td class="td_gris">Descripción</td><td>' . $row["descripcion"] . '</td></tr>';
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

    $campos = ['nombre', 'nombre_h', 'gen', 'calif', 'descripcion', 'fecha'];
    foreach ($campos as $campo) {
        $$campo = $_POST[$campo] ?? '';
    }
    $opciones = $_POST['opciones'] ?? [];

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
    $stmt->bind_param("i", $anime_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $anime = $result->fetch_assoc();

    foreach ($imagenes as $tipo => $campo) {
        if ($_FILES[$campo]['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES[$campo]['tmp_name'];
            $name = basename($_FILES[$campo]['name']);

            $ext = pathinfo($name, PATHINFO_EXTENSION);
            $unique_name = uniqid() . '.' . $ext;
            $ruta_destino = "$upload_dir/$unique_name";

            if (move_uploaded_file($tmp_name, $ruta_destino)) {
                $rutas_imagenes[$tipo] = $ruta_destino;

                // Eliminar la imagen antigua si existe
                if (!empty($anime[$campo]) && file_exists($anime[$campo])) {
                    unlink($anime[$campo]);
                }
            }
        } else {
            // Actualizar la ruta de la imagen actual con la nueva carpeta
            if (!empty($anime[$campo])) {
                $nombre_archivo = basename($anime[$campo]);
                $nueva_ruta = "$upload_dir/$nombre_archivo";
                $rutas_imagenes[$tipo] = $nueva_ruta;
            } else {
                $rutas_imagenes[$tipo] = $anime[$campo]; // Mantener la imagen actual si no hay cambios
            }
        }
    }

    $sql = "UPDATE anime SET nombre = ?, calif = ?, gen = ?, descripcion = ?, fecha = ?, 
            imagen_portada_vertical = ?, imagen_portada_horizontal = ?, 
            portada = ?, tendencia = ?, reciente = ?, proximo = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $nombre,
        $calif,
        $gen,
        $descripcion,
        $fecha,
        $rutas_imagenes['vertical'],
        $rutas_imagenes['horizontal'],
        $portada,
        $tendencia,
        $reciente,
        $proximo,
        $anime_id
    ]);

    if ($stmt) {
        echo "Anime actualizado exitosamente";
    } else {
        echo "Error al actualizar el anime";
    }

    $conn->close();
}
// @c-red CREAR ANIME
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_crear'])) {
    $campos = ['nombre', 'gen', 'calif', 'descripcion', 'fecha'];
    foreach ($campos as $campo) {
        $$campo = $_POST[$campo] ?? '';
    }
    $opciones = $_POST['opciones'] ?? [];

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

    $sql = "INSERT INTO anime (nombre, calif, gen, descripcion, fecha,
            imagen_portada_vertical, imagen_portada_horizontal, portada, tendencia, reciente, proximo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $nombre,
            $calif,
            $gen,
            $descripcion,
            $fecha,
            $rutas_imagenes['vertical'],
            $rutas_imagenes['horizontal'],
            $portada,
            $tendencia,
            $reciente,
            $proximo
        ]);

        $anime_id = $conn->insert_id;

        // Insertar los géneros en la tabla anime_genero
        // $sql_genero = "INSERT INTO anime_genero (anime_id, genero_id) VALUES (?, ?)";
        // $stmt_genero = $conn->prepare($sql_genero);

        // foreach ($generos as $genero_id) {
        //     $stmt_genero->execute([$anime_id, $genero_id]);
        // }

        echo "Nuevo registro creado exitosamente";
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
// @c-red ANIME PAGINACION
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['page'])) {
    $limit = 20; // Siempre mostrará 5 registros
    $page = isset($_POST['page']) ? max(1, (int)$_POST['page']) : 1;
    $start = ($page - 1) * $limit;

    $generos = [];
    $whereClauses = [];

    // Verifica si se han seleccionado géneros
    if (isset($_POST['generos']) && !empty($_POST['generos'])) {
        $generosSeleccionados = explode(',', $_POST['generos']);
        foreach ($generosSeleccionados as $genero) {
            $generos[] = "gen LIKE '%$genero%'";
        }
    }

    // Filtro de fecha
    if (isset($_POST['fecha']) && !empty($_POST['fecha'])) {
        $whereClauses[] = "fecha LIKE '%{$_POST['fecha']}%'";
    }

    // Si hay géneros seleccionados, añádelos al WHERE
    if (!empty($generos)) {
        $whereClauses[] = implode(" AND ", $generos);
    }

    // Construye la cláusula WHERE final
    $whereClause = !empty($whereClauses) ? "WHERE " . implode(" AND ", $whereClauses) : "";

    // Ordenar por la columna seleccionada
    $orderBy = "";
    if (isset($_POST['orderby']) && !empty($_POST['orderby'])) {
        $orderBy = "ORDER BY " . $_POST['orderby'] . " DESC";
    }

    // Consulta actualizada
    $sql = "SELECT * FROM anime $whereClause $orderBy LIMIT $start, $limit";
    $stmt = $conn->query($sql);
    $animes = $stmt->fetch_all(MYSQLI_ASSOC);

    // Consulta para obtener el total de registros
    $sqlCount = "SELECT COUNT(id) AS total FROM anime $whereClause";
    $result1 = $conn->query($sqlCount);
    $total = $result1->fetch_assoc()['total'];


    // Cálculos para la paginación
    $pages = ceil($total / $limit);
    $currentSet = ceil($page / 8);
    $startPage = ($currentSet - 1) * 8 + 1;
    $endPage = min($startPage + 7, $pages);
    $consulta = "SELECT * FROM anime $whereClause $orderBy LIMIT $start, $limit";
    // Generar HTML para una galería
    $galleryHtml = '';

    foreach ($animes as $anime) {
        $galleryHtml .= '
        <div class="col-lg-2-4 col-md-3 col-sm-4 col-6">
            <div class="item mb-40">
                <div class="card st-2 m-0 p-0">
                    <div class="img-block mb-12">
                        <img alt="" src="' . htmlspecialchars($anime['imagen_portada_vertical']) . '" loading="lazy"/>
                        <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i></a>
                    </div>
                    <div class="content">
                        <h4 class="f-18 text-white bold">' . htmlspecialchars($anime['nombre']) . '</h4>
                    </div>
                </div>
            </div>
        </div>';
    }



    // Generar HTML para la paginación
    $paginationHtml = '
<nav aria-label="Navegación de páginas">
    <ul class="pagination justify-content-center">';

    if ($startPage > 1) {
        $paginationHtml .= '
        <li class="page-item">
            <a class="page-link" href="#" data-page="' . ($startPage - 1) . '">&laquo;</a>
        </li>';
    }

    for ($i = $startPage; $i <= $endPage; $i++) {
        $activeClass = ($i == $page) ? 'active' : '';
        $paginationHtml .= '
        <li class="page-item ' . $activeClass . '">
            <a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a>
        </li>';
    }

    if ($endPage < $pages) {
        $paginationHtml .= '
        <li class="page-item">
            <a class="page-link" href="#" data-page="' . ($endPage + 1) . '">&raquo;</a>
        </li>';
    }

    $paginationHtml .= '
    </ul>
</nav>';

    // Devolver los datos en formato JSON
    echo json_encode([
        'content' => $galleryHtml,
        'pagination' => $paginationHtml,
        'consulta' => $consulta,

    ]);
}
