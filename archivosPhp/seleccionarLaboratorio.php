<?php 
  include_once 'conexion.php';   
   

  if($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
     if(!isset($_POST['tipoMantenimiento']) || $_POST['tipoMantenimiento'] == "") 
  {
      echo "<script>
                   alert('❌ Por favor, selecciona un tipo de mantenimiento valido.');
                   window.location='ordenDeTrabajo.php';
                 </script>";
           exit();
  }
  $idTipoMantenimiento = $_POST['tipoMantenimiento'];
  $estado = $_POST['estado'];
  $insumos = $_POST['insumos'];
  $idUsuario = $_POST['idUsuario'];
  $horasHombre = $_POST['horasHombre'];
  $date = $_POST['fechaCreacion'];
  $timesTamp = date('Y-m-d H:i:s', strtotime($date. ' 00:00:00'));

  $sql = "INSERT INTO ordenDeTrabajo (idTipoMantenimiento, idUsuario, estado, realizadoMantenimiento,insumos, horasHombres, fechaDeCreacion) 
          VALUES (?,?,?,'proceso',?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissis", $idTipoMantenimiento, $idUsuario, $estado, $insumos, $horasHombre,$timesTamp);    
    $stmt->execute();

    $idOrden = $stmt->insert_id;
   
  }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Trabajo</title>
</head>
<body>
    <main>
        <header>
           <h1>Selecciona el laboratorio para la orden #<?= $idOrden; ?></h1>
         </header>
         <form method = "get" action = "listarDispositivos.php">
            <select name= "idLaboratorio" required>
                <option value = "">Selecciona un laboratorio</option>
                <?php
                     $labs = $conn->query("SELECT * FROM laboratorios");
                     while($l = $labs->fetch_assoc()){
                     echo "<option value='{$l['idLaboratorio']}'>{$l['laboratorios']}</option>";
                      }
                ?>
            </select>
            <input type="hidden" name="idOrden" value="<?= $idOrden; ?>">
            <button type="submit">Siguiente → Seleccionar Dispositivos</button>
        </form>
   </main>
</body>
</html>