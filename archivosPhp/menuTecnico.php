<?php
session_start();

 if($_SESSION['verificarAdministrador'] == 2)
 {
    
 }
 else
 {
    header("Location: ../login.php");
    exit();
 }
 $nombreUsuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimientos de Computo</title>
    <link rel="stylesheet" href="../styles/styleMenuAdministrador.css">
</head>
<body>
    <header>
        <div class = "logo-container">
       <img src = "../imagenes/imagenLogoEmpresa/logoEmpresa.jpg" alt = "logo">
       </div>
       <h1> Bienvenido <?php echo $nombreUsuario?> </h1>
       <nav>
         <ul>
         <li><a href ="mapaDeSitioTecnico.php">Mapa de Sitio</a></li>
         <li><a href ="cerrarSesion.php">Cerrar Sesión</a></li>
         <li><a href ="Registros">Registros</a></li>    
         </ul>
       </nav>
    </header>
    <main>
        <img src ="../imagenes/imagenLogoLogin/imagenLogoLogin.jpg" class ="container-imgen">
    </main>
<footer>
  <p>
 Derechos de Autor &#169; 2025 Mantenimientos de Computo. Todos los derechos reservado.
</p>
 
</footer>
</body>
</html>