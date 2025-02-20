<?php
include 'BBDD_data/tiendas_total_places.php';
?>
<div class="contenido">
            
    <div class="cabecera-info">
        <div>
            <h1 class="text-center mb-5">Zona de tiendas de campaña</h1>
            <p>
                 Contamos con terreno nivelado para facilitar el montaje de las tiendas, así como zonas sombreadas que proporcionan un descanso agradable durante el día. 
            </p>
            <p>
                 Los campistas tendrán acceso a servicios básicos como baños, duchas con agua caliente y puntos de agua, además de áreas comunes para socializar, cocinar y disfrutar de actividades al aire libre. 
            </p>
            <p>
                 La zona está rodeada de un ambiente tranquilo y seguro, ofreciendo todo lo necesario para que disfrutes de tu estancia con comodidad y sin preocupaciones.
            </p>
            <p>Plazas disponibles: <?php echo $tiendas_total_places; ?></p>
            <h1 class="text-center mb-5">¿Que ofrecemos?</h1>
            <ul>
                <li>Área segura y vigilada 24/7</li>
                <li>Cobertura 4G y 5G</li>
                <li>Zonas de picnic y recreo</li>
                <li>Mascotas permitidas</li>
                <li>A poca distancia del mar</li>
                <li>Aseos</li>
            </ul>
            <p class="reservar"><a href="login.php" class="text-decoration-none">¡Quiero reservar!</a></p>
        </div>            
        <img src="img/camping-tiendas.png" class="img-fluid img-cabecera-info img-izquierda" alt="Vista panorámica de la zona de tiendas de campaña">
    </div>
</div>