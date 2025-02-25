<?php

include "BBDD_connection/connection.php";
$stmt = $conn->prepare("
    SELECT 
        r.id_reservation AS id_reservation, 
        u.user_name AS nombre, 
        u.surname AS apellidos, 
        u.dni, 
        a.area_name AS zona, 
        a.id_place AS plaza, 
        r.enter_date AS entrada, 
        r.exit_date AS salida, 
        r.total
        FROM reservations r
        JOIN users u ON r.id_user = u.id_user
        JOIN areas a ON r.id_area = a.id_area
        ORDER BY r.enter_date ASC
");

if (!$stmt) {
    die("Error al preparar la consulta: " . $conn->error);
}

$stmt->execute();
if (!$stmt->execute()) {
    die("Error al ejecutar la consulta: " . $stmt->error . " (Código de error: " . $stmt->errno . ")");
}

$result = $stmt->get_result();
$reservations = []; // Array para almacenar las reservas

while ($row = $result->fetch_assoc()) {
    $reservations[] = $row;
}

$stmt->close();
$conn->close();

?>