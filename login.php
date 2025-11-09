<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimientos de Cómputo</title>
    <link rel="stylesheet" href="styles/styleLogin.css">
</head>
<body>
    <header>
            <img src ="imagenes/imagenLogoUthh/logoUthh.png" alt="Logo ITL" class="logo">
           <nav>
                <ul>
                    <li><a href = "index.html">Menu Principal</a></li>
                </ul>
          </nav>
   </header>
    <main>
        <section>
            <h2>Iniciar Sesión</h2>
                <form action="archivosPhp/iniciarSesion.php" method="POST">
                    <label for="username">Usuario:</label>
                    <input type="text"  class = "txtIniciarSesion" name="matricula" required><br><br> 
                    <label for="password">Contraseña:</label>
                    <input type="password" class = "txtIniciarSesion"  name="contrasenia" required><br><br>
                 
                    <label for="username">Tipo de usuario:</label>
                     <select name = "tipoUsuario">
                        <option value = 0>Elige una opción</option>
                        <option value= 1>Administradores</option>  
                        <option value= 2 >Tecnicos</option>
                    </select>
                    <input type="submit" class = "button" value= "Iniciar Sesión">
                  </form>
        </section>
         <aside>
           <img src="imagenes/imagenLogoLogin/imagenLogoLogin.jpg" alt="Imagen de Mantenimiento de Cómputo" width="300">    
         </aside>
    </main>
    <footer>
        <p>&copy; 2024 Mantenimientos de Cómputo. Todos los derechos reservados.</p>    
    </footer>
</body>
</html>