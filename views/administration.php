<?php
session_start();
$correo = $_SESSION["email"];
include "BBDD_data/reservationsData.php";
include "BBDD_data/usersData.php";
include "BBDD_data/placesData.php";
include "includes/errorAdministrationMessages.php";
?>
<div class="contenido">
<h2 class="text-center mb-4">Panel de Administración</h2>
    <div class="administration">
    <div class="row ">
        <!-- Card: Lista de Usuarios -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Usuarios</h5>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Dni</th>
                                <th>Teléfono</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            // Obviar resultados si el correo es "admin@guayracamp.es"
                            if (empty($users)) {
                                echo "<tr><td colspan='6'>No hay usuarios registrados.</td></tr>";
                            } else {
                                foreach ($users as $user) {
                                    // Omitir al usuario admin
                                    if ($user['email'] === 'admin@guayracamp.es') {
                                        continue;
                                    }
                            
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($user['id_user']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['user_name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['surname']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['dni']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['phone']) . "</td>";
                                    echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                                    echo "<td>
                                        <form method='POST' action='deleteUser.php' onsubmit='return confirm(\'¿Estás seguro de que deseas eliminar este usuario?\');'>
                                            <input type='hidden' name='id_user' value='". htmlspecialchars($user['id_user']) ."'>
                                            <button type='submit' class='btn btn-danger'>Eliminar</button>
                                        </form>
                                    </td>";
                                    echo "</tr>";
                                }
                            }
                            
                            ?>
                        </tbody>
                    </table>
                    <?php if (!empty($error)) echo "<p class='text-danger'>$error</p>"; ?>
                </div>
                    <a href="logout.php">
                        <button class="btn btn-primary">
                            Salir
                        </button>
                        </a>
                </div>
            </div>
        </div>

        <!-- Lista de Reservas -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Reservas</h5>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Dni</th>
                                <th>Zona</th>
                                <th>Plaza</th>
                                <th>Entrada</th>
                                <th>Salida</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                           if (!empty($reservations)) {
                            foreach ($reservations as $reserva) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($reserva['id_reservation']) . "</td>";
                                echo "<td>" . htmlspecialchars($reserva['nombre']) . "</td>";
                                echo "<td>" . htmlspecialchars($reserva['apellidos']) . "</td>";
                                echo "<td>" . htmlspecialchars($reserva['dni']) . "</td>";
                                echo "<td>" . htmlspecialchars($reserva['zona']) . "</td>";
                                echo "<td>" . htmlspecialchars($reserva['plaza']) . "</td>";
                                echo "<td>" . htmlspecialchars($reserva['entrada']) . "</td>";
                                echo "<td>" . htmlspecialchars($reserva['salida']) . "</td>";
                                echo "<td>" . htmlspecialchars($reserva['total']) . " €</td>";
                                echo "<td>
                                        <form method='POST' action='deleteReservation.php' onsubmit='return confirm(\'¿Estás seguro de que deseas eliminar esta reserva?\');'>
                                            <input type='hidden' name='id_reserva' value='". htmlspecialchars($reserva['id_reservation']) ."'>
                                            <button type='submit' class='btn btn-danger'>Eliminar</button>
                                        </form>
                                    </td>";
                                echo "</tr>";
                            }

                        } else {
                            echo "<tr><td colspan='9'>No hay reservas registradas.</td></tr>";
                        }
                            ?>
                        </tbody>
                    </table>
                    <?php if (!empty($error)) echo "<p class='text-danger'>$error</p>"; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card: Plazas Disponibles -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Plazas Disponibles</h5>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Área</th>
                                <th>Plazas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                           if (!empty($areas)) {
                            foreach ($areas as $area) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($area['zona']) . "</td>";
                                echo "<td>" . htmlspecialchars($area['plazas_disponibles']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2'>No hay plazas disponibles.</td></tr>";
                        }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        

    </div>
    </div>
</div>