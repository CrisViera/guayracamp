<?php

include "BBDD_connection/connection.php";

$stmt = $conn->prepare("
    SELECT r.id_reservation, r.id_area, a.area_name AS zona, r.enter_date, r.exit_date, r.total, r.reservation_code
    FROM reservations r
    JOIN areas a ON r.id_area = a.id_area
    WHERE r.id_user = ?
    ORDER BY r.enter_date ASC
");
if (!$stmt) {
    die("Error al preparar la consulta: " . $conn->error);
}
$stmt->bind_param("i", $_SESSION["id_user"]);
$stmt->execute();
if (!$stmt->execute()) {
    die("Error al ejecutar la consulta: " . $stmt->error . " (Código de error: " . $stmt->errno . ")");
}
$stmt->bind_result($id_reservation, $id_area, $area, $enter_date, $exit_date, $total, $reservation_code);

?>
