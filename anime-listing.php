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
    <!-- Inicio del área de encabezado -->
    <?php include 'php/navbar.php'; ?>
    <!-- Fin del área del encabezado -->

    <!-- Inicio del contenedor principal -->
    <div id="main-wrapper" class="main-wrapper overflow-hidden">

        <div class="page-content">

            <!-- Inicio del área de listado de anime -->
            <section class="trending p-40">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xxl-3">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-4">
                                    <div class="filter mb-32">
                                        <h2 class="h-30 bold text-white mb-32">Filtrar</h2>
                                        <ul class="unstyled alphabetic-filter mb-32">
                                            <li><a class="active" href="#">All</a></li>
                                            <li><a href="#">A</a></li>
                                            <li><a href="#">B</a></li>
                                            <li><a href="#">C</a></li>
                                            <li><a href="#">D</a></li>
                                            <li><a href="#">E</a></li>
                                            <li><a href="#">F</a></li>
                                            <li><a href="#">G</a></li>
                                            <li><a href="#">H</a></li>
                                            <li><a href="#">I</a></li>
                                            <li><a href="#">J</a></li>
                                            <li><a href="#">K</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">M</a></li>
                                            <li><a href="#">N</a></li>
                                            <li><a href="#">O</a></li>
                                            <li><a href="#">P</a></li>
                                            <li><a href="#">Q</a></li>
                                            <li><a href="#">R</a></li>
                                            <li><a href="#">S</a></li>
                                            <li><a href="#">T</a></li>
                                            <li><a href="#">U</a></li>
                                            <li><a href="#">V</a></li>
                                            <li><a href="#">W</a></li>
                                            <li><a href="#">X</a></li>
                                            <li><a href="#">Y</a></li>
                                            <li><a href="#">Z</a></li>
                                            <li><a href="#">1-9</a></li>
                                        </ul>
                                        <ul class="filter-block unstyled mb-32">
                                            <li>
                                                <a
                                                    aria-expanded="false"
                                                    class="filter-dropdown dropdown-toggle"
                                                    data-bs-auto-close="outside"
                                                    data-bs-toggle="dropdown"
                                                    href="#"
                                                    id="genre">Género<i class="fa fa-chevron-down"></i></a>
                                                <ul aria-labelledby="genre" class="dropdown-menu">
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="genre1" type="checkbox" />
                                                            <label class="custom-control-label" for="genre1">Acción</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="genre2" type="checkbox" />
                                                            <label class="custom-control-label" for="genre2">Aventura</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="genre5" type="checkbox" />
                                                            <label class="custom-control-label" for="genre5">Comedia</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="genre6" type="checkbox" />
                                                            <label class="custom-control-label" for="genre6">Demonios</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="genre7" type="checkbox" />
                                                            <label class="custom-control-label" for="genre7">Drama</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="genre8" type="checkbox" />
                                                            <label class="custom-control-label" for="genre8">Ecchi</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="genre9" type="checkbox" />
                                                            <label class="custom-control-label" for="genre9">Fantasía</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="genre11" type="checkbox" />
                                                            <label class="custom-control-label" for="genre11">Gourmet</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="genre12" type="checkbox" />
                                                            <label class="custom-control-label" for="genre12">Harem</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="genre13" type="checkbox" />
                                                            <label class="custom-control-label" for="genre13">Horror</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="genre14" type="checkbox" />
                                                            <label class="custom-control-label" for="genre14">Isekai</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a
                                                    aria-expanded="false"
                                                    class="filter-dropdown dropdown-toggle"
                                                    data-bs-auto-close="outside"
                                                    data-bs-toggle="dropdown"
                                                    href="#"
                                                    id="country">País<i class="fa fa-chevron-down"></i></a>
                                                <ul aria-labelledby="country" class="dropdown-menu">
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="country1" type="checkbox" />
                                                            <label class="custom-control-label" for="country1">China</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="country2" type="checkbox" />
                                                            <label class="custom-control-label" for="country2">Japon</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a
                                                    aria-expanded="false"
                                                    class="filter-dropdown dropdown-toggle"
                                                    data-bs-auto-close="outside"
                                                    data-bs-toggle="dropdown"
                                                    href="#"
                                                    id="season">Estación<i class="fa fa-chevron-down"></i></a>
                                                <ul aria-labelledby="season" class="dropdown-menu">
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="season1" type="checkbox" />
                                                            <label class="custom-control-label" for="season1">Otoño</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="season2" type="checkbox" />
                                                            <label class="custom-control-label" for="season2">Verano</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="season3" type="checkbox" />
                                                            <label class="custom-control-label" for="season3">Invierno</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="season4" type="checkbox" />
                                                            <label class="custom-control-label" for="season4">Primavera</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a
                                                    aria-expanded="false"
                                                    class="filter-dropdown dropdown-toggle"
                                                    data-bs-auto-close="outside"
                                                    data-bs-toggle="dropdown"
                                                    href="#"
                                                    id="year">Año<i class="fa fa-chevron-down"></i></a>
                                                <ul aria-labelledby="year" class="dropdown-menu">
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr1" type="checkbox" />
                                                            <label class="custom-control-label" for="yr1">2023</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr2" type="checkbox" />
                                                            <label class="custom-control-label" for="yr2">2023</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr3" type="checkbox" />
                                                            <label class="custom-control-label" for="yr3">2021</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr4" type="checkbox" />
                                                            <label class="custom-control-label" for="yr4">2020</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr5" type="checkbox" />
                                                            <label class="custom-control-label" for="yr5">2019</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr6" type="checkbox" />
                                                            <label class="custom-control-label" for="yr6">2018</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr7" type="checkbox" />
                                                            <label class="custom-control-label" for="yr7">2017</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr8" type="checkbox" />
                                                            <label class="custom-control-label" for="yr8">2016</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr9" type="checkbox" />
                                                            <label class="custom-control-label" for="yr9">2015</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr10" type="checkbox" />
                                                            <label class="custom-control-label" for="yr10">2014</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr11" type="checkbox" />
                                                            <label class="custom-control-label" for="yr11">2013</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr12" type="checkbox" />
                                                            <label class="custom-control-label" for="yr12">2012</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr13" type="checkbox" />
                                                            <label class="custom-control-label" for="yr13">2010</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr14" type="checkbox" />
                                                            <label class="custom-control-label" for="yr14">2009</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr15" type="checkbox" />
                                                            <label class="custom-control-label" for="yr15">2008</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr16" type="checkbox" />
                                                            <label class="custom-control-label" for="yr16">2007</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr17" type="checkbox" />
                                                            <label class="custom-control-label" for="yr17">2006</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr18" type="checkbox" />
                                                            <label class="custom-control-label" for="yr18">2005</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr19" type="checkbox" />
                                                            <label class="custom-control-label" for="yr19">2004</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr20" type="checkbox" />
                                                            <label class="custom-control-label" for="yr20">2003</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr22" type="checkbox" />
                                                            <label class="custom-control-label" for="yr22">2002</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr23" type="checkbox" />
                                                            <label class="custom-control-label" for="yr23">2001</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr24" type="checkbox" />
                                                            <label class="custom-control-label" for="yr24">2000</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr25" type="checkbox" />
                                                            <label class="custom-control-label" for="yr25">1999</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr26" type="checkbox" />
                                                            <label class="custom-control-label" for="yr26">1998</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr27" type="checkbox" />
                                                            <label class="custom-control-label" for="yr27">1997</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr28" type="checkbox" />
                                                            <label class="custom-control-label" for="yr28">1996</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="yr29" type="checkbox" />
                                                            <label class="custom-control-label" for="yr29">1995</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a
                                                    aria-expanded="false"
                                                    class="filter-dropdown dropdown-toggle"
                                                    data-bs-auto-close="outside"
                                                    data-bs-toggle="dropdown"
                                                    href="#"
                                                    id="type">Tipo<i class="fa fa-chevron-down"></i></a>
                                                <ul aria-labelledby="type" class="dropdown-menu">
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="type1" type="checkbox" />
                                                            <label class="custom-control-label" for="type1">Película</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="type2" type="checkbox" />
                                                            <label class="custom-control-label" for="type2">TV</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="type3" type="checkbox" />
                                                            <label class="custom-control-label" for="type3">OVA</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="type4" type="checkbox" />
                                                            <label class="custom-control-label" for="type4">ONA</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="type5" type="checkbox" />
                                                            <label class="custom-control-label" for="type5">Especial</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="type6" type="checkbox" />
                                                            <label class="custom-control-label" for="type6">Música</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a
                                                    aria-expanded="false"
                                                    class="filter-dropdown dropdown-toggle"
                                                    data-bs-auto-close="outside"
                                                    data-bs-toggle="dropdown"
                                                    href="#"
                                                    id="status">Estado<i class="fa fa-chevron-down"></i></a>
                                                <ul aria-labelledby="status" class="dropdown-menu">
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="status1" type="checkbox" />
                                                            <label class="custom-control-label" for="status1">Aún no lanzado</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="status2" type="checkbox" />
                                                            <label class="custom-control-label" for="status2">Lanzamiento</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="status3" type="checkbox" />
                                                            <label class="custom-control-label" for="status3">Terminada</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a
                                                    aria-expanded="false"
                                                    class="filter-dropdown dropdown-toggle"
                                                    data-bs-auto-close="outside"
                                                    data-bs-toggle="dropdown"
                                                    href="#"
                                                    id="language">Idioma<i class="fa fa-chevron-down"></i></a>
                                                <ul aria-labelledby="language" class="dropdown-menu">
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input
                                                                class="custom-control-input"
                                                                id="language1"
                                                                type="checkbox" />
                                                            <label class="custom-control-label" for="language1">Sub</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input
                                                                class="custom-control-input"
                                                                id="language2"
                                                                type="checkbox" />
                                                            <label class="custom-control-label" for="language2">Dub</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a
                                                    aria-expanded="false"
                                                    class="filter-dropdown dropdown-toggle"
                                                    data-bs-auto-close="outside"
                                                    data-bs-toggle="dropdown"
                                                    href="#"
                                                    id="rating">Clasificación<i class="fa fa-chevron-down"></i></a>
                                                <ul aria-labelledby="rating" class="dropdown-menu">
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="rating1" type="checkbox" />
                                                            <label class="custom-control-label" for="rating1">Todas las edades</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="rating2" type="checkbox" />
                                                            <label class="custom-control-label" for="rating2">Niños</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="rating3" type="checkbox" />
                                                            <label class="custom-control-label" for="rating3">+13</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="rating4" type="checkbox" />
                                                            <label class="custom-control-label" for="rating4">+18</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a
                                                    aria-expanded="false"
                                                    class="filter-dropdown dropdown-toggle"
                                                    data-bs-auto-close="outside"
                                                    data-bs-toggle="dropdown"
                                                    href="#"
                                                    id="sort-by">Ordenar por<i class="fa fa-chevron-down"></i></a>
                                                <ul aria-labelledby="sort-by" class="dropdown-menu">
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="sort1" type="checkbox" />
                                                            <label class="custom-control-label" for="sort1">Recientemente actualizado</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="sort2" type="checkbox" />
                                                            <label class="custom-control-label" for="sort2">Fecha de lanzamiento</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="sort3" type="checkbox" />
                                                            <label class="custom-control-label" for="sort3">Tendencia</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="sort4" type="checkbox" />
                                                            <label class="custom-control-label" for="sort4">Clasificación</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="sort5" type="checkbox" />
                                                            <label class="custom-control-label" for="sort5">Más visto</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="sort6" type="checkbox" />
                                                            <label class="custom-control-label" for="sort6">El más popular</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="sort7" type="checkbox" />
                                                            <label class="custom-control-label" for="sort7">Número de episodios</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <a class="cus-btn primary mb-50" href="anime-listing.php">Filtrar<i class="fa-regular fa-filter"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-xl-8">
                                    <div class="top-anime mb-12">
                                        <h2 class="h-30 bold text-white mb-12">Animes con calificación superior</h2>
                                        <p class="sec sm mb-24">Basado en tu filtro</p>
                                        <div class="row">
                                            <div class="col-xxl-12 col-md-6">
                                                <a class="anime-card mb-12" href="anime-detail.php">
                                                    <img alt="" src="assets/media/anime-card/img-27.png" />
                                                    <div class="text-block">
                                                        <div class="sm-title">
                                                            <h6 class="text-white">The Daily Life of the Immortal King</h6>
                                                            <p class="color-medium-gray sm sec">Temporada 3</p>
                                                        </div>
                                                        <ul class="tag unstyled">
                                                            <li>Acción</li>
                                                            <li>2021</li>
                                                            <li>EP-24</li>
                                                            <li class="icon"><i class="fas fa-star"></i></li>
                                                            <li>8.5</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xxl-12 col-md-6">
                                                <a class="anime-card mb-12" href="anime-detail.php">
                                                    <img alt="" src="assets/media/anime-card/img-28.png" />
                                                    <div class="text-block">
                                                        <div class="sm-title">
                                                            <h6 class="text-white">The Daily Life of the Immortal King</h6>
                                                            <p class="color-medium-gray sm sec">Temporada 3</p>
                                                        </div>
                                                        <ul class="tag unstyled">
                                                            <li>Acción</li>
                                                            <li>2021</li>
                                                            <li>EP-24</li>
                                                            <li class="icon"><i class="fas fa-star"></i></li>
                                                            <li>8.5</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xxl-12 col-md-6">
                                                <a class="anime-card mb-12" href="anime-detail.php">
                                                    <img alt="" src="assets/media/anime-card/img-27.png" />
                                                    <div class="text-block">
                                                        <div class="sm-title">
                                                            <h6 class="text-white">The Daily Life of the Immortal King</h6>
                                                            <p class="color-medium-gray sm sec">Temporada 3</p>
                                                        </div>
                                                        <ul class="tag unstyled">
                                                            <li>Acción</li>
                                                            <li>2021</li>
                                                            <li>EP-24</li>
                                                            <li class="icon"><i class="fas fa-star"></i></li>
                                                            <li>8.5</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xxl-12 col-md-6">
                                                <a class="anime-card mb-12" href="anime-detail.php">
                                                    <img alt="" src="assets/media/anime-card/img-29.png" />
                                                    <div class="text-block">
                                                        <div class="sm-title">
                                                            <h6 class="text-white">The Daily Life of the Immortal King</h6>
                                                            <p class="color-medium-gray sm sec">Temporada 3</p>
                                                        </div>
                                                        <ul class="tag unstyled">
                                                            <li>Acción</li>
                                                            <li>2021</li>
                                                            <li>EP-24</li>
                                                            <li class="icon"><i class="fas fa-star"></i></li>
                                                            <li>8.5</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-xxl-12 col-md-6">
                                                <a class="anime-card mb-12" href="anime-detail.php">
                                                    <img alt="" src="assets/media/anime-card/img-30.png" />
                                                    <div class="text-block">
                                                        <div class="sm-title">
                                                            <h6 class="text-white">The Daily Life of the Immortal King</h6>
                                                            <p class="color-medium-gray sm sec">Temporada 3</p>
                                                        </div>
                                                        <ul class="tag unstyled">
                                                            <li>Acción</li>
                                                            <li>2021</li>
                                                            <li>EP-24</li>
                                                            <li class="icon"><i class="fas fa-star"></i></li>
                                                            <li>8.5</li>
                                                        </ul>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-9">
                            <p class="sm-title mb-40">154 artículos</p>
                            <div class="row">
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
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
                                </div>
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
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
                                </div>
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
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
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
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
                                </div>
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
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
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
                                        <div class="img-block mb-20">
                                            <img alt="" src="assets/media/anime-card/img-12.png" />
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
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
                                        <div class="img-block mb-20">
                                            <img alt="" src="assets/media/anime-card/img-8.png" />
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
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
                                        <div class="img-block mb-20">
                                            <img alt="" src="assets/media/anime-card/img-22.png" />
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
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
                                        <div class="img-block mb-20">
                                            <img alt="" src="assets/media/anime-card/img-23.png" />
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
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
                                        <div class="img-block mb-20">
                                            <img alt="" src="assets/media/anime-card/img-24.png" />
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
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
                                        <div class="img-block mb-20">
                                            <img alt="" src="assets/media/anime-card/img-25.png" />
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
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
                                        <div class="img-block mb-20">
                                            <img alt="" src="assets/media/anime-card/img-11.png" />
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
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
                                        <div class="img-block mb-20">
                                            <img alt="" src="assets/media/anime-card/img-4.png" />
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
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
                                        <div class="img-block mb-20">
                                            <img alt="" src="assets/media/anime-card/img-5.png" />
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
                                <div class="col-md-4 col-sm-6 mb-40">
                                    <div class="card st-2 m-0">
                                        <div class="img-block mb-20">
                                            <img alt="" src="assets/media/anime-card/img-6.png" />
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
                            <ul class="pagination unstyled">
                                <li><a href="#"><i class="fa-solid fa-chevron-left"></i></a></li>
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#"><i class="fa-solid fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Fin del área de listado de anime -->



        </div>
        <!-- Fin del contenido principal -->

        <!-- Inicio del área de pie de página -->
        <?php include "php/footter.php"; ?>
        <!-- Fin del área de pie de página -->

        <!-- inicio del área emergente modal -->
        <div class="modal fade" id="videoModal" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="top_bar">
                        <h4 class="modal-title">Demon Slayer Season 4</h4>
                        <button type="button" class="close" id="closeVideoModalButton" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times"></i> <b>Close</b></span>
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
        <!-- final del área emergente modal -->

    </div>

    <!-- jquery js -->
    <script src="assets/js/vendor/jquery-3.6.3.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/slick.min.js"></script>
    <script src="assets/js/vendor/jquery-appear.js"></script>
    <script src="assets/js/vendor/jquery-validator.js"></script>
    <script src="assets/js/vendor/aksVideoPlayer.js"></script>

    <!-- Guiones del sitio -->
    <script src="assets/js/app.js"></script>
</body>


</html>