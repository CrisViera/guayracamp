<?php

include "../BBDD_connection/conexion.php";
// Comprobamos que la variable $correo está definida antes de ejecutar la consulta
if (!isset($correo)) {
    die("Error: El correo no está definido.");
}

// Preparamos la consulta de forma segura
$stmt = $conn->prepare("SELECT nombre, apellido, dni, correo, telefono, matricula_vehiculo FROM usuarios WHERE correo = ?");

if (!$stmt) {
    die("Error en la consulta: " . $conn->error);
}

// Enlazamos el parámetro
$stmt->bind_param("s", $correo);

// Ejecutamos la consulta
$stmt->execute();

// Enlazamos los resultados
$stmt->bind_result($nombre, $apellido, $dni, $correo_usuario, $telefono, $matricula);

// Obtenemos los datos
if ($stmt->fetch()) {
    // Los datos ya están disponibles en las variables
} else {
    die("Error: No se encontró un usuario con ese correo.");
}

// Cerramos la consulta
$stmt->close();
?>
