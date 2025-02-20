<?php
include 'BBDD_data/campers_total_places.php';
?>
<div class="contenido">
            
    <div class="cabecera-info">
        <div>
            <h1 class="text-center mb-5">Zona de Campers</h1>
            <p>
                Bienvenido a la zona de furgonetas camperizadas, un espacio especialmente diseñado para viajeros que buscan comodidad y funcionalidad en un entorno acogedor.
                Aquí encontrarás parcelas amplias y prácticas, adaptadas para el fácil estacionamiento de tu camper. 
                La zona dispone de acceso a puntos de electricidad y agua, así como áreas de vaciado para aguas grises y baños. 
                Cada plaza está rodeada de setos y una ubicación estratégica cercana a senderos, playa y puntos de interés. Tanto si buscas una parada corta como un lugar para disfrutar de varios días, te garantizamos una experiencia cómoda y agradable.
            </p>

            <p>
                Disponemos de 15 plazas equipadas con acceso a agua y luz para garantizar una estancia cómoda y segura.
            </p>
            <p>Plazas disponibles: <?php echo $campers_total_places; ?></p>
            <h1 class="text-center mb-5">¿Que ofrecemos?</h1>
            <ul>
                <li>Área segura y vigilada 24/7</li>
                <li>Cobertura 4G y 5G</li>
                <li>Zonas de picnic y recreo</li>
                <li>Mascotas permitidas</li>
                <li>A poca distancia del mar</li>
                <li>Vaciado de aguas grises</li>
            </ul>
            <p class="reservar"><a href="login.php" class="text-decoration-none">¡Quiero reservar!</a></p>
        </div>              
        <img src="img/zona_camper.jpeg" class="img-fluid img-cabecera-info img-izquierda" alt="Ilustración de una furgoneta camperizada en un entorno natural">
    </div>
</div>