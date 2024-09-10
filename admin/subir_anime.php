<?php require "../php/head.php" ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Anime</title>
    <?php echo $css ?>
    <?php echo $css2 ?>
    <?php echo $js ?>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Subir Información de Anime</h1>

        <form id="subirAnimeForm" enctype="multipart/form-data" class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre del Anime:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="col-md-6">
                <label for="temporada" class="form-label">Temporada:</label>
                <input type="text" class="form-control" id="temporada" name="temporada" required>
            </div>

            <div class="col-12">
                <label for="descripcion" class="form-label">Descripción del Anime:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>

            <div class="col-12">
                <label for="descripcion_breve" class="form-label">Descripción Breve:</label>
                <textarea class="form-control" id="descripcion_breve" name="descripcion_breve" rows="2" required></textarea>
            </div>

            <div class="col-12">
                <label for="etiquetas" class="form-label">Etiquetas (separadas por comas):</label>
                <input type="text" class="form-control" id="etiquetas" name="etiquetas">
            </div>

            <div class="col-12">
                <label for="generos" class="form-label">Géneros:</label><br>
                <div class="form-check">
                    <?php
                    require "../config/config.php";
                    $sql = "SELECT id, nombre FROM genero";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="form-check">';
                            echo '<input class="form-check-input" type="checkbox" name="generos[]" value="' . $row['id'] . '">';
                            echo '<label class="form-check-label" for="genero_' . $row['id'] . '">' . $row['nombre'] . '</label><br>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No hay géneros disponibles.</p>';
                    }

                    $conn->close();
                    ?>
                </div>
            </div>

            <div class="col-md-6">
                <label for="imagen_portada_vertical" class="form-label">Imagen Portada Vertical:</label>
                <input type="file" class="form-control" id="imagen_portada_vertical" name="imagen_portada_vertical" accept="image/*">
            </div>

            <div class="col-md-6">
                <label for="imagen_portada_horizontal" class="form-label">Imagen Portada Horizontal:</label>
                <input type="file" class="form-control" id="imagen_portada_horizontal" name="imagen_portada_horizontal" accept="image/*">
            </div>

            <div class="col-12">
                <label for="Opciones" class="form-label">Opciones:</label><br>
                <div class="form-check">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="portada" name="opciones[]" value="portada">
                        <label class="form-check-label" for="portada">Portada</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tendencia" name="opciones[]" value="tendencia">
                        <label class="form-check-label" for="tendencia">Tendencia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="reciente" name="opciones[]" value="reciente">
                        <label class="form-check-label" for="reciente">Reciente</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proximo" name="opciones[]" value="proximo">
                        <label class="form-check-label" for="proximo">Próximo</label>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <input type="submit" value="Subir Anime" class="btn btn-primary mb-5">
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#subirAnimeForm').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append('form_crear', 'crear');
                $.ajax({
                    url: './funciones/fun-ajax.php',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        $('#mensaje').html(response);
                        if (response.success) {
                            // Actualizar la página con los nuevos datos si es necesario
                        }
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