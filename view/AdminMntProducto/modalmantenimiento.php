<!-- LARGE MODAL -->
<div id="modalmantenimiento" class="modal fade">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content ">

            <!-- Nombre Formulario -->
            <form method="POST" id="producto_form">

                <div class="modal-header pd-x-20">
                    <h4 class="modal-title" id="mdltitulo"></h4>
                </div>
                <div class="modal-body pd-20">
                    <input type="hidden" id="id_producto" name="id_producto">
                    <div class="form-group">
                        <label for="id_categoria" class="form-label">Categoria</label>
                        <select class="form-control select2" name="id_categoria" id="id_categoria"
                            data-placeholder="Seleccione" style="width: 100%;"></select>
                    </div>
                    <div class="form-group">
                        <label for="nombre_prod" class="form-label">Nombre Producto</label>
                        <input type="text" class="form-control" id="nombre_prod" name="nombre_prod"
                            placeholder="Ingrese Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion_prod" class="form-label">Descripción </label>
                        <input type="text" class="form-control" id="descripcion_prod" name="descripcion_prod"
                            placeholder="Ingrese Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" class="form-control" id="precio" name="precio" placeholder="Ingrese Nombre"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" class="form-control" id="stock" name="stock" placeholder="Ingrese Nombre"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_categoria" class="form-label">Nombre Categoria</label>
                        <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria"
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