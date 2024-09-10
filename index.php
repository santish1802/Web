<?php require 'php/head.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Anime web">
    <title>Anime web</title>
    <?php echo $css ?>
    <?php echo $css2 ?>    
</head>

<body>
    <!-- Área de encabezado Inicio -->
    <?php include 'php/navbar2.php'; ?>
    <!-- Fin del área de encabezado -->

    <!-- Inicio del contenedor principal -->
    <div id="main-wrapper" class="main-wrapper overflow-hidden">
        <!-- Inicio del estandarte -->
        <div class="hero-banner-1 p-40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxl-8 mb-30 mb-xxl-0">
                        <div class="anime-card ">
                            <div class="content">
                                <img src="assets/media/logo/logo-1.png" class="logo" alt="">
                                <h2 class="h-40 bold text-white mb-16">Demon Slayer: <br> Kimetsu no Yaiba</h2>
                                <ul class="tag unstyled mb-16">
                                    <li>18+</li>
                                    <li>HD</li>
                                    <li>2029</li>
                                    <li>Anime</li>
                                    <li>1hr 45m</li>
                                </ul>
                                <p class="text-white mb-32"><b class="color-medium-gray">Starting:</b> Natsuki Hanae, Akari Kito, Hiro Shimono</p>
                                <div class="btn-block">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal" class="cus-btn primary">
                                        <i class="fa fa-play"></i>
                                        Play
                                    </a>
                                    <a href="anime-detail.php" class="cus-btn sec">
                                        <i class="fal fa-info-circle"></i>
                                        More info
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-6 col-12">
                                <div class="anime-sm-card mb-30">
                                    <img src="assets/media/anime-card/img-1.png" class="br-12" alt="">
                                    <div class="content">
                                        <h4 class="h-30 text-white mb-8">My Hero Academia</h4>
                                        <ul class="tag unstyled mb-16">
                                            <li>2019</li>
                                            <li class="sec">18+</li>
                                            <li>4 Seasons</li>
                                            <li>Anime</li>
                                        </ul>
                                        <p class=" sm color-medium-gray">Sentenced to death, ninja Gabimaru the Hollow finds himself apathetic. </p>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal" class="cus-btn primary space">
                                            <i class="fa fa-play"></i>
                                            Play
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-xl-6 col-12">
                                <div class="anime-sm-card">
                                    <img src="assets/media/anime-card/img-2.png" class="br-12" alt="">
                                    <div class="content">
                                        <h4 class="h-30 text-white mb-8">Hell’s Paradise</h4>
                                        <ul class="tag unstyled mb-16">
                                            <li>2019</li>
                                            <li class="sec">18+</li>
                                            <li>4 Seasons</li>
                                            <li>Anime</li>
                                        </ul>
                                        <p class=" sm color-medium-gray">Sentenced to death, ninja Gabimaru the Hollow finds himself apathetic. </p>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal" class="cus-btn primary space">
                                            <i class="fa fa-play"></i>
                                            Play
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido principal Inicio -->
        <div class="page-content">
            <!-- Área de Categorías Inicio -->
            <section class="categories p-40">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a href="anime-listing.php" class="categorie-item">
                                <img src="assets/media/categories/Img-1.png" alt="">
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Shonen</h2>
                                    <span class="h-20 color-medium-gray">850+ Animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a href="anime-listing.php" class="categorie-item">
                                <img src="assets/media/categories/Img-2.png" alt="">
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Acción</h2>
                                    <span class="h-20 color-medium-gray">850+ Animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a href="anime-listing.php" class="categorie-item">
                                <img src="assets/media/categories/Img-3.png" alt="">
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Fantasía</h2>
                                    <span class="h-20 color-medium-gray">850+ Animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a href="anime-listing.php" class="categorie-item">
                                <img src="assets/media/categories/Img-4.png" alt="">
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Romántico</h2>
                                    <span class="h-20 color-medium-gray">850+ Animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a href="anime-listing.php" class="categorie-item">
                                <img src="assets/media/categories/Img-5.png" alt="">
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Comedia</h2>
                                    <span class="h-20 color-medium-gray">850+ Animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a href="anime-listing.php" class="categorie-item">
                                <img src="assets/media/categories/Img-6.png" alt="">
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Drama</h2>
                                    <span class="h-20 color-medium-gray">850+ Animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a href="anime-listing.php" class="categorie-item">
                                <img src="assets/media/categories/Img-7.png" alt="">
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Ciencia Ficción</h2>
                                    <span class="h-20 color-medium-gray">850+ Animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a href="anime-listing.php" class="categorie-item">
                                <img src="assets/media/categories/Img-8.png" alt="">
                                <div class="content">
                                    <h2 class="h-36 mb-1 text-white">Aventura</h2>
                                    <span class="h-20 color-medium-gray">850+ Animes</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Área de Categorías Fin -->

            <!-- Área de tendencia Inicio -->
            <section class="trending p-40">
                <div class="container-fluid">
                    <div class="heading mb-32">
                        <h2 class="h-40 bold">Shows en Tendencia</h2>
                        <a href="anime-listing.php" class="light-btn primary">Ver Todos <i class="fa fa-chevron-right"></i></a>
                    </div>
                    <div class="row">
                        <div class="col-xxl-3 col-xl-4 col-sm-6 mb-30 mb-xl-0">
                            <div class="card">
                                <div class="img-block mb-30">
                                    <img src="assets/media/anime-card/img-3.png" alt="">
                                    <a href="anime-detail.php" class="cus-btn light">
                                        Ver Ahora
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="list">1</div>
                                    <div class="name">
                                        <h4 class="h-24 text-white bold">Hell’s Paradise</h4>
                                        <h6 class="h-20 color-medium-gray">Acción</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-sm-6 mb-30 mb-xl-0">
                            <div class="card">
                                <div class="img-block mb-30">
                                    <img src="assets/media/anime-card/img-4.png" alt="">
                                    <a href="anime-detail.php" class="cus-btn light">
                                        Ver Ahora
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="list">2</div>
                                    <div class="name">
                                        <h4 class="h-24 text-white bold">One Piece</h4>
                                        <h6 class="h-20 color-medium-gray">Comedia</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-sm-6 mb-30 mb-sm-0">
                            <div class="card">
                                <div class="img-block mb-30">
                                    <img src="assets/media/anime-card/img-5.png" alt="">
                                    <a href="anime-detail.php" class="cus-btn light">
                                        Ver Ahora
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="list">3</div>
                                    <div class="name">
                                        <h4 class="h-24 text-white bold">86 Eighty Six</h4>
                                        <h6 class="h-20 color-medium-gray">Romance</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-sm-6 d-xxl-block d-xl-none d-lg-block">
                            <div class="card">
                                <div class="img-block mb-30">
                                    <img src="assets/media/anime-card/img-6.png" alt="">
                                    <a href="anime-detail.php" class="cus-btn light">
                                        Ver Ahora
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="list">4</div>
                                    <div class="name">
                                        <h4 class="h-24 text-white bold">Darling In The Franxx</h4>
                                        <h6 class="h-20 color-medium-gray">Fantasía</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Zona de pisada final -->

            <!-- Área de inicio reciente -->
            <section class="trending p-40">
                <div class="container-fluid">
                    <h2 class="h-40 mb-40 bold">Recientemente Lanzado</h2>
                    <div class="card-slider">
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img src="assets/media/anime-card/img-22.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
                                <img src="assets/media/anime-card/img-3.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
                                <img src="assets/media/anime-card/img-8.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
                                <img src="assets/media/anime-card/img-9.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
                                <img src="assets/media/anime-card/img-19.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
            <!-- Área de inicio reciente -->

            <!-- Próximamente Área de inicio -->
            <section class="comming-soon p-40">
                <div class="container-fluid">
                    <div class="content">
                        <img src="assets/media/comming-soon/image.png" alt="">
                        <div class="details">
                            <h4 class="h-20 bold text-primary mb-8">¡Próximamente!</h4>
                            <ul class="timer countdown unstyled data-timer1">
                                <li>20 <small>Días</small></li>
                                <li>23 <small>Hrs</small></li>
                                <li>50 <small>Min</small></li>
                                <li>34 <small>Sec</small></li>
                            </ul>
                            <h2 class="h-40 bold text-white mb-12">Chainsawman</h2>
                            <p class="color-medium-gray mb-24">Lorem ipsum dolor sit amet consectetur. Ligula quam enim ullamcorper <br> pulvinar. Tincidunt felis etiam urna felis duis. Vitae ornare at tortor lectus.</p>
                            <ul class="tag unstyled mb-24">
                                <li>Acción</li>
                                <li>2021</li>
                                <li>EP-24</li>
                                <li class="icon"><i class="fas fa-star"></i></li>
                                <li>8.5</li>
                            </ul>
                            <h4 class="h-20 bold text-white mb-16">Personajes</h4>
                            <ul class="name unstyled mb-40">
                                <li>Makima</li>
                                <li>Denji</li>
                                <li>Pochita</li>
                                <li>Power</li>
                                <li>Himeno</li>
                                <li>Aki Hayakawa</li>
                            </ul>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#videoModal" class="cus-btn primary">
                                <i class="fa fa-play"></i>
                                Ver Tráiler
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Próximamente Área Final -->

            <!-- Zona de inicio superior -->
            <section class="trending st-2 p-40">
                <div class="container-fluid">
                    <h2 class="h-40 mb-40 bold">Mejores Animes</h2>
                    <div class="card-slider">
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img src="assets/media/anime-card/img-9.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
                                <img src="assets/media/anime-card/img-3.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
                                <img src="assets/media/anime-card/img-18.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
                                <img src="assets/media/anime-card/img-19.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
                                <img src="assets/media/anime-card/img-8.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
            <!-- Zona de inicio superior -->

            <!-- Área de inicio reciente -->
            <section class="trending p-40">
                <div class="container-fluid">
                    <h2 class="h-40 mb-40">Shounen</h2>
                    <div class="card-slider">
                        <div class="card st-2 bold">
                            <div class="img-block mb-20">
                                <img src="assets/media/anime-card/img-10.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
                                <img src="assets/media/anime-card/img-23.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
                                <img src="assets/media/anime-card/img-24.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
                                <img src="assets/media/anime-card/img-25.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
                                <img src="assets/media/anime-card/img-12.png" alt="">
                                <a href="anime-detail.php" class="cus-btn light">
                                    Ver Ahora
                                    <i class="fa fa-play"></i>
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
            <!-- Área de inicio reciente -->

        </div>

        <!-- Contenido principal Fin -->

        <!-- Área de inicio del pie de página -->
        <?php include "php/footter.php"; ?>
        <!-- Fin del área de pie de página -->

        <!-- Inicio del área emergente modal -->
        <div class="modal fade" id="videoModal" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="top_bar">
                        <h4 class="modal-title">Demon Slayer Temporada 4</h4>
                        <button type="button" class="close" id="closeVideoModalButton" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true"><i class="fas fa-times"></i> <b>Cerrar</b></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <video controls title="Video">
                            <source src="assets/media/video/movie-video.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin del área emergente modal -->

    </div>

    <!-- Jquery JS -->
    <script src="assets/js/vendor/jquery-3.6.3.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery.countdown.min.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/jquery-appear.js"></script>
    <script src="assets/js/vendor/jquery-validator.js"></script>
    <script src="assets/js/vendor/aksVideoPlayer.js"></script>

    <!-- Guiones del sitio -->
    <script src="assets/js/app.js"></script>
</body>

</html>