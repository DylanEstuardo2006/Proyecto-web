<?php 
  include_once 'conexion.php';   
   
  $idOrden = null;

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
    <link rel="stylesheet" href="../styles/styleSeleccionarLaboratorio.css">
</head>
<body>
        <header>
        <div class="logo-space">
          <img src="../imagenes/imagenlogoCarrera/imagenLogoCarrera.png" alt="Logo UTHH" class="logo">
        </div>
             <h3> <?php if($idOrden === null){ echo 'No se ha creado una Orden de Trabajo'; }else { echo 'Selecciona el laboratorio para la orden #'. $idOrden;}  ?></h3>
         <div class="header-back">
            <a href="ordenDeTrabajo.php" title = "Botón de Regresar">Regresar</a>
        </div>
        </header>
     <main>
        <section>
          <h4>Selecciona el laboratorio:</h4>
         <form method = "get" action = "listarDispositivos.php">
            <select name= "idLaboratorio" title = "Selecciona el Laboratorio" required>
                <option value = "">Selecciona un laboratorio</option>
                <?php
                     $labs = $conn->query("SELECT * FROM laboratorios");
                     while($l = $labs->fetch_assoc()){
                     echo "<option value='{$l['idLaboratorio']}'>{$l['laboratorios']}</option>";
                      }
                ?>
            </select>
              <input type="hidden" name="idOrden" value="<?php echo ($idOrden === null) ? 0 : $idOrden; ?>">
            <button type="submit">Siguiente → Seleccionar Dispositivos</button>
         </form>
        </section>
     </main>
   <footer>
    <p>&copy; 2024 Mantenimientos de Cómputo. Todos los derechos reservados.</p>
   </footer>
</body>
</html>