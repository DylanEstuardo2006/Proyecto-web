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

$verificar = false; 
$result = null;


if(isset($_GET['idLaboratorio']) && $_GET['idLaboratorio'] != "") 
{
  if($_GET['idOrden']  != 0)
  {
     $idLaboratorio = $_GET['idLaboratorio'];
    $idOrden = $_GET['idOrden'];

   $sql = "SELECT * FROM dispositivos WHERE idLaboratorio = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $idLaboratorio);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0)
    {
        $verificar = true;
    }
  } 
  else
  {
      echo "<script>
                 alert('❌ No se ha proporcionado una Orden de Trabajo válida.');
                 window.location='seleccionarLaboratorio.php';
               </script>";
         exit();
  }
}   
else 
{
     echo "<script>
                 alert('❌ Por favor, selecciona un laboratorio válido.');
                 window.location='seleccionarLaboratorio.php';
               </script>";
         exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar dispositivos</title>
    <link rel ="stylesheet" href="../styles/styleListarDispositivos.css">
</head>
<body>
   <header>
        <div class="logo-space">
          <img src="../imagenes/imagenlogoCarrera/imagenLogoCarrera.png" alt="Logo UTHH" class="logo">
       </div>
  <h3> <?php if($idOrden === null){ echo 'No se ha creado una Orden de Trabajo'; }else { echo 'Selecciona los dispositivos para la orden #'. $idOrden;}  ?></h3>
       <div class ="header-back">
          <a href="menuAdministrador.php">Menú Administrador</a>
        </div>
  </header>
    <main>
     <div id= "dispositivos-lista">  
        <h2>Selecciona los dispositivos para la orden #<?= $idOrden; ?></h2>
       <form method="post" action ="guardarOrden.php">
       <?php while($row = $result->fetch_assoc()) 
        { ?>
       <input type="checkbox" name="dispositivos[]" value="<?= $row['idDispositivo']; ?>">
       <?=  $row['nombreDispositivo'] ?> (Inventario:<?=$row['numeroInventario'] ?>) <br>
       <?php 
        } 
        ?>
       <input type="hidden" name="idOrden" value="<?=  $idOrden; ?>">
       <button type="submit">Guardar Orden</button>
      </form>
    </div> 
    </main>
<footer>
   <p>&copy; 2025 Mantenimientos de Equipos de Computo. Todos los derechos reservados.</p>
    </footer>
</body>
</html>