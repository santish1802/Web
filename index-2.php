<?php require 'php/head.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Anime web">
    <title>Anime web</title>
    <?php echo $css ?>
    <?php echo $css2 ?>
</head>

<body>
    <!--Área de encabezado Inicio-->
    <?php include 'php/navbar2.php'; ?>
    <!--Fin del área de encabezado-->

    <!--Inicio del contenedor principal-->
    <div class="main-wrapper overflow-hidden" id="main-wrapper">

        <!-- @c-blue Inicio del slider-->
        <section class="banner style-1 banner-slider">
            <?php
            require "config/config.php";

            $sql = "SELECT * FROM anime";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $animes = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            foreach ($animes as $anime) {
                if ($anime['portada'] == 1) {
                    $img_hv = !empty($anime['imagen_portada_horizontal']) ? $anime['imagen_portada_horizontal'] : $anime['imagen_portada_vertical'];
                    $img_vh = !empty($anime['imagen_portada_vertical']) ? $anime['imagen_portada_vertical'] : $anime['imagen_portada_horizontal'];
                    $first = false; ?>
                    <div class="banner-block overflow-hidden style-1 position-relative">
                        <div class="bg-anime" style="background: url(<?php echo $img_hv ?>); background-repeat: no-repeat; background-size: cover; background-position: center;"></div>
                        <div class="container">
                            <div class="banner-content">
                                <div class="row ">
                                    <div class="col-lg-6 col-12 ">
                                        <h2 class="title anime-nombre mb-3"><?php echo $anime['nombre']; ?></h2>
                                        <p class="text anime-temp">TEMPORADA <?php echo $anime['temporada']; ?></p>

                                        <div class="mb-4 etiq">
                                            <?php
                                            $etiquetas = explode(',', $anime['etiquetas']);
                                            foreach ($etiquetas as $etiqueta) {
                                                $etiqueta = trim($etiqueta);
                                                echo '<a href="streaming-season.html" class="btn bg-primary  fw-bold">' . $etiqueta . '</a> ';
                                            }
                                            ?>
                                        </div>
                                        <div class="anime-descrip mt-1"><?php echo $anime['descripcion']; ?></div>
                                        <a class="anime-play play-butn sdw-5" href="#">VER AHORA</a>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <img class="banner-img" src="<?php echo $img_vh ?>" class="d-block w-100" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
        </section>

        <!-- Fin del slider -->

        <!--Contenido principal Inicio-->
        <div class="page-content">
            <!--Categorías Área Inicio-->
            <section class="categories p-40">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item sdw-5 sdw-5" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-1.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Shonen</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item sdw-5" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-2.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Acción</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item sdw-5" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-3.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Fantasía</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item sdw-5" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-4.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Romántico</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item sdw-5" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-5.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Comedia</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item sdw-5" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-6.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Drama</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item sdw-5" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-7.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Ciencia ficción</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item sdw-5" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-8.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Aventura</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!--Categorías Área Fin-->

            <!--Área de tendencia Inicio-->
            <section class="animes p-40">
                <div class="container-fluid">
                    <h2 class="h-40 mb-40 bold">Animes en tendencia</h2>
                    <div class="card-slider">
                        <?php
                        foreach ($animes as $anime) {
                            $etiquetas = explode(',', $anime['etiquetas']);

                            $genero = isset($etiquetas[0]) ? trim($etiquetas[0]) : '';
                            $anio = isset($etiquetas[1]) ? trim($etiquetas[1]) : '';
                            $episodios = isset($etiquetas[2]) ? 'EP - ' . trim($etiquetas[2]) : '';
                            $calificacion = isset($etiquetas[3]) ? trim($etiquetas[3]) : '';
                        ?>
                            <div class="card st-2">
                                <div class="img-block mb-20">
                                    <img alt="" src="<?php echo $anime['imagen_portada_vertical']; ?>" />
                                    <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <h4 class="h-24 text-white bold"><?php echo $anime['nombre'] ?></h4>
                                    <ul class="tag unstyled">
                                        <li><?php echo $genero; ?></li>
                                        <li><?php echo $anio; ?></li>
                                        <li><?php echo $episodios; ?></li>
                                        <li class="icon"><i class="fas fa-star"></i></li>
                                        <li><?php echo $calificacion; ?></li>
                                    </ul>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!--Zona de pisada final-->
            <!--Continuar Área de inicio-->
            <section class="animes p-40 pb-0">
                <div class="container-fluid">
                    <div class="heading mb-32">
                        <h2 class="h-40 bold">Continuar viendo</h2>
                        <a class="light-btn primary sdw-5" href="anime-listing.php">Ver todo<i class="fa fa-chevron-right"></i></a>
                    </div>
                    <div class="row">
                        <?php
                        foreach ($animes as $anime) {
                            $etiquetas = explode(',', $anime['etiquetas']);

                            $genero = isset($etiquetas[0]) ? trim($etiquetas[0]) : '';
                            $anio = isset($etiquetas[1]) ? trim($etiquetas[1]) : '';
                            $episodios = isset($etiquetas[2]) ? 'EP - ' . trim($etiquetas[2]) : '';
                            $calificacion = isset($etiquetas[3]) ? trim($etiquetas[3]) : '';
                        ?>
                            <div class="col-xxl-2-4 col-lg-4 col-sm-6">
                                <div class="item mb-40">
                                    <div class="card st-2 m-0">
                                        <div class="img-block mb-20">
                                            <img alt="" src="assets/media/anime-card/img-22.png" />
                                            <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h4 class="h-24 text-white bold"><?php echo $anime['nombre'] ?></h4>
                                            <ul class="tag unstyled">
                                                <li><?php echo $genero; ?></li>
                                                <li><?php echo $anio; ?></li>
                                                <li><?php echo $episodios; ?></li>
                                                <li class="icon"><i class="fas fa-star"></i></li>
                                                <li><?php echo $calificacion; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <!--Continuar Área Fin-->
            <!--Área de inicio reciente-->
            <section class="animes p-40">
                <div class="container-fluid">
                    <h2 class="h-40 mb-40 bold">Lanzamiento reciente</h2>
                    <div class="card-slider">
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-22.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Demon Slayer</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-3.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Hells Paradise</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-8.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Fate Stay Night</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-9.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Steins Gate</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-19.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Arcane</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Área de inicio reciente-->
            <!--Próximamente Área de inicio-->
            <section class="comming-soon p-40">
                <div class="container-fluid">
                    <div class="content">
                        <img alt="" src="assets/media/comming-soon/image.png" />
                        <div class="details">
                            <h4 class="h-20 bold text-primary mb-8">¡Muy pronto!</h4>
                            <ul class="timer countdown unstyled data-timer1">
                                <li>365<small>Días</small></li>
                                <li>24<small>Horas</small></li>
                                <li>60<small>Mínimo</small></li>
                                <li>60<small>Segundo</small></li>
                            </ul>
                            <h2 class="h-40 bold text-white mb-12">Chainsawman</h2>
                            <p class="color-medium-gray mb-24">El cliente está muy contento de que lo sigan. Un poco más que un ullamcorper<br />almohada Los tintoreros del gato son también dos ollas para gatos. La decoración de la vida en la cama grande.</p>
                            <ul class="tag unstyled mb-24">
                                <li>Acción</li>
                                <li>2021</li>
                                <li>EP-24</li>
                                <li class="icon"><i class="fas fa-star"></i></li>
                                <li>8.5</li>
                            </ul>
                            <h4 class="h-20 bold text-white mb-16">Personajes</h4>
                            <ul class="name unstyled mb-40">
                                <li>huyendo</li>
                                <li>Valioso</li>
                                <li>En la práctica</li>
                                <li>Fuerza</li>
                                <li>himen</li>
                                <li>Aki Hayakawa</li>
                            </ul>
                            <a class="cus-btn primary" data-bs-target="#videoModal" data-bs-toggle="modal" href="#"><i class="fa fa-play"></i>Ver tráiler</a>
                            <!-- <button class="btn btn-primary  br-12 btn-p px-4 py-2 f-24 sdw-5" data-bs-target="#videoModal" data-bs-toggle="modal"><i class="fa fa-play"></i>Ver tráiler</button> -->
                        </div>
                    </div>
                </div>
            </section>
            <!--Próximamente Área Final-->

            <!--Zona de inicio superior-->
            <section class="animes st-2 p-40">
                <div class="container-fluid">
                    <h2 class="h-40 mb-40 bold">Los mejores animes</h2>
                    <div class="card-slider">
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-9.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Steins Gate</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-3.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Hells Paradise</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-18.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Demon Slayer</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-19.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Arcane</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-8.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Fate Stay Night</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Zona de inicio superior-->
            <!--Área de inicio reciente-->
            <section class="animes p-40">
                <div class="container-fluid">
                    <h2 class="h-40 mb-40">Shounen</h2>
                    <div class="card-slider">
                        <div class="card st-2 bold">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-10.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Black Bullet</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-23.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Your Lie in April</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-24.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Your Name</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-25.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">Jujutsu Kaisen</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-12.png" />
                                <a class="cus-btn light" href="anime-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 text-white bold">My Hero Academia</h4>
                                <ul class="tag unstyled">
                                    <li>Acción</li>
                                    <li>2021</li>
                                    <li>EP-24</li>
                                    <li class="icon"><i class="fas fa-star"></i></li>
                                    <li>8.5</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Área de inicio reciente-->
        </div>
        <!--Contenido principal Fin-->
        <!--Área de inicio del pie de página-->
        <?php include "php/footter.php"; ?>
        <!--Fin del área de pie de página-->
        <!--Inicio del área emergente modal-->
        <div aria-hidden="true" class="modal fade" id="videoModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="top_bar">
                        <h4 class="modal-title">Temporada 4 de Demon Slayer</h4>
                        <button aria-label="Close" class="close" data-dismiss="modal" id="closeVideoModalButton" type="button">
                            <span aria-hidden="true"><i class="fas fa-times"></i> <b>Cerca</b></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <video controls="" title="Video">
                            <source src="assets/media/video/movie-video.mp4" type="video/mp4" />
                        </video>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin del área emergente modal-->
    </div>
    <!--Jquery JS-->
    <script src="assets/js/vendor/jquery-3.6.3.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery.countdown.min.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/jquery-appear.js"></script>
    <script src="assets/js/vendor/jquery-validator.js"></script>
    <script src="assets/js/vendor/aksVideoPlayer.js"></script>
    <!--Guiones del sitio-->
    <script src="assets/js/app.js"></script>
</body>


</html>