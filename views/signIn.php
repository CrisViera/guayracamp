
<?php
include "includes/errorSignInMessages.php";

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
                <div class="form_Registro">
                <form method="POST" action="signInProcess.php">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" required>
            <?php if(!empty($error) && $codError == 1) echo "<p class='text-danger'>$error</p>"?>
        </div>

        <div class="col-md-6 mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" class="form-control" id="apellido" required>
            <?php if(!empty($error) && $codError == 2) echo "<p class='text-danger'>$error</p>"?>
        </div>

        <div class="col-md-6 mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" name="dni" class="form-control" id="dni" pattern="\d{8}[A-Za-z]" required placeholder="Ej: 12345678A">
            <?php if(!empty($error) && $codError == 3) echo "<p class='text-danger'>$error</p>"?>
            <?php if(!empty($error) && $codError == 7) echo "<p class='text-danger'>$error</p>"?>
        </div>

        <div class="col-md-6 mb-3">
            <label for="correo" class="form-label">Correo Electrónico</label>
            <input type="email" name="correo" class="form-control" id="correo" required>
            <?php if(!empty($error) && $codError == 4) echo "<p class='text-danger'>$error</p>"?>
        </div>

        <div class="col-md-6 mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" id="password" required minlength="6">
            <?php if(!empty($error) && $codError == 5) echo "<p class='text-danger'>$error</p>"?>
        </div>

        <div class="col-md-6 mb-3">
            <label for="Confirmpassword" class="form-label">Repetir contraseña</label>
            <input type="password" name="Confirmpassword" class="form-control" id="Confirmpassword" required minlength="6">
            <?php if(!empty($error) && $codError == 8) echo "<p class='text-danger'>$error</p>"?>
        </div>

        <div class="col-md-6 mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="tel" name="telefono" class="form-control" id="telefono" pattern="[0-9]{9}" required placeholder="Ej: 612345678">
            <?php if(!empty($error) && $codError == 6) echo "<p class='text-danger'>$error</p>"?>
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100">Registrarse</button>
    <p class="text-center mt-3"><a href="login.php">¿Ya tienes cuenta? Inicia sesión aquí</a></p>
</form>

                    
                </div>
            </div>