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
// GUARDAR
if (isset($_POST["guardar"])) {
    $marca = $_POST["marcas"];
    if (!empty($marca)) {
        $conn->query("INSERT INTO marca (marcas) VALUES ('$marca')");
    }
}
/* ----------------------- CARGAR DATOS PARA EDITAR ----------------------- */
$idEditar = "";
$marcaEditar = "";

if (isset($_GET["actualizar"])) {
    $idEditar = $_GET["actualizar"];

    $busqueda = $conn->query("SELECT * FROM marca WHERE idMarcas = $idEditar");
    $datos = $busqueda->fetch_assoc();

    $marcaEditar = $datos["marcas"];
}

/* ----------------------- ACTUALIZAR MARCA ----------------------- */
if (isset($_POST["editar"])) {
    $id = $_POST["idEditar"];
    $marca = $_POST["marcas"];

    $conn->query("UPDATE marca 
                      SET marcas='$marca' 
                      WHERE idMarcas=$id");

    header("Location: Marca.php");
    exit;
}

// CONSULTAR
$resultado = $conn->query("SELECT idMarcas, marcas FROM marca");
if (isset($_GET["eliminar"])) {
    $id = $_GET["eliminar"];
    $conn->query("DELETE FROM marca WHERE idMarcas = $id");
    header("Location: Marca.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Marca</title>

    
    <link rel="stylesheet" href="../../../styles/styleMarca.css">
</head>
<body>

  
    <header>
        <div class="logo">
            <img src="../../../imagenes/imagenLogoEmpresa/logoEmpresa.jpg" alt="Logo" />
        </div>
        <h1>REGISTRAR MARCA</h1>
        <nav>
            <a href="../../direccionador.php">Mapa De Sitio</a>
            <a href="../../direccionadorMenu.php">Menú principal</a>
            <a href="../crudModelo/modelo.php">Modelo</a>
            <a href="../crudDispositivos/Dispositivos.php">Dispositivos</a>
        </nav> 
    </header>

   
    <main>

        <!-- FORMULARIO -->
        <section class="form-box">
    <h2><?= $idEditar ? "Editar Marca" : "Registrar Marca" ?></h2>

    <form method="POST">

        <input type="hidden" name="idEditar" value="<?= $idEditar ?>">

        <label>Nombre de la marca:</label>
        <input type="text" name="marcas" 
               value="<?= $marcaEditar ?>" 
               placeholder="Ingresa el nombre de la marca" required>

        <div class="botones">

            <?php if ($idEditar): ?>
                <button type="submit" name="editar">Actualizar</button>
                <a href="Marca.php">Cancelar</a>
            <?php else: ?>
                <button type="submit" name="guardar">Guardar</button>
                <button type="reset">Cancelar</button>
            <?php endif; ?>

        </div>
        
    </form>
</section>

        <!-- TABLA -->
        <section class="tabla-box">
            <h2>Marcas Registrados</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?= $fila['idMarcas'] ?></td>
                            <td><?= $fila['marcas'] ?></td>
                             <td>
                         <a href="Marca.php?actualizar=<?= $fila['idMarcas'] ?>">Actualizar</a>
                            <a href="Marca.php?eliminar=<?= $fila['idMarcas'] ?>" onclick="return confirm('¿Eliminar marcas?')"> Eliminar</a>
                        </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>

            </table>
        </section>
         
    </main>

    <!-- FOOTER -->
    <footer>
        <p>
        Derechos de Autor &#169; 2025 Mantenimientos de Computo. Todos los derechos reservado.
        </p>
    </footer>
 

</body>
</html>



