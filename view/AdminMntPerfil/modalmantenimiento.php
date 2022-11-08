<!-- LARGE MODAL -->
<div id="modalmantenimiento" class="modal fade">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content ">
            <form method="POST" id="perfil_form">
                <div class="modal-header pd-x-20">
                    <h4 class="modal-title" id="mdltitulo"></h4>
                </div>
                <div class="modal-body pd-20">
                    <input type="hidden" id="id_perfil" name="id_perfil">
                    <div class="form-group">
                        <label for="nombre_perfil" class="form-label">Nombre Perfil</label>
                        <input type="text" class="form-control" id="nombre_perfil" name="nombre_perfil"
                            placeholder="Ingrese Nombre" required>
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