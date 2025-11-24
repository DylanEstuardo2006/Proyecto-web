<?php 
 session_start();

 if($_SESSION['verificarAdministrador'] == 1)
 {
  
 }
 else 
 {
    header("Location: ../login.php");
    exit();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Sitio</title>
    <link rel="stylesheet" href="../styles/styleMapaDeSitioPublico.css">
</head>
<body>
    <header>
        <div class ="logo-empresa">
         <img src ="../imagenes/imagenLogoEmpresa/logoEmpresa.jpg" alt = "logo" class ="logoEmpresa">
        </div>
          <h1>Mantenimientos De cómputo</h1>
        <div class = "logo-uthh">
         <img src = "../imagenes/imagenLogoUthh/logoUthh.png" alt = "logoUthh" class ="logoUthh">
        </div>
    </header>
    <main>
        <section class ="titulo-mapa-sitio">
            <h2>Mapa de Sitio Administrador</h2>
        </section>
    <div class ="contenedor-mapa-sitio">
        <section class ="mapa-sitio">
           <table>
              <thead>
                <tr>
                    <th>
                         <h3>Órden de trabajo</h3>
                    </th>
                </tr>    
              </thead>
               <tbody>
                <tr>
                    <td><li><a href="ordenDeTrabajo.php">Crear orden de trabajo</a></li></td>
                </tr>
                <tr>
                    <td><li><a href="seleccionarLaboratorio.php">Seleccionar Laboratorio</a></li></td>
                </tr>
                <tr>
                    <td><li><a href="listarDispositivos.php">Guardar orden y lista dispositivos</a></li></td>
                </tr>
                <tr>
                    <td><li><a href="registroDeOrdenesDeTrabajo.php">Registro orden de trabajo</a></li></td>
                </tr>
                </table>
        </section>
          <section class ="mapa-sitio">
           <table>
              <thead>
                <tr>
                    <th>
                         <h3>Dispositivos</h3>
                    </th>
                </tr>    
              </thead>
               <tbody>
                <tr>
                    <td><li><a href="CRUDS/crudMarca/Marca.php">Marca</a></li></td>
                </tr>
                <tr>
                    <td><li><a href="CRUDS/crudModelo/modelo.php">Modelo</a></li></td>
                </tr>
                <tr>
                    <td><li><a href="CRUDS/crudDispositivos/Dispositivos.php">Registrar Dispositivos</a></li></td>
                </tr>
                    <td><li><a href="CRUDS/crudDispositivos/RegistroDisp.php">Dispositivos</a></li>
                <tr>
                    <td><li><a href="CRUDS/crudDispositivos/ActualizarDisp.php">Actualizar Dispositivos</a></li></td>
                </tr>
                </table>
        </section>
     
        <section class= "mapa-sitio">
            <table>
              <thead>
                <tr>
                    <th>
                         <h3>Usuarios</h3>
                    </th>
                </tr>    
              </thead>
               <tbody>
                <tr>
                    <td><li><a href="CRUDS/crudUsuario/formUsuarios.php">Registrar Usuario</a></li></td>
                </tr>
                <tr>
                    <td><li><a href="CRUDS/crudUsuario/registros.php">Usuarios registrados</a></li></td>
                </tr>
                  <tr>
                    <td><li><a href="CRUDS/crudUsuario/actualizar.php">Actualizar</a></li></td>
                  </tr>
              </tbody>
           </table>
        </section>
           <section class ="mapa-sitio">
           <table>
              <thead>
                <tr>
                    <th>
                         <h3>Administrador</h3>
                    </th>
                </tr>    
              </thead>
               <tbody>
                <tr>
                    <td><li><a href="menuAdministrador.php">Menú Administrador</a></li></td>
                </tr>
                <tr>
                    <td><li><a href="registrosAdministrador.php">Registros de Administrador</a></li></td>
                </tr>
               </tbody>
                </table>
        </section>
     </div> 
    </main>
 <footer>
          <p>&copy; 2024 Mantenimientos de Computo. Todos los derechos reservados.</p>
     </footer>
</body>
</html>