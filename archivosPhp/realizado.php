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

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    $idOrden = $_POST['idOrdenDeTrabajo'];
    $estado = strtolower(trim($_POST['estado']));
    $realizado = "realizado";
    $idUsuario = $_POST['idUsuario'];

    //Consulta para saber si el estado ya esta aceptado esa orden 

    if("aceptado" !== $estado) 
    {
      echo "<script>
              alert('No se puede realizar un mantenimiento que no ha sido aceptado');
              window.location.href='registroDeOrdenesDeTrabajo.php';
            </script>";
      exit();
    }
    //Consulta para actualizar el estado

    $sqlUpdate = "UPDATE ordendetrabajo SET realizadoMantenimiento = ? WHERE idOrdenDeTrabajo = ?";   
   
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("si",$realizado,$idOrden);
    
    if($stmt->execute())
    {
        echo "<script>
                alert('Orden Trabajo: Mantenimiento Realizado');
                window.location.href='registroDeOrdenesDeTrabajo.php';
              </script>";
        exit;
    }
    else 
    {
       echo "<script>
                alert('Salio algo mal al actualizar el usuario');
                window.location.href='registroDeOrdenesDeTrabajo.php';
              </script>";
        exit;
    }
   }
  else
  {
    echo "<script> 
          alert('❌ La actualización no se envio por metodo POST');
           window.location='registroDeOrdenesDeTrabajo.php';
          </script>";
  }
?>