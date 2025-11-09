<?php
  session_start();

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
       <h1> Bienvenido <?php echo $nombreUsuario?></h1>
       <nav>
         <ul>
         <li><a href ="ordenDeTrabajo.php">Orden de trabajo</a></li>
         <li><a href ="Operaciones" >Operaciones</a></li>
         <li><a href ="Historiales" >Historiales</a></li>
         </ul>
       </nav>
    </header>
</body>
</html>