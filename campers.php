<!DOCTYPE html>
<html lang="en">
<?php
$titulo = "Campers";
?>
<?php include 'includes/header.php'; ?>
<body onload="actualizarPlazasCampers()">
    <div class="contenedor">

        <?php include 'includes/menu.html'; ?>

        <div class="cabecera">

        </div>

        <?php include 'vistas/campers.php'; ?>
        <?php include 'includes/footer.html'; ?>
    </div>
</body>

</html>