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
        <div class ="logo-container">
            <img src ="">
        </div>
        <nav>
            <h1>Mantenimientos de Cómputo</h1>
        </nav>
    </header>
    <main>
        <section>
            <h2>Iniciar Sesión</h2>
            <div>
                <form action="iniciarSesion.php" method="POST">
                    <label for="username">Usuario:</label>
                    <input type="text"  class = "txtIniciarSesion" id="username" name="username" required><br><br> 
                    <label for="password">Contraseña:</label>
                    <input type="password" class = "txtIniciarSesion" id="password" name="password" required><br><br>
                 
                    <label for="username">Cargo:</label>
                     <select>
                        <option value= 1 >Usuarios</option>
                        <option value= 2 >Administrador</option>
                        <option value= 3 >Tecnicos</option>
                    </select>
                    <button type="submit">Iniciar Sesión</button>
                   
                  </form>
            </div>
         <!-- Así comentas tu código en html  <div = class = "seOlvidoContrasenia">
                <p><a href="#seOlvidoContrasenia"> ¿ Se te olvido tu contraseña ?</a></p>
           </div>
          -->
        </section>
         <aside>
           <img src="imagenes/imagenLogoEmpresa/logoEmpresa.jpg" alt="Imagen de Mantenimiento de Cómputo" width="300">    
         </aside>
    </main>
    <footer>
        <p>&copy; 2024 Mantenimientos de Cómputo. Todos los derechos reservados.</p>    
    </footer>
</body>
</html>