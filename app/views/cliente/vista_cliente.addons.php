<!-- Modal Nuevo cliente -->
<div class="modal top bottom-slide-in" id="nuevoCliente-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Gestionar Cliente</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="nuevoCliente-form">
          <input type="hidden" name="iCliente_id">
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Nombre del Cliente:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sCliente_nombre" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Direccion:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sCliente_direccion" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Telefono:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sCliente_telefono" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Correo:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sCliente_correo" autocomplete="off">
            </div>
          </div>



        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="button" onclick="$('#nuevoCliente-form').submit()">Continuar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Cliente -->
<div class="modal top bottom-slide-in" id="eliminarCliente-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Eliminar Cliente</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="eliminarCliente-form">
          <input type="hidden" name="iCliente_id">
          ¿Está seguro que desea dar de baja al cliente <b class="sCliente_nombre"></b>?
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-danger" type="button" onclick="$('#eliminarCliente-form').submit()">Dar de baja</button>
      </div>
    </div>
  </div>
</div>
