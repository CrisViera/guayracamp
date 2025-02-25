<?php

include "BBDD_connection/connection.php";
$stmt = $conn->prepare("
    SELECT 
    area_name AS zona,
    COUNT(*) AS plazas_disponibles
    FROM areas
    WHERE busy = 0
    GROUP BY area_name
    ORDER BY area_name;
");

if (!$stmt) {
    die("Error al preparar la consulta: " . $conn->error);
}

if (!$stmt->execute()) {
    die("Error al ejecutar la consulta: " . $stmt->error . " (Código de error: " . $stmt->errno . ")");
}

$result = $stmt->get_result();
$areas = []; // Array para almacenar las areas disponibles

while ($row = $result->fetch_assoc()) {
    $areas[] = $row;
}

$stmt->close();
$conn->close();

?>