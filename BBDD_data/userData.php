<?php

include "BBDD_connection/connection.php";
if (!isset($correo)) {
    die("Error: El correo no está definido.");
}

$stmt = $conn->prepare("SELECT id_user, user_name, surname, dni, email, phone FROM users WHERE email = ?");

if (!$stmt) {
    die("Error en la consulta: " . $conn->error);
}

$stmt->bind_param("s", $correo);

$stmt->execute();

$stmt->bind_result($id_user, $name, $surname, $dni, $email, $phone);

if ($stmt->fetch()) {
    $id_user = $id_user;
    $nombre = $name;
    $apellido = $surname;
    $dni = $dni;
    $correo = $email;
    $telefono = $phone;
    $_SESSION['id_user'] = $id_user;
} else {
    die("Error: No se encontró un usuario con ese correo.");
}

// Cerramos la consulta
$stmt->close();
?>
