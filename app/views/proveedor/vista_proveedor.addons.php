<!-- Modal Nuevo PROVEEDOR -->
<div class="modal top bottom-slide-in" id="nuevoProveedor-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Gestionar Proveedor</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="nuevoProveedor-form">
          <input type="hidden" name="iProveedor_id">
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Nombre del Proveedor:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sProveedor_nombre" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Telefono:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sProveedor_telefono" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Correo:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sProveedor_correo" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Nit:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="iProveedor_nit" autocomplete="off">
            </div>
          </div>



        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="button" onclick="$('#nuevoProveedor-form').submit()">Continuar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Proveedor -->
<div class="modal top bottom-slide-in" id="eliminarProveedor-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Eliminar Proveedor</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="eliminarProveedor-form">
          <input type="hidden" name="iProveedor_id">
          ¿Está seguro que desea dar de baja al proveedor <b class="sProveedor_nombre"></b>?
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-danger" type="button" onclick="$('#eliminarProveedor-form').submit()">Dar de baja</button>
      </div>
    </div>
  </div>
</div>
