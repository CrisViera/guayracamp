
<div class="contenido_form">
                <div class="form_Registro">
                    <form method="POST" action="procesar_registro.php">
                    <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Apellido</label>
                                <input type="text" name="apellido" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">DNI</label>
                                <input type="text" name="dni" class="form-control" pattern="\d{8}[A-Za-z]" required placeholder="Ej: 12345678A">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Correo Electrónico</label>
                                <input type="email" name="correo" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contraseña</label>
                                <input type="password" name="password" class="form-control" required minlength="6">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Teléfono</label>
                                <input type="tel" name="telefono" class="form-control" pattern="[0-9]{9}" required placeholder="Ej: 612345678">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Matrícula del Vehículo (Opcional)</label>
                                <input type="text" name="matricula" class="form-control" pattern="[0-9]{4}[A-Z]{3}" placeholder="Ej: 1234ABC">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                        <p class="text-center mt-3"><a href="login.php">¿Ya tienes cuenta? Inicia sesión aquí</a></p>
                    </form>

                    
                </div>
            </div>