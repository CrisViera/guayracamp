<?php
include 'BBDD_connection/conexion.php';
$consulta = "SELECT COUNT(*) AS total_plazas FROM plazas WHERE identificador_zona LIKE 'A%' AND ocupada = 0";
$total = mysqli_query($conn, $consulta);
$total_plazas_autocaravanas = 0;
if ($total) {
    $fila = $total->fetch_assoc();
    $total_plazas_autocaravanas = $fila['total_plazas'];
}
?>