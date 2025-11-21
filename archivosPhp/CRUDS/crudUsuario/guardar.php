<?php
   include_once '../../conexion.php';

   if($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      if(isset($_POST['tipoUsuario']) && $_POST['tipoUsuario'] != 0)
      {
          $nombre = $_POST['nombre'];
          $apellidoPaterno = $_POST['apellidoPaterno'];
          $apellidoMaterno = $_POST['apellidoMaterno'];
          $matricula = $_POST['matricula'];
          $contrasenia = $_POST['contrasenia'];
          $telefono = $_POST['telefono'];
          $tipoUsuario = $_POST['tipoUsuario'];

            $sqlCheck = "SELECT * FROM usuarios WHERE matricula = '$matricula'";
            if($conn -> query($sqlCheck)->num_rows > 0)
            {
               echo "<script>
                     alert('❌ La matrícula ya está registrada. Por favor, utiliza una matrícula diferente.');
                     window.location='formUsuarios.php';
                  </script>";
            }
            else 
           {
            
            $sql = "INSERT INTO usuarios (nombre, apellidoPaterno, apellidoMaterno, matricula, contrasenia, telefono, idRoles) 
                     VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$matricula', '$contrasenia', '$telefono', '$tipoUsuario')";
     
    
          if($conn->query($sql) === TRUE)
            {
               echo "<script>
                     alert('✅ Usuario registrado exitosamente.');
                     window.location='registros.php';
                  </script>";
            exit();
            }
            else
            {
               echo "<script>
                     alert('❌ Error al registrar el usuario. Por favor, intenta nuevamente.');
                     window.location='formUsuarios.php';
                  </script>";
               exit();
            }
               
          }      

      }
      else
      {
          echo "<script>
                   alert('❌ Por favor, selecciona un tipo de usuario válido.');
                   window.location='formUsuarios.php';
                 </script>";
           exit();
      }
   }
?>
