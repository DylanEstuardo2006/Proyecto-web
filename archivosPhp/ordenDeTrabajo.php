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
    <title>Orden de Trabajo</title>
    <link rel ="stylesheet" href="../styles/styleOrdenDeTrabajo.css">
    <script src = "js/validaciones.js" defer></script>
</head>
 <header>
        <div class="logo-space">
          <img src="../imagenes/imagenlogoCarrera/imagenLogoCarrera.png" alt="Logo UTHH" class="logo">
        </div>
        <div class="header-title">
           Crear Orden de Trabajo
        </div>
        <div class="header-back">
            <a href="menuAdministrador.php">Regresar</a>
        </div>
    </header>
  <body>
   <div class = "container">
    <h2> Crear Orden de Trabajo</h2>
      <form method = "POST" action="seleccionarLaboratorio.php" class = "formulario">   
        <div class = "tipoMantenimiento">
        <label> Tipo de Mantenimiento:</label>
        <select name="tipoMantenimiento" class ="selectTipoMantenimiento">
            <option value = "">Elige una opcion</option>
            <?php
                  $tipos = $conn->query("SELECT * FROM tipomantenimiento");   

                while($row = $tipos->fetch_assoc())
                {
                 echo "<option value='{$row['idTipoMantenimiento']}'>{$row['tipoMantenimiento']}</option>";
                }
            ?>
        </select> 
         </div>
        <div class="horasHombre">
        <input type ="hidden" name ="estado" value = "espera">
        <label>Horas Hombre:</label>
        <input type="number" name="horasHombre" min="1" max="80" required>
        </div>
        <div class = "insumos">
        <label>Insumos:</label>
        <input type="text" name="insumos" required placeholder="Ingrese los insumos">
        </div>
         <div class= "input-date">
          <label>Fecha de Creación:</label>
         <input type = "date" name = "fechaCreacion" value = "<?php echo date("Y-m-d"); ?>">
        </div> 
        <div class="idUsuario"> 
        <label>Usuario creando la Orden:</label>
        <input type = "text" placeholder = "<?php echo $_SESSION['nombre'];?>" readonly >
        <input type = "hidden" name ="idUsuario" value ="<?php echo $_SESSION['idUsuario'];?>" >
        </div>
        
        <div class = "boton">
        <button type="submit">Siguiente → Seleccionar laboratorio </button>
        </div>
        </form>
    </div>
    <footer>
  <p> 

 Derechos de Autor &#169; 2025 Mantenimientos de Computo. Todos los derechos reservado.</p>
  
</footer>
   </body>
</html>