<?php
session_start();

if (!isset($_SESSION["correo"])) {
    header("Location: login.php");
    exit();
}

$correo = $_SESSION["correo"];
include "BBDD_data/datosUsuario.php";
?>

<!DOCTYPE html>
<html lang="es">
<?php
include 'includes/header.php';
?>
<body>
    <div class="contenedor">

        <?php include 'includes/menu.html'; ?>

        <div class="cabecera">

        </div>

        <h1>Bienvenido <?php echo $nombre; ?></h1>
        <?php include 'includes/footer.html'; ?>
    </div>
</body>
</html>
