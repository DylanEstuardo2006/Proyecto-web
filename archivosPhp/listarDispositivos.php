<?php

include_once 'conexion.php';
session_start();

 if($_SESSION['verificarAdministrador'] != 1)
 {
    header("Location: ../login.php");
    exit();
 }

$verificar = false; 
$result = null;


if(isset($_GET['idLaboratorio']) && $_GET['idLaboratorio'] != "") 
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
    <title>Dispositivos</title>
    <link rel ="stylesheet" href="../styles/styleListarDispositivos.css">
</head>
<body>
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
    </footer>
</body>
</html>