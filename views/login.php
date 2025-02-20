<?php
include "includes/errorLoginMessages.php";

if(isset($_GET["codError"])) {
    $codError = (int) $_GET["codError"];
    if(isset($MensajesError[$codError])) {
        $error = $MensajesError[$codError];
    } else {
        $error = "Error desconocido.";
    }
}
?>
<div class="contenido_form">
    
    <div class="formLogin">
        <form method="POST" action="loginProcess.php">
        <h1 class="text-center mb-5 text-white">Área personal</h1>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <?php if (!empty($error)) echo "<p class='text-danger'>$error</p>"; ?>
            <button type="submit">Acceder</button>
            <p><a href="signIn.php">¿No tienes cuenta? Regístrate aquí</a></p>
        </form>
    </div>
    
</div>