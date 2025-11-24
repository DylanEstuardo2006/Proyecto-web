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

if (isset($_POST["guardar"])) {

    $nombre = $_POST["nombre"];
    $numero = $_POST["numeroInventario"];
    $tipo = $_POST["tipodispositivo"];
    $modelo = $_POST["modelo"];
    $lab = $_POST["laboratorios"];

    if (!empty($nombre) && !empty($numero) && !empty($tipo) && !empty($modelo) && !empty($lab)) {

        $conn->query("INSERT INTO dispositivos 
            (idLaboratorio, idModelo, idTipoDispositivo, nombreDispositivo, numeroInventario)
            VALUES ('$lab', '$modelo', '$tipo', '$nombre', '$numero')");
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Dispositivo</title>
    <link rel="stylesheet" href="../../../styles/styleDispositivos.css">
</head>
<body>

<header>
    <div class="logo">
        <img src="../../../imagenes/imagenLogoEmpresa/logoEmpresa.jpg" alt="Logo">
    </div>

    <h1>REGISTRAR DISPOSITIVO</h1>

    <nav>
        <a href="../../direccionador.php">Mapa de Sitio</a>
        <a href="../../direccionadorMenu.php">Menú Principal</a>
        <a href="../crudModelo/modelo.php">Modelo</a>
        <a href="../crudMarca/Marca.php">Marcas</a>
        <a href="RegistroDisp.php">Registros</a>
    </nav>
</header>

<main>
    <div class="form-box">
        <h2>Formulario de Registro</h2>

        <form method="POST">

            
       <label>Nombre dispositivo:</label>
         <input type= "text" name="nombre" placeholder="ingresa el nombre del dispositivo" required>
           
       <label>Numero de inventario:</label>
       <input type="text" name ="numeroInventario" placeholder="ingresa el numero de inventario" required>

        <label>Tipo dispositivo:</label>
            <select name="tipodispositivo" required>
          <option value="">Seleccione un dispositivo</option>

        <?php
        $tipodispositivo2 = $conn->query("SELECT idTipoDispositivo, tipoDispositivo FROM tipoDispositivo");
        while ($fila = $tipodispositivo2->fetch_assoc()):
        ?>
        <option value="<?= $fila['idTipoDispositivo'] ?>"
        <?=isset($tipodispoitivieditar)&& $fila['idTipoDispositivo'] == ($tipodispoitivieditar)? 'selected' : '' ?>>
        <?= $fila['tipoDispositivo'] ?>
        </option>
        <?php endwhile; ?>
       </select>


        <label>Modelo:</label>
        <select name="modelo" required>
        <option value="">Seleccione una modelo</option>

        <?php
        $modelo2 = $conn->query("SELECT idModelo , modelos FROM modelos");
        while ($fila = $modelo2->fetch_assoc()):
        ?>
        <option value="<?= $fila['idModelo'] ?>"
        <?=isset($modeloeditar) && $fila ['idModelo'] == ($modeloeditar)?  'selected' : '' ?>>
        <?=$fila['modelos'] ?>
        </option>
        
        <?php endwhile; ?>
       </select>
       
       
       <label>Laboratorio:</label>
        <select name="laboratorios" required>
        <option value="">Seleccione un laboratorio</option>

        <?php
        $laboratorio2 = $conn->query("SELECT idLaboratorio , laboratorios FROM laboratorios");
        while ($fila = $laboratorio2->fetch_assoc()):
        ?>
        <option value="<?= $fila['idLaboratorio'] ?>"
        <?= isset($laboratorioeditar)&& $fila['idLaboratorio'] == ($laboratorioeditar)? 'selected' : '' ?>>
        <?= $fila['laboratorios'] ?>

        </option>
        <?php endwhile; ?>
       </select>
           
    <div class="botones">
                <button type="submit" name="guardar">Guardar</button>
                <button type="reset">Cancelar</button>
            </div>

        </form>
    </div>
</main>

<footer>
    <p>Derechos de autor © 2025 mantenimiento de cómputo — Todos los derechos reservados</p>
</footer>

</body>
</html>


