<?php
  include_once 'conexion.php';

  $idOrden = $_POST['idOrden'];
  $dispositivos = $_POST['dispositivos'];

  if(!empty($dispositivos))
  {
    foreach($dispositivos as $idDispositivos)
    {
      $sql = "INSERT INTO orden_dispositivos (idOrdenDeTrabajo,idDispositivo) VALUES (?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ii",$idOrden,$idDispositivos);
      $stmt->execute();
    }
    echo "<h3> Orden guardada correctamente con los dispositivos seleccionados.</h3>";
  }
  else
  {
    echo "<h3> No seleccionaste ningún dispositivo.</h3>";
  }
?>
<a href ="ordenDeTrabajo.php">Crear otra orden</a>