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
    echo "<script>
             alert('✅ Orden guardada exitosamente.');
             window.location='menuAdministrador.php';
          </script>";
    exit();
  }
  else
  {
     echo "<script>
           alert('❌ No seleccionaste ningún dispositivo.');
           window.location='formUsuarios.php';
           </script>";
    exit();
  }
?>