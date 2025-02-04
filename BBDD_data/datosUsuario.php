<?php
// Preparamos la consulta
$stmt = $conn->prepare("SELECT nombre, apellido, dni, correo, telefono, matricula_vehiculo FROM usuarios WHERE correo = $correo");
// Enlazamos los parámetros
$stmt->bind_param("s", $email);
// Ejecutamos la consulta
$stmt->execute();
// Almacenamos el resultado
$stmt->store_result();
$stmt->fetch();
// Almacenamos los resultados
$stmt->bind_result($nombre, $apellido, $dni, $correo, $telefono, $matricula);
?>