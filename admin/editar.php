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
    $stmt->bind_param("i", $anime_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $anime = $result->fetch_assoc();


    if (!$anime) {
        die("Anime no encontrado");
    }

    return $anime;
}

$anime = cargarDatosAnime($conn, $anime_id);

$stmt_generos = $conn->query("SELECT * FROM genero");
$todos_generos = $stmt_generos->fetch_all(MYSQLI_ASSOC);

$stmt_generos_anime = $conn->prepare("SELECT genero_id FROM anime_genero WHERE anime_id = ?");
$stmt_generos_anime->bind_param("i", $anime_id);
$stmt_generos_anime->execute();
$generos_anime = $stmt_generos_anime->get_result()->fetch_all(MYSQLI_ASSOC);
$generos_actuales = array_column($generos_anime, 'genero_id');

$conn->close();

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
<?php include "navbar2.php" ?>
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
                <label for="calif" class="form-label">Calificacion:</label>
                <input type="text" class="form-control" id="calif" name="calif" value="<?php echo $anime['calif'] ?>" required>
            </div>

            <div class="col-6">
                <label for="fecha" class="form-label">Fecha:</label>
                <input class="form-control" type="date" id="fecha" name="fecha" value="<?php echo $anime['fecha']; ?>">
            </div>

            <div class="col-12">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?php echo htmlspecialchars($anime['descripcion']); ?></textarea>
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

            <div class="col-md-6">
                <label for="imagen_portada_vertical" class="form-label">Imagen Portada Vertical:</label>
                <input type="file" class="form-control imagen-input" id="imagen_portada_vertical" name="imagen_portada_vertical">
                <?php if (!empty($anime['imagen_portada_vertical'])): ?>
                    <img src="../<?php echo htmlspecialchars($anime['imagen_portada_vertical']); ?>" alt="Portada Vertical Actual" class="img-thumbnail mt-2" width="300">
                <?php endif; ?>
            </div>

            <div class="col-md-6">
                <label for="imagen_portada_horizontal" class="form-label">Imagen Portada Horizontal:</label>
                <input type="file" class="form-control imagen-input" id="imagen_portada_horizontal" name="imagen_portada_horizontal">
                <?php if (!empty($anime['imagen_portada_horizontal'])): ?>
                    <img src="<?php echo htmlspecialchars($anime['imagen_portada_horizontal']); ?>" alt="Portada Horizontal Actual" class="img-thumbnail mt-2" width="100">
                <?php endif; ?>
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
        document.querySelectorAll('input[type="file"]').forEach(function(input) {
            input.addEventListener('change', function() {
                if (this.files.length > 1) {
                    alert('Solo puedes subir un archivo a la vez.');
                    this.value = ''; // Elimina el contenido del input
                }
            });
        });
        $(document).ready(function() {
            let processedImages = {};
            $('input[type="file"]').on('change', function(event) {
                const inputFile = this;
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = new Image();
                        img.src = e.target.result;
                        img.onload = function() {
                            const canvas = document.createElement('canvas');
                            const maxHeight = 600;
                            let finalImage;

                            if (img.height > maxHeight) {
                                // Redimensionar y convertir a WebP si es mayor a 600px
                                const scaleFactor = maxHeight / img.height;
                                canvas.height = maxHeight;
                                canvas.width = img.width * scaleFactor;
                            } else {
                                // Mantener dimensiones originales si es menor o igual a 600px
                                canvas.height = img.height;
                                canvas.width = img.width;
                            }

                            // Dibujar la imagen en el canvas
                            const ctx = canvas.getContext('2d');
                            ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                            // Convertir la imagen a WebP con calidad 50% en ambos casos
                            finalImage = canvas.toDataURL('image/webp', 0.5);

                            processedImages[inputFile.name] = finalImage;
                        };
                    };
                    reader.readAsDataURL(file);
                }
            });

            $('#editarAnimeForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('form_edit', 'editar');

                $('.imagen-input').each(function() {
                    const inputFile = this;
                    if (processedImages[inputFile.name]) {
                        const byteString = atob(processedImages[inputFile.name].split(',')[1]);
                        const mimeString = 'image/webp'; // Siempre será WebP
                        const buffer = new ArrayBuffer(byteString.length);
                        const data = new Uint8Array(buffer);
                        for (let i = 0; i < byteString.length; i++) {
                            data[i] = byteString.charCodeAt(i);
                        }
                        const blob = new Blob([buffer], {
                            type: mimeString
                        });

                        const randomName = 'imagen_' + Math.random().toString(36).substring(2, 15) + '.webp';

                        formData.delete(inputFile.name);
                        formData.append(inputFile.name, blob, randomName);
                    }
                });

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
    </script>
</body>

</html>