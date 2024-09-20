<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica si se ha enviado la imagen
    if (isset($_FILES['imagen1']) && $_FILES['imagen1']['error'] === UPLOAD_ERR_OK) {
        // Ruta donde se guardará la imagen
        $nombreArchivo = 'imagen1.webp'; // Puedes cambiar el nombre si es necesario
        $directorio = __DIR__; // La carpeta actual donde se encuentra este script
        $rutaArchivo = $directorio . '/' . $nombreArchivo;

        // Mover el archivo subido a la ruta indicada
        if (move_uploaded_file($_FILES['imagen1']['tmp_name'], $rutaArchivo)) {
            echo "La imagen se ha subido correctamente a $rutaArchivo";
        } else {
            echo "Error al mover la imagen a la ruta deseada.";
        }
    } else {
        echo "No se ha recibido ninguna imagen o ha ocurrido un error.";
    }

    // Otros datos que vienen con el formulario (ejemplo)
    if (isset($_POST['nombre'])) {
        $nombre = htmlspecialchars($_POST['nombre']); // Sanitización básica
        echo "El nombre del anime es: " . $nombre;
    }

    // Puedes manejar otros datos del formulario aquí
    // ...

} else {
    echo "Método de solicitud no permitido.";
}
?>
