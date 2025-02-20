<?php
$total = 0;
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit();
}

$correo = $_SESSION["email"];
// Incluye la obtención de datos del usuario y reservas
include "BBDD_data/userData.php";
include "BBDD_data/reservationData.php";
?>
<div class="contenido">
    <div class="container mt-5">
        <h2 class="mb-4 text-center"></h2>

        <div class="row">
            <!-- Datos del Usuario -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        Datos del Usuario
                        
                    </div>
                    <div class="card-body">
                        <p><strong>Nombre: </strong><?=$nombre; ?></p>
                        <p><strong>Apellido: </strong><?=$apellido; ?></p>
                        <p><strong>Correo: </strong><?=$correo; ?></p>
                        <p><strong>Dni: </strong><?=$dni; ?></p>
                        <p><strong>Teléfono: </strong><?=$telefono; ?></p>
                        <!--
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUsuario">
                            Modificar datos
                        </button>
                        
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalContraseña">
                            Modificar contraseña
                        </button>
                        -->
                        <a href="logout.php">
                        <button class="btn btn-primary">
                            Salir
                        </button>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Reservas -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        Mis Reservas
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Área</th>
                                    <th>Número de plaza</th>
                                    <th>Desde</th>
                                    <th>Hasta</th>
                                    <th>Total</th>
                                    <th>Código de reserva</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tablaReservas">
                            <?php 
                            while ($stmt->fetch()): 
                                $formatted_enter_date = DateTime::createFromFormat('Y-m-d', $enter_date)->format('d/m/Y');
                                $formatted_exit_date = DateTime::createFromFormat('Y-m-d', $exit_date)->format('d/m/Y');
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($area); ?></td>
                                    <td><?php echo htmlspecialchars($id_area); ?></td>
                                    <td><?php echo htmlspecialchars($formatted_enter_date); ?></td>
                                    <td><?php echo htmlspecialchars($formatted_exit_date); ?></td>
                                    <td><?php echo htmlspecialchars($total); ?> €</td>
                                    <td><?php echo htmlspecialchars($reservation_code); ?></td>
                                    <td>
                                        <form method="POST" action="deleteReservation.php" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reserva?');">
                                            <input type="hidden" name="id_reserva" value="<?php echo htmlspecialchars($id_reservation); ?>">
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; 
                            $stmt->close();
                            ?>
                            </tbody>
                        </table>
                    </div>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReserva">Nueva Reserva</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Usuario 
    <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="modalUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUsuarioLabel">Editar Datos del Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form id="formUsuario" method="POST" action="updateUser.php">
                        <div class="mb-3">
                            <label for="nombreUsuario" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" id="nombreUsuario" name="nombre" value="<?=$nombre; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="apellidoUsuario" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" id="apellidoUsuario" name="apellido" value="<?=$apellido; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="correoUsuario" class="form-label">Correo:</label>
                            <input type="email" class="form-control" id="correoUsuario" name="correo" value="<?=$correo; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="telefonoUsuario" class="form-label">Teléfono:</label>
                            <input type="text" class="form-control" id="telefonoUsuario" name="telefono" value="<?=$telefono; ?>">
                        </div>
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>-->

    <!-- Modal para modificar la contraseña -->
    <div class="modal fade" id="modalContraseña" tabindex="-1" aria-labelledby="modalContraseñaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalContraseñaLabel">Modificar contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <form id="formUsuario" method="POST" action="updatePassword.php">
                        <div class="mb-3">
                            <label for="passwordUsuario" class="form-label">Contraseña actual:</label>
                            <input type="password" class="form-control" id="passwordUsuario" name="passwordUsuario">
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Nueva contraseña:</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirmar contraseña:</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                        </div>
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Nueva Reserva -->
    <div class="modal fade" id="modalReserva" tabindex="-1" aria-labelledby="modalReservaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReservaLabel">Hacer una Reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                <form id="formReserva" action="reservation.php" method="POST">
                    <div class="mb-3">
                        <label for="entrada" class="form-label">Fecha de Entrada:</label>
                        <input type="date" class="form-control" name="entrada" id="entrada" required>
                    </div>
                    <div class="mb-3">
                        <label for="salida" class="form-label">Fecha de Salida:</label>
                        <input type="date" class="form-control" name="salida" id="salida" required>
                    </div>
                    <div class="mb-3">
                        <label for="zona" class="form-label">Tipo de reserva:</label>
                        <select class="form-control" name="zona" id="zona" required>
                            <option value="Autocaravanas">Autocaravanas</option>
                            <option value="Campers">Campers</option>
                            <option value="Tiendas">Tiendas de Campaña</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Calcular Precio</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
