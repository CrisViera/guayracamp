<!DOCTYPE html>
<html lang="en">
<?php
$titulo = "GuayraCamp";
include 'includes/header.php'; 
?>
<body>
    <div class="contenedor">

        <?php include 'includes/menu.php'; ?>

        <div class="cabecera">
            <div class="slider">
                <div class="slide"><img src="img/slide1.jpg" alt="Camping 1"></div>
                <div class="slide"><img src="img/slide2.jpg" alt="Camping 2"></div>
                <div class="slide"><img src="img/slide3.jpg" alt="Camping 3"></div>
            </div>
        </div>

        <?php include 'views/home.html'; ?>
        <?php include 'includes/footer.html'; ?>
    </div>
</body>

</html>
