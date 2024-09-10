<?php
$style = '
<link href="../assets/css/bs5.css?v=' . time() . '" rel="stylesheet">
<link href="../assets/css/style.css?v=' . time() . '" rel="stylesheet">
';

$js = '<script src="../assets/js/jquery-3.7.1.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>';
$jsdt = '<script src="../assets/js/dataTables.js" type="text/javascript"></script>
<script src="../assets/js/dataTables.bootstrap5.js" type="text/javascript"></script>
<script src="../assets/js/dataTables.responsive.js" type="text/javascript"></script>
<script src="../assets/js/responsive.bootstrap5.js" type="text/javascript"></script>';
?>
<!DOCTYPE html>
<html lang="es">
<link href="../assets/css/dataTables.bootstrap5.css" rel="stylesheet">
<link href="../assets/css/responsive.bootstrap5.css" rel="stylesheet">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de anime</title>
    <?php echo $style; ?>
    <style>
        td>* {
            color: black;
            text-decoration: none
        }
    </style>
    <style id='customStyle'></style>
</head>

<body class="body">
    <div class="container-sm py-4 ">
        <div class="cont_white">
            <h1 class="text-center py-4">Registro de anime</h1>
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <!-- Button trigger modal -->
                        <a href="subir_anime.php" type="button" class="btn btn-dark float-end" id=btn_ag>
                            Agregar
                        </a>
                    </div>
                </div>
            </div>
            <div class="breakpoint">
                <table id="tablaUsuarios" class="table display responsive" width="100%">
                    <thead>
                        <tr>
                            <!-- <th class="never">ID Pedido</th> -->
                            <th class="not-mobile">ID</th>
                            <th class="">Nombre</th>
                            <th>Genero</th>
                            <th>Portada</th>
                            <th>Tendencia</th>
                            <th>Reciente</th>
                            <th>Proximo</th>
                            <th class="none">Accion</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="probando" class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a href="" id="redirect" type="button" class="btn btn-black2">Editar</a>
                </div>
            </div>
        </div>
    </div>

    <?php echo $js; ?>
    <?php echo $jsdt; ?>
    <script>
        var storedFontSize = localStorage.getItem('fontSize');
        if (storedFontSize) {
            document.getElementById('customStyle').textContent = ":root, [data-bs-theme='light'] { --bs-body-font-size: " + storedFontSize + " !important; }";
        }

        function valor_modal(id_modal) {
            $('#probando').html("Cargando...");
            console.log(id_modal);
            var parametros = {
                "id_modal": id_modal,
            };
            $.ajax({
                data: parametros,
                url: './funciones/fun-ajax.php',
                type: 'POST',
                success: function(mensaje) {
                    $('#probando').html(mensaje);
                    var urlEditar = '../editar/usuario/' + id_modal;
                    $('#redirect').attr('href', urlEditar);
                }
            });
        };
        $(window).ready(function() {
            var dataTable = $('#tablaUsuarios').DataTable({
                responsive: true,
                language: {
                    url: '../config/Es.json',
                },
                "serverSide": true,
                responsive: true,
                autoWidth: false, //<---
                "order": [
                    [0, "asc"]
                ], // Ordenar la primera columna en orden descendente
                "ajax": {
                    url: "./funciones/require-dt.php",
                    type: "POST",
                },
                "lengthMenu": [2, 5, 10], // Define las opciones de cantidad de filas por página
                "pageLength": 10, // Define la cantidad de filas por página inicial
                columnDefs: [{
                    type: 'string',
                    targets: '_all'
                }, ]
            });
            window.onresize = function() {
                dataTable.columns.adjust().responsive.recalc();
            }
        });

        function el_anime(id, nombre) {
            var parametros = {
                "nm_el": nombre,
                "id_el": id,
            };
            if (confirm("¿Eliminar pedido de " + nombre + "?")) {
                $.ajax({
                    data: parametros,
                    url: './funciones/fun-ajax.php',
                    type: 'POST',
                    success: function(mensaje) {
                        $('#tablaUsuarios').DataTable().ajax.reload();
                        console.log(mensaje);
                    }
                });
            } else {
                return false;
            }
        }
    </script>

</body>

</html>