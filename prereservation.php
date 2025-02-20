<?php
include "BBDD_connection/connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entrada = $_POST['entrada'];
    $salida = $_POST['salida'];
    $matricula = $_POST['plate'];
    $zona = $_POST['zona'];

    // Calcula el número de noches
    $fechaEntrada = new DateTime($entrada);
    $fechaSalida = new DateTime($salida);
    $reservation_days = $fechaEntrada->diff($fechaSalida)->days;
    $formatted_enter_date = DateTime::createFromFormat('Y-m-d', $entrada)->format('d/m/Y');
    $formatted_exit_date = DateTime::createFromFormat('Y-m-d', $salida)->format('d/m/Y');

    // Obtener los precios desde la base de datos
    $query = $conn->prepare("SELECT id_area, id_place, price_per_night, water, light FROM areas WHERE area_name = ? AND busy = FALSE");
    $query->bind_param("s", $zona);
    $query->execute();
    $result = $query->get_result();
    $area = $result->fetch_assoc();

    if (!$area) {
        die("Error: No se encontró el área seleccionada.");
    }

    $id_area = $area['id_area'];
    $id_user = $_SESSION['id_user'];
    $n_place = $area['id_place'];
    $night_price = $area['price_per_night'];
    $water = $area['water'];
    $light = $area['light'];
    $area = $area['area_name'];
    $total = ($night_price * $reservation_days) + $water + $light;
}
?>