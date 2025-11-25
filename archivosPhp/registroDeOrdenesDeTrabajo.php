<?php
    include_once 'conexion.php';
    session_start();
     if($_SESSION['verificarAdministrador'] == 1)
     {
        
     }
     else
     { 
        header("Location: ../../../login.php");
        exit();
     }

$condiciones = [];
$parametros = [];

// FILTROS OPCIONALES

if (!empty($_GET['matricula'])) {
    $condiciones[] = "usuarios.matricula LIKE ?";
    $parametros[] = "%" . $_GET['matricula'] . "%";
}

if (!empty($_GET['fecha'])) {
    $condiciones[] = "ordendetrabajo.fechaDeCreacion = ?";
    $parametros[] = $_GET['fecha'];
}

if (!empty($_GET['idLaboratorio'])) {
    $condiciones[] = "laboratorios.idLaboratorio = ?";
    $parametros[] = $_GET['idLaboratorio'];
}

// BASE QUERY CORRECTA
$sql = " SELECT 
    ordendetrabajo.idOrdenDeTrabajo,
    ordendetrabajo.idUsuario,
    dispositivos.idDispositivo,
    ordendetrabajo.fechaDeCreacion,
    usuarios.matricula,
    dispositivos.nombreDispositivo,
    laboratorios.laboratorios AS laboratorio,
    tipomantenimiento.tipoMantenimiento,
    ordendetrabajo.estado,
    ordendetrabajo.realizadoMantenimiento
FROM ordendetrabajo
INNER JOIN usuarios 
        ON ordendetrabajo.idUsuario = usuarios.idUsuario
INNER JOIN tipomantenimiento
        ON ordendetrabajo.idTipoMantenimiento = tipomantenimiento.idTipoMantenimiento
INNER JOIN orden_dispositivos
        ON ordendetrabajo.idOrdenDeTrabajo = orden_dispositivos.idOrdenDeTrabajo
INNER JOIN dispositivos
        ON orden_dispositivos.idDispositivo = dispositivos.idDispositivo
INNER JOIN laboratorios
        ON dispositivos.idLaboratorio = laboratorios.idLaboratorio
";

// APLICAR FILTROS
if (!empty($condiciones)) {
    $sql .= " WHERE " . implode(" AND ", $condiciones);
}

$stmt = $conn->prepare($sql);

// VINCULAR PARÁMETROS
if (!empty($parametros)) {
    $tipos = str_repeat("s", count($parametros));
    $stmt->bind_param($tipos, ...$parametros);
}

$stmt->execute();
$resultado = $stmt->get_result();

?>
<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Ordenes de Trabajo</title>
    <link rel="stylesheet" href="../styles/styleRegistrosOrdenesDeTrabajo.css">
</head>
<body>

<header class="header">
    <div class="header-left">
        <img src="../imagenes/imagenLogoEmpresa/logoEmpresa.jpg" class="logo">
        <h1>Registros Ordenes de Trabajo</h1>
    </div>

    <nav class="nav">
        <a href="mapaDeSitioAdministrador.php">Mapa de Sitio</a>
        <a href="menuAdministrador.php">Menú Principal</a>
        <a href="ordenDeTrabajo.php">Orden de Trabajo</a>
    </nav>

    <img src="../imagenes/imagenLogoUthh/logoUthh.png" class="logo-utit">
</header>
<main class="contenido">
    <section class = "section-form-filtro">
    <form method="GET" action ="">
        <div class = "div-box-fecha">
            <strong>Fecha:</strong>
          <input type="date" name="fecha" value="<?php echo $_GET['fecha'] ?? ''; ?>">
        </div>
        <div class = "div-box-laboratorio">
            <strong>Laboratorio:</strong>
            <select name= "idLaboratorio">
                <option value = "">Elige una opción</option>
                <?php
                    $labs = $conn->query("SELECT * FROM laboratorios");
                    while($l = $labs->fetch_assoc()){
                    echo "<option value='{$l['idLaboratorio']}'>{$l['laboratorios']}</option>";
                    }
                ?>
            </select>
        </div>
        <div class = "div-box-matricula">
            <strong>Matrícula:</strong>
            <input type= "text" name="matricula" minlength="8" maxlength="10" inputmode="numeric" placeholder="Ingrese su matricula" pattern="^[0-9]+" title = "Solo se aceptan números">
        </div>
        <div class="div-box-filtro">
            <button type="submit" class="btn-filtrar">Filtrar</button>
        </div>
    </form>
</section>
    <?php if ($resultado->num_rows > 0): ?>
    <table class="tabla-usuarios">
        <thead>
            <tr>
                <th>Laboratorio</th>
                <th>Fecha de Creacion</th>
                <th>Matricula Usuario</th>
                <th>Tipo Mantenimiento</th>
                <th>Nombre Dispositivo</th>
                <th>Estado</th>
                <th>Realizado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($orden= $resultado->fetch_assoc()): ?>
            <tr>
                <td><?= $orden['laboratorio'] ?></td>
                <td><?= $orden['fechaDeCreacion'] ?></td>
                <td><?= $orden['matricula'] ?></td>
                <td><?= $orden['tipoMantenimiento'] ?></td>
                <td><?= $orden['nombreDispositivo'] ?></td>
                <td><?= $orden['estado'] ?></td>
                <td><?= $orden['realizadoMantenimiento'] ?></td>
        
                <td class = "form-acciones"> 
                <form action ="estado.php" method= "POST">
                    <input type="hidden" name="idOrdenDeTrabajo" value="<?php echo $orden['idOrdenDeTrabajo'] ?> ">
                    <input type="hidden" name="idUsuario" value="<?php echo $orden['idUsuario'] ?>">
                    <button type="submit" class ="btn-acciones" onclick="return confirm('¿Desea poner el estado en ACEPTADO?')"> Estado </button>
                </form>
                 <form action ="realizado.php" METHOD = "POST" class = "form-acciones">
                    <input type="hidden" name="idOrden" value="<?php echo $orden['idOrdenDeTrabajo'] ?> ">
                    <input type="hidden" name="estado" value="<?php echo $orden['estado'] ?> ">
                    <input type="hidden" name="idUsuario" value="<?php echo $orden['idUsuario'] ?>">
                    <button type="submit"  class ="btn-acciones" onclick="return confirm('¿Desea poner el mantenimiento como REALIZADO?')"> Realizado </button>
                </form>
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
