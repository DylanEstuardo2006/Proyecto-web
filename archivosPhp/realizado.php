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
    $estado = $_POST['estado'];
    $idUsuario = $_POST['idUsuario'];

    //Consulta para saber si el estado ya esta aceptado esa orden

    $consulta = $conn->query("SELECT * FROM ordendetrabajo WHERE idOrdenDeTrabajo = $idOrden AND estado = '$estado' AND idUsuario = '$idUsuario'");
     
if ($consulta->num_rows > 0) 
{
     echo "<script>
                alert('La orden de trabajo estaba aceptada');
                window.location.href='registroDeOrdenesDeTrabajo.php';
              </script>";
    exit();
}
    //Consulta para actualizar el estado

    $sqlUpdate = "UPDATE ordendetrabajo SET estado = ? WHERE idOrdenDeTrabajo = ?";   
   
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("si",$estado,$idOrden);
    
    if($stmt->execute())
    {
        echo "<script>
                alert('Orden Trabajo aceptada');
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