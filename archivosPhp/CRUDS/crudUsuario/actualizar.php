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
  if (isset($_GET['id']))
 {
    $id = $_GET['id'];
    
    // Usar prepared statement
    $sql = "SELECT * FROM usuarios WHERE idUsuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        $rolActual = $usuario['idRoles'];
    } else {
        echo "Usuario no encontrado.";
        exit;
    }
} else {
    echo "ID no especificado.";
    exit;
}
 ?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel ="stylesheet" href="../../../styles/styleFormUsuarios.css">
    <script src = "js/validaciones.js" defer></script>
</head>
 <header>
        <div class="logo-space">
          <img src="../../../imagenes/imagenlogoCarrera/imagenLogoCarrera.png" alt="Logo UTHH" class="logo">
        </div>
        <div class="header-title">
          Actualizar Usuarios 
        </div>
        <div class="header-back"> 
          <div class ="links">  
            <a href = "../../mapaDeSitioAdministrador.php">Mapa de Sitio</a> 
            <a href="../../menuAdministrador.php">Menú Principal</a>
            <a href="registros.php">Registros</a>
          </div>
        </div>
    </header>
  <body> 
    <main>
    <div class = "title-form">
    <h2>Actualizar Usuario</h2>
    </div>
      <form method = "POST" action="ejecutarActualizar.php" class = "formulario">   
        <input type="hidden" name="idUsuario" value ="<?php echo $usuario['idUsuario']; ?>">
        <div class = "nombre">
        <strong>Nombre:</strong>
        <input type="text" class="txtForm" name="nombre" value ="<?php echo $usuario['nombre']?>" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$"  title="Solo letras y espacios. Mínimo 2 y máximo 50 caracteres." required></p>
        </div>
       <div class = "apellidos">
        <div class="apellidoPaterno">
        <strong>Apellido Paterno: </strong>
        <input type="text" class="txtForm" name="apellidoPaterno" value ="<?php echo $usuario['apellidoPaterno']?>" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{2,50}$" title="Solo letras y espacios. Mínimo 2 y máximo 50 caracteres." required></p>
        </div>
        <div class="apellidoMaterno"> 
        <strong>Apellido Materno: </strong>
        <input type="text" class="txtForm" name="apellidoMaterno"  value ="<?php echo $usuario['apellidoMaterno']?>"  pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{2,50}$" title="Solo letras y espacios. Mínimo 2 y máximo 50 caracteres." required></p>
       </div>
      </div>
      <div class ="cuenta">
        <div class="matricula">
        <strong> Matricula: </strong>
        <input type= "text" name="matricula" minlength="8" maxlength="10" inputmode="numeric"  value ="<?php echo $usuario['matricula']?>"   pattern="^[0-9]+" title = "Solo se aceptan números" required>
        </div>
        <div class ="contrasenia">
        <strong>Contraseñia: </strong>
        <input type="text" name="contrasenia" required  value ="<?php echo $usuario['contrasenia']?>"  minlength="5" maxlength="20" pattern = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{5,20}$" title ="Mínimo de 5 y un maximo de 20" required>
        </div>
      </div>
      <div class ="conocerUsuario">
        <div class ="telefono">
           <strong>Teléfono:</strong>
           <input type="tel" name="telefono"  value ="<?php echo $usuario['telefono']?>" pattern="^[0-9]{10}$" title ="Solo números. Debe contener 10 dígitios" required>
           </div>
           <div class ="tipoUsuario">
          <strong> Tipo de Usuario:</strong>
        <select class = "selectForm" name = "tipoUsuario" required>
                <?php
                  $tipos = $conn->query("SELECT * FROM roles");   

                  while($row = $tipos->fetch_assoc())
                  {
                    $selected = ($row['idRoles']==$rolActual) ? "selected":"";
                    echo "<option value=\"{$row['idRoles']}\" $selected>{$row['roles']}</option>";
                  }
                ?>
         </select>
          </div>
      </div>
        <input type="submit" class = "button" value= "Actualizar Usuario">
    </form>
      </main>
    <footer>
  <p> 

 Derechos de Autor &#169; 2025 Mantenimientos de Computo. Todos los derechos reservado.</p>
  
</footer>
   </body>
</html>