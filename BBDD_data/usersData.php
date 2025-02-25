<?php

include "BBDD_connection/connection.php";
$stmt = $conn->prepare("
    SELECT id_user, user_name, surname, dni, email, phone 
    FROM users 
");

if (!$stmt) {
    die("Error al preparar la consulta: " . $conn->error);
}

$stmt->execute();
if (!$stmt->execute()) {
    die("Error al ejecutar la consulta: " . $stmt->error . " (Código de error: " . $stmt->errno . ")");
}

$result = $stmt->get_result();
$users = []; // Array para almacenar las reservas

while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

$stmt->close();
$conn->close();

?>