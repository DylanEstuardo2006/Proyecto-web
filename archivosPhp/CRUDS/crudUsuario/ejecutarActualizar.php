<?php
  include_once '../../conexion.php';
  session_start();
 if($_SESSION['verificarAdministrador'] == 1)
 {
    
 }
 else
 { 
    header("Location: ../../../login.php");
    exit();
 }
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $idUsuario = $_POST['idUsuario'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $matricula = $_POST['matricula'];
    $contrasenia = $_POST['contrasenia'];
    $telefono = $_POST['telefono'];
    $tipoUsuario = $_POST['tipoUsuario'];

    $sqlUpdate = "UPDATE usuarios SET nombre = ?, apellidoPaterno = ?,apellidoMaterno = ?, matricula = ?, contrasenia = ?, telefono = ?, idRoles = ? WHERE idUsuario = ?";
    $stmt = $conn->prepare($sqlUpdate);
    $stmt->bind_param("ssssssii",$nombre,$apellidoPaterno,$apellidoMaterno,$matricula,$contrasenia,$telefono,$tipoUsuario,$idUsuario);
    
    if($stmt->execute())
    {
        echo "<script>
                alert('Usuario actualizado correctamente');
                window.location.href='registros.php';
              </script>";
        exit;
    }
    else 
    {
       echo "<script>
                alert('Salio algo mal al actualizar el usuario');
                window.location.href='registros.php';
              </script>";
        exit;
    }
  }
  else
  {
    echo "<script> 
          alert('❌ La actualización no se envio por metodo POST');
           window.location='actualizar.php';
          </script>";
  }
?>