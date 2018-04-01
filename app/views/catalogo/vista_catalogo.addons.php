<!-- Modal Nueva Stock -->
<div class="modal top bottom-slide-in" id="nuevoCatalogo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Gestionar Catalogo</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="nuevoCatalogo-form">
          <input type="hidden" name="iCatalogo_id">

          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Producto:</b></label>
              <div class="col-xs-9">
                <select class="form-control" name="iProducto_id" data-plugin="selectpicker" data-live-search="true" title="Seleccionar Ciudad">
                  <?php
                    foreach ($parametros['productos'] as $producto) {
                      print "
                      <option value=\"".$producto->iProducto_id."\">".$producto->sProducto_nombre."</option>
                      ";
                    }
                  ?>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Proveedor:</b></label>
              <div class="col-xs-9">
                <select class="form-control" name="iProveedor_id" data-plugin="selectpicker" data-live-search="true" title="Seleccionar Ciudad">
                  <?php
                    foreach ($parametros['proveedores'] as $proveedor) {
                      print "
                      <option value=\"".$proveedor->iProveedor_id."\">".$proveedor->sProveedor_nombre."</option>
                      ";
                    }
                  ?>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Precio:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="fCatalogo_precio" autocomplete="off">
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="button" onclick="$('#nuevoCatalogo-form').submit()">Continuar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Stock -->
<div class="modal top bottom-slide-in" id="eliminarCatalogo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Eliminar Catalogo</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="eliminarCatalogo-form">
          <input type="hidden" name="iCatalogo_id">
          ¿Está seguro que desea dar de baja el Catalogo?
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-danger" type="button" onclick="$('#eliminarCatalogo-form').submit()">Dar de baja</button>
      </div>
    </div>
  </div>
</div>
