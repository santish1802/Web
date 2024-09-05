<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="slide.css">
    <?php include "php/head.php" ?>
</head>

<body>
    <section id="bannerCarousel" class="carousel slide" data-bs-ride="false" data-bs-interval="500000">
        <div class="carousel-inner">
            <?php
            // Incluir el script PHP para obtener los datos
            include 'obtener_animes.php'; // Asegúrate de que este archivo esté en la misma carpeta

            // Verificar si hay animes recientes
            if (!empty($animes)) {
                $first = true; // Variable para marcar el primer item como activo

                foreach ($animes as $anime) {
                    $activeClass = $first ? 'active' : '';
                    $first = false; // Después del primer item, todos los demás no serán activos
            ?>
                    <div class="carousel-item <?php echo $activeClass; ?>">
                        <div class="bg-anime"  style="background: url(<?php echo htmlspecialchars($anime['imagen_portada_vertical']); ?>); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                        <div class="container">
                            <div class="slider-cont">
                                <div class="row">
                                    <div class="col-lg-5 col-12 m">
                                        <h2 class="pb-4 title-anime"><?php echo htmlspecialchars($anime['nombre']); ?></h2>
                                        <p class="anime-temporada pb-3">TEMPORADA <?php echo htmlspecialchars($anime['temporada']); ?></p>
                                        <div class="pb-3">
                                            <!-- Aquí puedes agregar botones dinámicos si tienes más datos para ellos -->
                                            <?php
                                            // Obtener y mostrar las etiquetas como botones
                                            $etiquetas = explode(',', $anime['etiquetas']); // Separar etiquetas por coma
                                            foreach ($etiquetas as $etiqueta) {
                                                $etiqueta = trim($etiqueta); // Quitar espacios alrededor
                                                echo '<a href="streaming-season.html" class="btn bg-primary  fw-bold">' . htmlspecialchars($etiqueta) . '</a> ';
                                            }
                                            ?>
                                        </div>
                                        
                                        <p class="anime-descrip"><?php echo htmlspecialchars($anime['descripcion_breve']); ?></p>
                                        <a class="anime-play btn bg-primary mt-5 d-block" href="streaming-season.html">VER AHORA</a>
                                    </div>
                                    <div class="col-lg-7 col-12 image-anime">
                                        <img src="<?php echo htmlspecialchars($anime['imagen_portada_vertical']); ?>" class="d-block w-100" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No hay animes recientes.</p>";
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>
    <?php include "php/scripts.php" ?>
</body>

</html>