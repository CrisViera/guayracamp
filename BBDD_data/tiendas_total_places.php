<?php
include 'BBDD_connection/connection.php';
$query = "SELECT COUNT(*) AS total_places FROM areas WHERE area_name LIKE 'Tiendas' AND busy = FALSE";
$total = mysqli_query($conn, $query);
$tiendas_total_places = 0;
if ($total) {
    $fill = $total->fetch_assoc();
    $tiendas_total_places = $fill['total_places'];
}
?>