<!-- LARGE MODAL -->
<div id="modalmantenimiento" class="modal fade">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content ">
            <form method="POST" id="sucursal_form">
                <div class="modal-header pd-x-20">
                    <h4 class="modal-title" id="lbltitulo"></h4>
                </div>
                <div class="modal-body pd-20">
                    <input type="hidden" id="id_sucursal" name="id_sucursal">
                    <div class="form-group">
                        <label for="nombre_sucursal" class="form-label">Nombre Sucursal</label>
                        <input type="text" class="form-control" id="nombre_sucursal" name="nombre_sucursal"
                            placeholder="Ingrese Nombre" required>
                    </div>

                </div>
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="direccion_sucursal" class="form-label">Dirección Sucursal</label>
                        <input type="text" class="form-control" id="direccion_sucursal" name="direccion_sucursal"
                            placeholder="Ingrese Nombre" required>
                    </div>

                </div>
                <div class="modal-body pd-20">
                    <div class="form-group">
                        <label for="telefono_sucursal" class="form-label">Telefono Sucursal</label>
                        <input type="text" class="form-control" id="telefono_sucursal" name="telefono_sucursal"
                            placeholder="Ingrese Nombre" onkeypress="return soloNumeros(event)" maxlength="10" required>
                    </div>

                </div>
                <!-- modal-body -->
                <div class="modal-footer">
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