<?php
include 'config/config.php';
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

foreach($animes as $anime) {
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
            <a class="page-link" href="#" data-page="'.($startPage - 1).'">&laquo;</a>
        </li>';
}

for($i = $startPage; $i <= $endPage; $i++) {
    $activeClass = ($i == $page) ? 'active' : '';
    $paginationHtml .= '
        <li class="page-item '.$activeClass.'">
            <a class="page-link" href="#" data-page="'.$i.'">'.$i.'</a>
        </li>';
}

if ($endPage < $pages) {
    $paginationHtml .= '
        <li class="page-item">
            <a class="page-link" href="#" data-page="'.($endPage + 1).'">&raquo;</a>
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
?>
