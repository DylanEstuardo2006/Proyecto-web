<?php
include 'conexion.php';  // si la conexión está en la raíz del proyecto

session_start(); 
 if($_SESSION['verificarAdministrador'] == 1)
  {
   
  }
 else
  {
    header("Location: ../login.php");
    exit();
  }
$nombre = $_POST['nombre'];
$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$encabezado = $_POST['encabezado'];
$informacion = $_POST['informacion'];

// Carpeta de imágenes que está dentro de /mostrar
$carpeta = "../html/imagenesNovedades/";

// Crear carpeta si no existe
if (!is_dir($carpeta)) {
    mkdir($carpeta, 0777, true);
}

$archivo = $_FILES['imagen'];
$nombreImagen = time() . "_" . basename($archivo["name"]);

$rutaServidor = $carpeta . $nombreImagen; // Ruta física

// ⭐ ESTA ES LA CORRECCIÓN IMPORTANTE ⭐
// Ruta para BD (vista desde mostrar.php)
$rutaBD = "imagenesNovedades/" . $nombreImagen;

// Mover la imagen a la carpeta correcta
if (move_uploaded_file($archivo["tmp_name"], $rutaServidor)) {

    $sql = "INSERT INTO novedades (tituloNovedad,encabezado,fecha,informacion,nombre, imagen)
            VALUES ('$titulo','$encabezado','$fecha','$informacion','$nombre', '$rutaBD')";

    if ($conn->query($sql)) {
        echo "Guardado correctamente.";
    } else {
        echo "Error DB: " . $conn->error;
    }

} else {
    echo "Error al mover la imagen.";
}

$conn->close();
?>
