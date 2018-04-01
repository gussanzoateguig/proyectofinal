<!-- Modal Nueva Stock -->
<div class="modal top bottom-slide-in" id="nuevoStock-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Gestionar Stock</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="nuevoStock-form">
          <input type="hidden" name="iStock_id">

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
            <label class="col-xs-3 form-control-label text-right"><b>Sucursal:</b></label>
              <div class="col-xs-9">
                <select class="form-control" name="iSucursal_id" data-plugin="selectpicker" data-live-search="true" title="Seleccionar Ciudad">
                  <?php
                    foreach ($parametros['sucursales'] as $sucursal) {
                      print "
                      <option value=\"".$sucursal->iSucursal_id."\">".$sucursal->sSucursal_nombre."</option>
                      ";
                    }
                  ?>
                </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>cantidad:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="iStock_cantidad" autocomplete="off">
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="button" onclick="$('#nuevoStock-form').submit()">Continuar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Stock -->
<div class="modal top bottom-slide-in" id="eliminarStock-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Eliminar Stock</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="eliminarStock-form">
          <input type="hidden" name="iStock_id">
          ¿Está seguro que desea dar de baja el stock?
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-danger" type="button" onclick="$('#eliminarStock-form').submit()">Dar de baja</button>
      </div>
    </div>
  </div>
</div>
