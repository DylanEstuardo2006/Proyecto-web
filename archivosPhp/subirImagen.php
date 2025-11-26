 
 <?php 
 include_once 'conexion.php';
 session_start(); 
 if($_SESSION['verificarAdministrador'] == 1)
  {
   
  }
 else
  {
    header("Location: ../login.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="guardarImagen.php" method="POST" enctype="multipart/form-data">
    <label>Titulo:</label>
    <input type ="text" name="titulo">
    <label>Encabezado:</label>
    <input type ="text" name="encabezado">
    <label>Fecha:</label>
     <input type ="text" name="fecha">
    <label>Información:</label>
    <input type ="text" name= "informacion">
    <label>Nombre imagen</label>
    <input type ="text" name="nombre">
    <label>Imagen</label>
    <input type="file" name="imagen" accept="image/*" required>
    <button type="submit">Subir</button>
</form>
</body>
</html>