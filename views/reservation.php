<?php
include "prereservation.php";
?>
<div class="contenido_form">
<div class="form_Registro">
        <div class="container mt-5">
            <form action="reservationProcess.php" method="POST">
            <h2 class="text-center py-4">Confirmar Reserva</h2>
            <p><strong>Fecha de Entrada:</strong> <?php echo $formatted_enter_date; ?></p>
            <p><strong>Fecha de Salida:</strong> <?php echo $formatted_exit_date; ?></p>
            <p><strong>Tipo de Reserva:</strong> <?php echo $zona; ?></p>
            <p><strong>Número de plaza:</strong> <?php echo $n_place; ?></p>
            <p><strong>Número de noches:</strong> <?php echo $reservation_days; ?></p>
            <p><strong>Precio por Noche:</strong> <?php echo $night_price; ?> €</p>
            <p><strong>Agua:</strong> <?php echo $water; ?> €</p>
            <p><strong>Luz:</strong> <?php echo $light; ?> €</p>
            <p><strong>Total:</strong> <?php echo $total; ?> €</p>
                <input type="hidden" name="entrada" value="<?php echo $entrada; ?>">
                <input type="hidden" name="salida" value="<?php echo $salida; ?>">
                <input type="hidden" name="zona" value="<?php echo $zona; ?>">
                <input type="hidden" name="n_place" value="<?php echo $n_place; ?>">
                <input type="hidden" name="id_area" value="<?php echo $id_area; ?>">
                <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <button type="submit" class="btn btn-success">Confirmar Reserva</button>
                <a href="personal_space.php"><button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">Cancelar</button></a>
            </form>
            
        </div>
    </div>
</div>
