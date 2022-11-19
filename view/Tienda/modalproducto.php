<!-- LARGE MODAL -->
<div id="modalproducto" class="modal fade">
    <div class="modal-dialog modal-lg " role="document">
        <div class="modal-content ">
            <form method="POST" id="catalogo_form">
                <div class="modal-header pd-x-20">
                    <h4 class="modal-title" id="lbltitulo"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">

                    <div class="row">
                        <div class="col-md-6">

                            <div class="col-12 align-content-center">
                                <img class="img-fluid" id="imagenCatalogo">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h3 class="my-3" id="nombre_producto"></h3>
                            <p id="descripcion_producto"></p>

                            <hr>


                            <h4 class="mt-3">Stock <small>Unidades Disponibles</small></h4>
                            <div class="btn-group">
                                <label class="btn btn-default text-center">
                                    <span class="text-xl" id="stock"></span>
                                </label>

                            </div>

                            <div class="bg-gray py-2 px-3 mt-4">
                                <h2 class="mb-0" id="precio"> $
                                </h2>
                            </div>

                            <div class="mt-4">
                                <div class="row">
                                    <div class=" col-6 form-group">
                                        <input type="hidden" id="id_producto" name="id_producto">
                                        <input type="hidden" id="input_precio" name="input_precio">
                                        <input type="hidden" id="input_nombre_prod" name="input_nombre_prod">
                                        <input type="hidden" id="input_descripcion" name="input_descripcion">
                                        <input type="hidden" id="input_stock" name="input_stock">

                                        <label for="cantidad" class="form-label">Cantidad</label>
                                        <input type="number" class="form-control" id="cantidad" name="cantidad" min="1"
                                            required>
                                    </div>
                                    <div class="col-6  d-flex">
                                        <button type="submit" class="btn btn-success " name="action" id="#" value="add">
                                            <i class="fas fa-cart-plus  mr-2"></i>
                                            Agregar
                                        </button>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>


                </div>
                <!-- modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- modal-dialog -->
</div>
<!-- modal -->