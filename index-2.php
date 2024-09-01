<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Anime web">

    <title>Anime web</title>

    <?php include 'php/head.php'; ?>
</head>

<body>
    <!--Área de encabezado Inicio-->
    <?php include 'php/navbar2.php'; ?>
    <!--Fin del área de encabezado-->
    <!--Inicio del contenedor principal-->
    <div class="main-wrapper overflow-hidden" id="main-wrapper">
        <!--Inicio del estandarte del héroe-->
        <div class="hero-banner-1 p-40">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxl-8 mb-30 mb-xxl-0">
                        <div class="anime-card">
                            <div class="content">
                                <img alt="" class="logo" src="assets/media/logo/logo-1.png" />
                                <h2 class="h-40 bold color-white mb-16">Demon Slayer: <br /> Kimetsu no Yaiba</h2>
                                <ul class="tag unstyled mb-16">
                                    <li>18+</li>
                                    <li>Alta definición</li>
                                    <li>2029</li>
                                    <li>Anime</li>
                                    <li>1 hora 45 minutos</li>
                                </ul>
                                <p class="color-white mb-32"><b class="color-medium-gray">A partir de:</b>Natsuki Hanae, Akari Kito, Hiro Shimono</p>
                                <div class="btn-block">
                                    <a class="cus-btn primary" data-bs-target="#videoModal" data-bs-toggle="modal" href="#">
                                        <i class="fa fa-play"></i>Play</a>
                                    <a class="cus-btn sec" href="anime-detail.php">
                                        <i class="fal fa-info-circle"></i>Más información</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-6 col-12">
                                <div class="anime-sm-card mb-30">
                                    <img alt="" class="br-12" src="assets/media/anime-card/img-1.png" />
                                    <div class="content">
                                        <h4 class="h-30 color-white mb-8">My Hero Academia</h4>
                                        <ul class="tag unstyled mb-16">
                                            <li>2019</li>
                                            <li class="sec">18+</li>
                                            <li>4 estaciones</li>
                                            <li>Anime</li>
                                        </ul>
                                        <p class="sm color-medium-gray">Condenado a muerte, el ninja Gabimaru se siente apático.</p>
                                        <a class="cus-btn primary space" data-bs-target="#videoModal" data-bs-toggle="modal" href="#">
                                            <i class="fa fa-play"></i>
                                            Play
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-xl-6 col-12">
                                <div class="anime-sm-card">
                                    <img alt="" class="br-12" src="assets/media/anime-card/img-2.png" />
                                    <div class="content">
                                        <h4 class="h-30 color-white mb-8">Hell’s Paradise</h4>
                                        <ul class="tag unstyled mb-16">
                                            <li>2019</li>
                                            <li class="sec">18+</li>
                                            <li>4 estaciones</li>
                                            <li>Anime</li>
                                        </ul>
                                        <p class="sm color-medium-gray">Condenado a muerte, el ninja Gabimaru se siente apático.</p>
                                        <a class="cus-btn primary space" data-bs-target="#videoModal" data-bs-toggle="modal" href="#">
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
        <!--Contenido principal Inicio-->
        <div class="page-content">
            <!--Categorías Área Inicio-->
            <section class="categories p-40">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-1.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 color-white">Shonen</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-2.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 color-white">Acción</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-3.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 color-white">Fantasía</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-4.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 color-white">Romántico</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-5.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 color-white">Comedia</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-6.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 color-white">Drama</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-7.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 color-white">Ciencia ficción</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-xxl-3 col-sm-6 mb-30">
                            <a class="categorie-item" href="anime-listing.php">
                                <img alt="" src="assets/media/categories/Img-8.png" />
                                <div class="content">
                                    <h2 class="h-36 mb-1 color-white">Aventura</h2>
                                    <span class="h-20 color-medium-gray">Más de 850 animes</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!--Categorías Área Fin-->
            <!--Área de tendencia Inicio-->
            <section class="trending p-40">
                <div class="container-fluid">
                    <div class="heading mb-32">
                        <h2 class="h-40 bold">Programas de tendencia</h2>
                        <a class="light-btn primary" href="anime-listing.php">Ver todo<i class="fa fa-chevron-right"></i></a>
                    </div>
                    <div class="row">
                        <div class="col-xxl-3 col-xl-4 col-sm-6 mb-30 mb-xl-0">
                            <div class="card">
                                <div class="img-block mb-30">
                                    <img alt="" src="assets/media/anime-card/img-3.png" />
                                    <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="list">1</div>
                                    <div class="name">
                                        <h4 class="h-24 color-white bold">Hell’s Paradise</h4>
                                        <h6 class="h-20 color-medium-gray">Acción</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-sm-6 mb-30 mb-xl-0">
                            <div class="card">
                                <div class="img-block mb-30">
                                    <img alt="" src="assets/media/anime-card/img-4.png" />
                                    <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="list">2</div>
                                    <div class="name">
                                        <h4 class="h-24 color-white bold">One Piece</h4>
                                        <h6 class="h-20 color-medium-gray">Comedia</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-sm-6 mb-30 mb-sm-0">
                            <div class="card">
                                <div class="img-block mb-30">
                                    <img alt="" src="assets/media/anime-card/img-5.png" />
                                    <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="list">3</div>
                                    <div class="name">
                                        <h4 class="h-24 color-white bold">86 Eighty Six</h4>
                                        <h6 class="h-20 color-medium-gray">romance</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-sm-6 d-xxl-block d-xl-none d-lg-block">
                            <div class="card">
                                <div class="img-block mb-30">
                                    <img alt="" src="assets/media/anime-card/img-6.png" />
                                    <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="list">4</div>
                                    <div class="name">
                                        <h4 class="h-24 color-white bold">Darling In The Franxx</h4>
                                        <h6 class="h-20 color-medium-gray">Fantasía</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Zona de pisada final-->
            <!--Continuar Área de inicio-->
            <section class="continue p-40 pb-0">
                <div class="container-fluid">
                    <div class="heading mb-32">
                        <h2 class="h-40 bold">Continuar viendo</h2>
                        <a class="light-btn primary" href="anime-listing.php">Ver todo<i class="fa fa-chevron-right"></i></a>
                    </div>
                    <div class="row">
                        <div class="col-xxl-4 col-lg-6">
                            <div class="item mb-40">
                                <img alt="" src="assets/media/anime-card/img-7.png" />
                                <div class="content">
                                    <h4 class="h-24 color-white bold mb-12">Hell’s Paradise</h4>
                                    <ul class="tag unstyled">
                                        <li>
                                            <p class="color-medium-gray">Temporada 02</p>
                                        </li>
                                        <li>
                                            <p class="color-medium-gray">Episodio 02</p>
                                        </li>
                                    </ul>
                                    <div class="btn-block">
                                        <a class="cus-btn primary space" href="movie-detail.php">
                                            <i class="fa fa-play"></i>
                                            Play
                                        </a>
                                        <div class="h-20 color-white">
                                            <i class="fa-regular fa-clock"></i>24:30
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6">
                            <div class="item mb-40">
                                <img alt="" src="assets/media/anime-card/img-8.png" />
                                <div class="content">
                                    <h4 class="h-24 color-white bold mb-12">Fate Stay Night </h4>
                                    <ul class="tag unstyled">
                                        <li>
                                            <p class="color-medium-gray">Temporada 02</p>
                                        </li>
                                        <li>
                                            <p class="color-medium-gray">Episodio 02</p>
                                        </li>
                                    </ul>
                                    <div class="btn-block">
                                        <a class="cus-btn primary space" href="movie-detail.php">
                                            <i class="fa fa-play"></i>
                                            Play
                                        </a>
                                        <div class="h-20 color-white">
                                            <i class="fa-regular fa-clock"></i>24:30
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6">
                            <div class="item mb-40">
                                <img alt="" src="assets/media/anime-card/img-9.png" />
                                <div class="content">
                                    <h4 class="h-24 color-white bold mb-12">Steins Gate</h4>
                                    <ul class="tag unstyled">
                                        <li>
                                            <p class="color-medium-gray">Temporada 02</p>
                                        </li>
                                        <li>
                                            <p class="color-medium-gray">Episodio 02</p>
                                        </li>
                                    </ul>
                                    <div class="btn-block">
                                        <a class="cus-btn primary space" href="movie-detail.php">
                                            <i class="fa fa-play"></i>
                                            Play
                                        </a>
                                        <div class="h-20 color-white">
                                            <i class="fa-regular fa-clock"></i>24:30
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6">
                            <div class="item mb-40">
                                <img alt="" src="assets/media/anime-card/img-10.png" />
                                <div class="content">
                                    <h4 class="h-24 color-white bold mb-12">Black Bullet</h4>
                                    <ul class="tag unstyled">
                                        <li>
                                            <p class="color-medium-gray">Temporada 02</p>
                                        </li>
                                        <li>
                                            <p class="color-medium-gray">Episodio 02</p>
                                        </li>
                                    </ul>
                                    <div class="btn-block">
                                        <a class="cus-btn primary space" href="movie-detail.php">
                                            <i class="fa fa-play"></i>
                                            Play
                                        </a>
                                        <div class="h-20 color-white">
                                            <i class="fa-regular fa-clock"></i>24:30
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6">
                            <div class="item mb-40">
                                <img alt="" src="assets/media/anime-card/img-11.png" />
                                <div class="content">
                                    <h4 class="h-24 color-white bold mb-12">Chainsawman</h4>
                                    <ul class="tag unstyled">
                                        <li>
                                            <p class="color-medium-gray">Temporada 02</p>
                                        </li>
                                        <li>
                                            <p class="color-medium-gray">Episodio 02</p>
                                        </li>
                                    </ul>
                                    <div class="btn-block">
                                        <a class="cus-btn primary space" href="movie-detail.php">
                                            <i class="fa fa-play"></i>
                                            Play
                                        </a>
                                        <div class="h-20 color-white">
                                            <i class="fa-regular fa-clock"></i>24:30
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6">
                            <div class="item mb-40">
                                <img alt="" src="assets/media/anime-card/img-12.png" />
                                <div class="content">
                                    <h4 class="h-24 color-white bold mb-12">My Hero Academia</h4>
                                    <ul class="tag unstyled">
                                        <li>
                                            <p class="color-medium-gray">Temporada 02</p>
                                        </li>
                                        <li>
                                            <p class="color-medium-gray">Episodio 02</p>
                                        </li>
                                    </ul>
                                    <div class="btn-block">
                                        <a class="cus-btn primary space" href="movie-detail.php">
                                            <i class="fa fa-play"></i>
                                            Play
                                        </a>
                                        <div class="h-20 color-white">
                                            <i class="fa-regular fa-clock"></i>24:30
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Continuar Área Fin-->
            <!--Área de inicio reciente-->
            <section class="trending p-40">
                <div class="container-fluid">
                    <h2 class="h-40 mb-40 bold">Lanzamiento reciente</h2>
                    <div class="card-slider">
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-22.png" />
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Demon Slayer</h4>
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
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Hells Paradise</h4>
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
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Fate Stay Night</h4>
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
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Steins Gate</h4>
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
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Arcane</h4>
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
                            <h4 class="h-20 bold color-primary mb-8">¡Muy pronto!</h4>
                            <ul class="timer countdown unstyled data-timer1">
                                <li>365<small>Días</small></li>
                                <li>24<small>Horas</small></li>
                                <li>60<small>Mínimo</small></li>
                                <li>60<small>Segundo</small></li>
                            </ul>
                            <h2 class="h-40 bold color-white mb-12">Chainsawman</h2>
                            <p class="color-medium-gray mb-24">El cliente está muy contento de que lo sigan. Un poco más que un ullamcorper<br />almohada Los tintoreros del gato son también dos ollas para gatos. La decoración de la vida en la cama grande.</p>
                            <ul class="tag unstyled mb-24">
                                <li>Acción</li>
                                <li>2021</li>
                                <li>EP-24</li>
                                <li class="icon"><i class="fas fa-star"></i></li>
                                <li>8.5</li>
                            </ul>
                            <h4 class="h-20 bold color-white mb-16">Personajes</h4>
                            <ul class="name unstyled mb-40">
                                <li>huyendo</li>
                                <li>Valioso</li>
                                <li>En la práctica</li>
                                <li>Fuerza</li>
                                <li>himen</li>
                                <li>Aki Hayakawa</li>
                            </ul>
                            <a class="cus-btn primary" data-bs-target="#videoModal" data-bs-toggle="modal" href="#">
                                <i class="fa fa-play"></i>Ver tráiler</a>
                        </div>
                    </div>
                </div>
            </section>
            <!--Próximamente Área Final-->
            <!--Inicio del área de remolques-->
            <section class="trailer p-40">
                <div class="container-fluid">
                    <h2 class="h-40 mb-40 bold">Tráiler</h2>
                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-xl-0 mb-30">
                            <div class="anime-card">
                                <img alt="" class="br-20" src="assets/media/anime-card/img-13.png" />
                                <div class="name">
                                    <h1 class="h-30 bold color-white">Otro</h1>
                                    <ul class="tag unstyled">
                                        <li>Acción</li>
                                        <li>2021</li>
                                        <li>EP-24</li>
                                        <li class="icon"><i class="fas fa-star"></i></li>
                                        <li>8.5</li>
                                    </ul>
                                </div>
                                <div class="btn-block">
                                    <a class="cus-btn light" data-bs-target="#videoModal" data-bs-toggle="modal" href="#">Ver tráiler<i class="fa fa-play"></i>
                                    </a>
                                    <div class="time">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>01:00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-xl-0 mb-30">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="anime-card st-2 mb-30">
                                        <img alt="" src="assets/media/anime-card/img-14.png" />
                                        <div class="name">
                                            <h1 class="h-30 bold color-white">Ataque a los titanes</h1>
                                            <ul class="tag unstyled">
                                                <li>Acción</li>
                                                <li>2021</li>
                                                <li>EP-24</li>
                                            </ul>
                                        </div>
                                        <div class="btn-block">
                                            <a class="cus-btn-2" data-bs-target="#videoModal" data-bs-toggle="modal" href="#">
                                                <i class="fa fa-play-circle"></i>Ver tráiler</a>
                                            <div class="time"><i class="fa-regular fa-clock"></i>
                                                <span>01:00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-12">
                                    <div class="anime-card st-2">
                                        <img alt="" src="assets/media/anime-card/img-15.png" />
                                        <div class="name">
                                            <h1 class="h-30 bold color-white">Bala negra</h1>
                                            <ul class="tag unstyled">
                                                <li>Acción</li>
                                                <li>2021</li>
                                                <li>EP-24</li>
                                            </ul>
                                        </div>
                                        <div class="btn-block">
                                            <a class="cus-btn-2" data-bs-target="#videoModal" data-bs-toggle="modal" href="#">
                                                <i class="fa fa-play-circle"></i>Ver tráiler</a>
                                            <div class="time"><i class="fa-regular fa-clock"></i>
                                                <span>01:00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="row">
                                <div class="col-xl-12 col-md-6">
                                    <div class="anime-card st-2 mb-30 mb-none">
                                        <img alt="" src="assets/media/anime-card/img-16.png" />
                                        <div class="name">
                                            <h1 class="h-30 bold color-white">Palabras de jardín</h1>
                                            <ul class="tag unstyled">
                                                <li>Acción</li>
                                                <li>2021</li>
                                                <li>EP-24</li>
                                            </ul>
                                        </div>
                                        <div class="btn-block">
                                            <a class="cus-btn-2" data-bs-target="#videoModal" data-bs-toggle="modal" href="#">
                                                <i class="fa fa-play-circle"></i>Ver tráiler</a>
                                            <div class="time"><i class="fa-regular fa-clock"></i>
                                                <span>01:00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6">
                                    <div class="anime-card st-2">
                                        <img alt="" src="assets/media/anime-card/img-17.png" />
                                        <div class="name">
                                            <h1 class="h-30 bold color-white">Una pieza</h1>
                                            <ul class="tag unstyled">
                                                <li>Acción</li>
                                                <li>2021</li>
                                                <li>EP-24</li>
                                            </ul>
                                        </div>
                                        <div class="btn-block">
                                            <a class="cus-btn-2" data-bs-target="#videoModal" data-bs-toggle="modal" href="#">
                                                <i class="fa fa-play-circle"></i>Ver tráiler</a>
                                            <div class="time"><i class="fa-regular fa-clock"></i>
                                                <span>01:00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Área de remolque final-->
            <!--Zona de inicio superior-->
            <section class="trending st-2 p-40">
                <div class="container-fluid">
                    <h2 class="h-40 mb-40 bold">Los mejores animes</h2>
                    <div class="card-slider">
                        <div class="card st-2">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-9.png" />
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Steins Gate</h4>
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
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Hells Paradise</h4>
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
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Demon Slayer</h4>
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
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Arcane</h4>
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
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Fate Stay Night</h4>
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
            <section class="trending p-40">
                <div class="container-fluid">
                    <h2 class="h-40 mb-40">Shounen</h2>
                    <div class="card-slider">
                        <div class="card st-2 bold">
                            <div class="img-block mb-20">
                                <img alt="" src="assets/media/anime-card/img-10.png" />
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Black Bullet</h4>
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
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Your Lie in April</h4>
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
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Your Name</h4>
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
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">Jujutsu Kaisen</h4>
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
                                <a class="cus-btn light" href="movie-detail.php">Ver ahora<i class="fa fa-play"></i>
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="h-24 color-white bold">My Hero Academia</h4>
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