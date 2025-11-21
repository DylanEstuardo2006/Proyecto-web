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
           Registrar Usuario
        </div>
        <div class="header-back"> 
          <div class ="links">   
            <a href="../../menuAdministrador.php">Regresar</a>
            <a href="registros.php">Ver Usuarios</a>
          </div>
        </div>
    </header>
  <body> 
    <main>
    <div class = "title-form">
    <h2>Registrar Usuario</h2>
    </div>
      <form method = "POST" action="guardar.php" class = "formulario">   
        <div class = "nombre">
        <strong>Nombre:</strong>
        <input type="text" class="txtForm" name="nombre" placeholder="Nombre" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ]+(?:\s[A-Za-zÁÉÍÓÚáéíóúÑñ]+)*$"  title="Solo letras y espacios. Mínimo 2 y máximo 50 caracteres." required></p>
        </div>
       <div class = "apellidos">
        <div class="apellidoPaterno">
        <strong>Apellido Paterno: </strong>
        <input type="text" class="txtForm" name="apellidoPaterno" placeholder="Apellido Paterno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{2,50}$" title="Solo letras y espacios. Mínimo 2 y máximo 50 caracteres." required></p>
        </div>
        <div class="apellidoMaterno"> 
        <strong>Apellido Materno: </strong>
        <input type="text" class="txtForm" name="apellidoMaterno" placeholder="Apellido Materno" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ ]{2,50}$" title="Solo letras y espacios. Mínimo 2 y máximo 50 caracteres." required></p>
       </div>
      </div>
      <div class ="cuenta">
        <div class="matricula">
        <strong> Matricula: </strong>
        <input type= "text" name="matricula" minlength="8" 
  maxlength="10" inputmode="numeric" placeholder="Ingrese su matricula"  pattern="^[0-9]+" title = "Solo se aceptan números" required>
        </div>
        <div class ="contrasenia">
        <strong>Contraseñia: </strong>
        <input type="text" name="contrasenia" required placeholder="Ingrese su contraseñia" minlength="5" maxlength="20" pattern = "^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]{5,20}$" title ="Mínimo de 5 y un maximo de 20" required>
        </div>
      </div>
      <div class ="conocerUsuario">
        <div class ="telefono">
        <strong>Teléfono:</strong>
        <input type="tel" name="telefono" placeholder="Teléfono" pattern="^[0-9]{10}$" title ="Solo números. Debe contener 10 dígitios" required>
        </div>
        <div class ="tipoUsuario">
        <strong> Tipo de Usuario:</strong>
        <select class = "selectForm" name = "tipoUsuario" required>
             <option value = 0>Elige una opción</option>
                <?php
                  $tipos = $conn->query("SELECT * FROM roles");   

                  while($row = $tipos->fetch_assoc())
                  {
                    echo "<option value='{$row['idRoles']}'>{$row['roles']}</option>";
                  }
                ?>
        </select>
          </div>
      </div>
        <input type="submit" class = "button" value= "Registrar Usuario">
        </form>
      </main>
    <footer>
  <p> 

 Derechos de Autor &#169; 2025 Mantenimientos de Computo. Todos los derechos reservado.</p>
  
</footer>
   </body>
</html>