<!-- LARGE MODAL -->
<div id="modalmantenimiento" class="modal fade">
    <div class="modal-dialog modal-md " role="document">
        <div class="modal-content ">
            <form method="POST" id="usuario_form">
                <div class="modal-header pd-x-20">
                    <h4 class="modal-title" id="mdltitulo"></h4>
                </div>
                <div class="modal-body pd-20">
                    <input type="hidden" id="id_usuario" name="id_usuario">
                    <div class="form-group">
                        <label for="id_perfil" class="form-label">Perfil</label>
                        <select class="form-control select2" name="id_perfil" id="id_perfil"
                            data-placeholder="Seleccione" style="width: 100%;"></select>
                    </div>
                    <div class="form-group">
                        <label for="usuario" class="form-label">Usuario</label>
                        <input type="text" class="form-control" id="usuario" name="usuario"
                            placeholder="Ingrese Usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="clave" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="clave" name="clave" placeholder="Ingrese Clave"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="cedula" class="form-label">Cedula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Ingrese Cedula"
                            maxlength="10" onkeypress="return soloNumeros(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres"
                            placeholder="Ingrese Nombres" required>
                    </div>
                    <div class="form-group">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos"
                            placeholder="Ingrese Apellidos" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion"
                            placeholder="Ingrese Dirección" required>
                    </div>
                    <div class="form-group">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese Correo"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono"
                            placeholder="Ingrese Teléfono" maxlength="10" onkeypress="return soloNumeros(event)"
                            required>
                    </div>
                </div>
                <!-- modal-body -->
                <div class=" modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add"
                        class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- modal-dialog -->
</div>
<!-- modal -->
<script src="../../public/js/funcionesForm.js"></script>