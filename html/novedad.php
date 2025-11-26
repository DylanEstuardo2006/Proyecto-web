<?php 
include_once '../archivosPhp/conexion.php';
if (isset($_GET['id']))
 {
    $id = $_GET['id'];
    
    // Usar prepared statement
    $sql = "SELECT * FROM novedades WHERE  idNovedades = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $novedades = $resultado->fetch_assoc();
    } else {
        exit;
    }
} else {
    echo 
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticia de última hora - UTHH</title>
    <link rel="stylesheet" href="../styles/styleNovedad.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="../imagenes/imagenLogoUthh/logoUthh.png"  alt="logo" width="40 px">
        </div>
        <h1>Novedades UTHH</h1>
        <nav>
            <ul>
                <li><a href ="mapaDeSitio.html">Mapa de Sitio</a></li>
                <li><a href="../index.html">Menú principal</a></li>
                <li><a href="conoceInstitucion.html">Conoce la institucion</a></li>
                <li><a href="filosofiaInstitucional.html">Filosofía Escolar</a></li>
                <li><a href="../login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <div class="detalle-container">
        <article class="noticia-completa">
            <h1><?php  echo $novedades['tituloNovedad'] ?></h1>
            
            <div class="noticia-imagen-grande">
                <img src="<?php echo  $novedades['imagen']; ?>" alt="noticia1" width="400">
            </div>

            <div class="noticia-contenido">

                    <p class="fecha"><?php echo $novedades['fecha'] ?></p>
                    <p><?php echo $novedades['encabezado'] ?> </p>
                    <p><?php echo $novedades['informacion'] ?> </p>
            </div>

        </article>
    </div>

    <footer>
        <p>&copy;  2024 Mantenimientos de Computo. Todos los derechos reservados.</p>
    </footer>
</body>
</html>