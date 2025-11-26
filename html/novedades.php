<?php 
  include_once '../archivosPhp/conexion.php';

  $sql = "SELECT * FROM novedades";
  $resultado = $conn-> query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novedades - UTHH</title>
    <link rel="stylesheet" href="../styles/styleNovedades.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="../imagenes/imagenLogoUthh/logoUthh.png" alt="logo">
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

    <div class="novedades-container">
        <div class="novedades-main">
            <?php while ($novedades = $resultado->fetch_assoc()): ?>
            <!-- Noticias -->
            <article class="noticia-card">
                <div class="noticia-imagen">
                    <img src="<?php echo  $novedades['imagen']; ?>" alt="noticia1" width="200 px">
                </div>
                <div class="noticia-contenido">

                    <h2><?php  echo $novedades['tituloNovedad'] ?></h2>
                    <p class="fecha"><?php echo $novedades['fecha'] ?></p>
                    <p><?php echo $novedades['encabezado'] ?> </p>
                    <a class="btn-leer-mas" href="novedad.php?id=<?= $novedades['idNovedades'] ?>">Leer más</a>
                </div>
            </article>
            <?php endwhile; ?>
        </div>

        
        <aside class="redes-sociales-sidebar">
            <h2>Redes sociales</h2>
            <div class="red-social-item">
                <span class="icono">
                    <img src="../imagenes/imagenTwitter/twitter.png" alt="twitter logo" width="40px">
                </span>
                <a href="https://twitter.com/uthh" target="_blank">twitter</a>
            </div>
            <div class="red-social-item">
                <span class="icono">
                    <img src="../imagenes/imagenFacebook/facebook.png"alt="facebook logo" width="40px">
                </span>
                <a href="https://www.facebook.com/uthh.huejutla" target="_blank">facebook</a>
            </div>
            <div class="red-social-item">
                <span class="icono">
                    <img src="../imagenes/imagenLogoUthh/logoUthh.png" alt="uthh logo" width="40 px">
                </span>
                <a href="https://www.uthh.edu.mx/" target="_blank">uthh.com</a>
            </div>
        </aside>
    </div>

    <footer>
        <p>&copy; 2024 Mantenimientos de Computo. Todos los derechos reservados.</p>
    </footer>
</body>
</html>