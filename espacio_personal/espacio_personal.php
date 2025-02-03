<?php
session_start();

if (!isset($_SESSION["correo"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Área personal</title>
</head>
<body>
    <h2>Bienvenido Pepe</h2>
    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
