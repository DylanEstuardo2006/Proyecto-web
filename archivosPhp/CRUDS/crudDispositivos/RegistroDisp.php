<?php
require_once "../../conexion.php";
session_start();
 if($_SESSION['verificarAdministrador'] == 1 || $_SESSION['verificarAdministrador'] == 2)
 {
    
 }
 else
 { 
    header("Location: ../../../login.php");
    exit();
 }

$resultado = $conn->query("
SELECT d.idDispositivo,
       t.tipoDispositivo,
       d.nombreDispositivo,
       m.modelos,
       l.laboratorios,
       d.numeroInventario
FROM dispositivos d
LEFT JOIN tipodispositivo t ON d.idTipoDispositivo = t.idTipoDispositivo
LEFT JOIN modelos m ON d.idModelo = m.idModelo
LEFT JOIN laboratorios l ON d.idLaboratorio = l.idLaboratorio
");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dispositivos Registrados</title>
    <link rel="stylesheet" href="../../../styles/styleDispositivos.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="../../../imagenes/imagenLogoEmpresa/logoEmpresa.jpg" alt="Logo" />
    </div>

    <h1>DISPOSITIVOS REGISTRADOS</h1>

    <nav>
       <a href="../../direccionador.php">Mapa de Sitio</a>
        <a href="../../direccionadorMenu.php">Menú Principal</a>
        <a href="../crudModelo/modelo.php">Modelo</a>
        <a href="../crudMarca/Marca.php">Marcas</a>
        <a href="Dispositivos.php">Dispositivos</a>
    </nav>
</header>
<h2>Lista de dispositivos</h2>
<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo dispositivo</th>
            <th>Nombre dispositivo</th>
            <th>Modelo</th>
            <th>Laboratorio</th>
            <th>Numero inventario</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($fila = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $fila['idDispositivo'] ?></td>
                <td><?= $fila['tipoDispositivo'] ?></td>
                <td><?= $fila['nombreDispositivo'] ?></td>
                <td><?= $fila['modelos'] ?></td>
                <td><?= $fila['laboratorios'] ?></td>
                <td><?= $fila['numeroInventario'] ?></td>
                
                <td>
                    <a href="ActualizarDisp.php?id=<?= $fila['idDispositivo'] ?>">Actualizar</a>
                    <a href="eliminarDis.php?id=<?= $fila['idDispositivo'] ?>" onclick="return confirm('¿Eliminar dispositivo?')">Eliminar</a>

                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>

</table>
<footer>
        <p>Derechos de autor @2025 mantenimiento de computo todos los de rechos reservados</p>
        
</footer>
</body>
</html>
