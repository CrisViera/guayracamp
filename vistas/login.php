<div class="contenido_form">
    
    <?php if (!empty($error)) echo "<p>$error</p>"; ?>
    <div class="formLogin">
        <form method="POST">
        <h1 class="text-center mb-5 text-white">Área personal</h1>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <?php if (!empty($errorCorreo)) echo "<p class='text-danger'>Este usuario no existe</p>"; ?>
            <input type="password" name="password" placeholder="Contraseña" required>
            <?php if (!empty($errorPass)) echo "<p class='text-danger'>La contraseña es errónea</p>"; ?>
            <button type="submit">Acceder</button>
            <p><a href="register.php">¿No tienes cuenta? Regístrate aquí</a></p>
        </form>
    </div>
    
</div>