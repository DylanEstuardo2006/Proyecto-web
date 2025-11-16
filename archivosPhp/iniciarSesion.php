<?php  
   include_once 'conexion.php';


   if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
     
   $usuario = $_POST['matricula'];
   $contrasenia = $_POST['contrasenia'];
   $tipoUsuario = $_POST['tipoUsuario'];

  if($tipoUsuario == 0)
  {
      echo "<script>
                   alert('❌ Por favor, selecciona un tipo de usuario válido.');
                   window.location='../login.php';
                 </script>";
           exit();
  }
   session_start();

   $sql = "SELECT * FROM usuarios WHERE matricula = '$usuario' AND contrasenia = '$contrasenia' AND idRoles = '$tipoUsuario'";
   $resultado = mysqli_query($conn, $sql);

   $filas = mysqli_fetch_array($resultado);
  if($filas)
   {
        $_SESSION['nombre'] = $filas['nombre'];
        $_SESSION['idRoles'] = $filas['idRoles'];
        $_SESSION['idUsuario'] = $filas['idUsuario'];
       
          $_SESSION['verificarAdministrador'] = 1;
     
        if($filas['idRoles'] == 1 && $_SESSION['verificarAdministrador'] == 1)
        {   
          header("Location: menuAdministrador.php");
          exit();
        } 
        elseif($filas['idRoles'] == 2)
        {
            header("Location: ../admin/panelAdmin.php");
         } 
         elseif($filas['idRoles'] == 3)
         {
              header("Location: ../tecnico/.php");
         }
     
  }
  else
  {
     echo "<script>
                   alert('❌ Usuario, contraseña o tipo de usuario incorrectos. Por favor, intenta nuevamente.');
                   window.location='../login.php';
                 </script>";
           exit();
     
  }
} 
else 
{
    echo "Método no permitido";
}
    
?>