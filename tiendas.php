<!DOCTYPE html>
<html lang="en">
<?php
$titulo = "Tiendas";
?>
<?php include 'includes/header.php'; ?>
<body onload="actualizarPlazasTiendas()">
    <div class="contenedor">

        <?php include 'includes/menu.html'; ?>

        <div class="cabecera">

        </div>

        <?php include 'vistas/tiendas.php'; ?>
        <?php include 'includes/footer.html'; ?>
    </div>
</body>

</html>