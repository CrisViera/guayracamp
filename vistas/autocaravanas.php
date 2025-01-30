<?php
include 'BBDD_data/numero_plazas_autocaravanas.php';
?>
<div class="contenido">
            
    <div class="cabecera-info">
        <div>
            <h1 class="text-center mb-5">Zona de Autocaravanas</h1>
            <p>
                Bienvenido a la zona de autocaravanas. Aquí encontrarás espacios adaptados y accesibles con todos los servicios necesarios.                 
            </p>
            <p>
                Disponemos de 15 plazas equipadas con acceso a agua y luz para garantizar una estancia cómoda y segura.
            </p>
            <p>Plazas disponibles: <?php echo $total_plazas_autocaravanas; ?></p>
            <h1 class="text-center mb-5">¿Que ofrecemos?</h1>
            <ul>
                <li>Área segura y vigilada 24/7</li>
                <li>Cobertura 4G y 5G</li>
                <li>Zonas de picnic y recreo</li>
                <li>Mascotas permitidas</li>
                <li>A poca distancia del mar</li>
                <li>Vaciado de aguas grises y negras</li>
            </ul>
            <p class="cabecera-info-reserva"><a href="login.php" class="text-decoration-none">¡Quiero reservar!</a></p>
        </div>              
        <img src="img/zona_autocaravanas.png" class="img-fluid img-cabecera-info img-izquierda" alt="Visión general de la zona de autocaravanas">
    </div>
</div>