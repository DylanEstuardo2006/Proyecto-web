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
     //Hacer la tabla de registro
 // Consulta a la base de datos
  $sql = "SELECT usuarios.idUsuario,usuarios.nombre,usuarios.apellidoPaterno,usuarios.apellidoMaterno,
  usuarios.matricula,usuarios.contrasenia,usuarios.telefono,roles.roles FROM usuarios INNER JOIN roles ON usuarios.idRoles = roles.idRoles";
  // Ejecutamos la consulta
  $resultado = $conn -> query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros Usuarios</title>
    <link rel="stylesheet" href="../../../styles/styleRegistrosUsuarios.css">
</head>
<body>

<header class="header">
    <div class="header-left">
        <img src="../../../imagenes/imagenLogoEmpresa/logoEmpresa.jpg" class="logo">
        <h1>REGISTROS USUARIOS</h1>
    </div>

    <nav class="nav">
        <a href="../../mapaDeSitioAdministrador.php">Mapa de Sitio</a>
        <a href="../../../index.html">Menú Principal</a>
        <a href="formUsuarios.php">Usuarios</a>
    </nav>

    <img src="../../../imagenes/imagenLogoUthh/logoUthh.png" class="logo-utit">
</header>


<main class="contenido">

    <?php if ($resultado->num_rows > 0): ?>
    <table class="tabla-usuarios">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Matrícula</th>
                <th>Contraseña</th>
                <th>Roles</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
        <?php while ($usuario = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $usuario['nombre'] ?></td>
                <td><?= $usuario['apellidoPaterno'] ?></td>
                <td><?= $usuario['apellidoMaterno'] ?></td>
                <td><?= $usuario['matricula'] ?></td>
                <td><?= $usuario['contrasenia'] ?></td>
                <td><?= $usuario['roles'] ?></td>
                <td><?= $usuario['telefono'] ?></td>

                <td>
                    <a class="btn accion" href="actualizar.php?id=<?= $usuario['idUsuario'] ?>">Actualizar</a>
                    <a class="btn eliminar" 
                       href="eliminar.php?id=<?= $usuario['idUsuario'] ?>"
                       onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">
                       Eliminar
                    </a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <?php else: ?>
        <h2>No existen registros</h2>
    <?php endif; ?>

</main>

<footer class="footer">
    © 2024 Mantenimientos de Cómputo. Todos los derechos reservados.
</footer>
</body>
</html>
