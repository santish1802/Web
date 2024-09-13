<?php
require "../php/head.php";
require('../config/config.php');

// Verificar si el ID de anime es válido
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID de anime no válido");
}

$anime_id = intval($_GET['id']);
$mensaje = '';

// Función para cargar los datos del anime
function cargarDatosAnime($conn, $anime_id)
{
    $sql = "SELECT * FROM anime WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$anime_id]);
    $anime = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$anime) {
        die("Anime no encontrado");
    }

    return $anime;
}

// Cargar datos iniciales del anime
$anime = cargarDatosAnime($conn, $anime_id);

// Obtener géneros para el formulario
$stmt_generos = $conn->query("SELECT * FROM genero");
$todos_generos = $stmt_generos->fetchAll(PDO::FETCH_ASSOC);

// Obtener géneros actuales del anime
$stmt_generos_anime = $conn->prepare("SELECT genero_id FROM anime_genero WHERE anime_id = ?");
$stmt_generos_anime->execute([$anime_id]);
$generos_anime = $stmt_generos_anime->fetchAll(PDO::FETCH_ASSOC);
$generos_actuales = array_column($generos_anime, 'genero_id');

// Cerrar la conexión
$conn = null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Anime</title>
    <?php echo $css ?>
    <?php echo $css2 ?>
    <?php echo $js ?>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Anime</h1>
        <div id="mensaje" class="alert alert-info" style="display: none;" role="alert"></div>

        <form id="editarAnimeForm" enctype="multipart/form-data" class="row g-3">
            <input type="hidden" id="anime_id" name="anime_id" value="<?php echo $anime_id; ?>">

            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($anime['nombre']); ?>" required>
                <input type="hidden" id="nombre_h" name="nombre_h" value="<?php echo htmlspecialchars($anime['nombre']); ?>" required>
            </div>

            <div class="col-md-6">
                <label for="temporada" class="form-label">Temporada:</label>
                <input type="text" class="form-control" id="temporada" name="temporada" value="<?php echo htmlspecialchars($anime['temporada']); ?>">
            </div>

            <div class="col-12">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?php echo htmlspecialchars($anime['descripcion']); ?></textarea>
            </div>

            <div class="col-12">
                <label for="descripcion_breve" class="form-label">Descripción Breve:</label>
                <textarea class="form-control" id="descripcion_breve" name="descripcion_breve" rows="2"><?php echo htmlspecialchars($anime['descripcion_breve']); ?></textarea>
            </div>

            <div class="col-md-7">
                <label for="etiquetas" class="form-label">Etiquetas:</label>
                <input type="text" class="form-control" id="etiquetas" name="etiquetas" value="<?php echo htmlspecialchars($anime['etiquetas']); ?>">
            </div>

            <div class="col-md-6">
                <label for="imagen_portada_vertical" class="form-label">Imagen Portada Vertical:</label>
                <input type="file" class="form-control" id="imagen_portada_vertical" name="imagen_portada_vertical">
                <?php if (!empty($anime['imagen_portada_vertical'])): ?>
                    <img src="../<?php echo htmlspecialchars($anime['imagen_portada_vertical']); ?>" alt="Portada Vertical Actual" class="img-thumbnail mt-2" width="300">
                <?php endif; ?>
            </div>

            <div class="col-md-6">
                <label for="imagen_portada_horizontal" class="form-label">Imagen Portada Horizontal:</label>
                <input type="file" class="form-control" id="imagen_portada_horizontal" name="imagen_portada_horizontal">
                <?php if (!empty($anime['imagen_portada_horizontal'])): ?>
                    <img src="<?php echo htmlspecialchars($anime['imagen_portada_horizontal']); ?>" alt="Portada Horizontal Actual" class="img-thumbnail mt-2" width="100">
                <?php endif; ?>
            </div>

            <div class="col-12">
            <label for="Opciones" class="form-label">Opciones:</label><br>
                <div class="form-check">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="portada" name="opciones[]" value="portada" <?php echo $anime['portada'] ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="portada">Portada</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tendencia" name="opciones[]" value="tendencia" <?php echo $anime['tendencia'] ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="tendencia">Tendencia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="reciente" name="opciones[]" value="reciente" <?php echo $anime['reciente'] ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="reciente">Reciente</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proximo" name="opciones[]" value="proximo" <?php echo $anime['proximo'] ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="proximo">Próximo</label>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <label for="generos" class="form-label">Géneros:</label><br>
                <div class="form-check">
                    <?php foreach ($todos_generos as $genero): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="genero_<?php echo $genero['id']; ?>" name="generos[]" value="<?php echo $genero['id']; ?>" <?php echo in_array($genero['id'], $generos_actuales) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="genero_<?php echo $genero['id']; ?>"><?php echo htmlspecialchars($genero['nombre']); ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-12">
                <input type="submit" value="Actualizar Anime" class="btn btn-primary mb-5">
            </div>
        </form>
    </div>


    <script>
        $(document).ready(function() {
            $('#editarAnimeForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('form_edit', 'editar');
                $.ajax({
                    url: './funciones/fun-ajax.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#nombre_h').val($('#nombre').val());
                        $('#mensaje').html(response);
                        $('#mensaje').css('display', 'block');
                        setTimeout(function() {
                            $('#mensaje').css('display', 'none');
                        }, 3000);
                    },

                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        });
    </script>
</body>

</html>