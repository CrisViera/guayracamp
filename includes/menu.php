<?php
session_start();

?>
<nav class="navbar navbar-expand-lg navbar-dark menu-logo-login">
    <div class="container-fluid">
    <a class="navbar-brand text-decoration-none" href="index.php">
        <div class="logo_img">
            <div class="logo">
                <img src="img/logo.png" alt="logo" class="logo">
            </div>
        
            <div class="titulo">
                <p class="titulo-nav">GuayraCamp</p>
                <p class="titulo_descripcion">Eco-Experience</p>
            </div> 
        </div>
    </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav menu">
                <a class="nav-link lista-menu" aria-current="page" href="autocaravanas.php">Autocaravanas</a>
                <a class="nav-link lista-menu" aria-current="page" href="campers.php">Campers</a>
                <a class="nav-link lista-menu" aria-current="page" href="tiendas.php">Tiendas</a>
                <a class='nav-link lista-menu' aria-current="page" href='login.php'd>Área personal</a>
                 
            </div>
        </div>
    </div>
</nav>