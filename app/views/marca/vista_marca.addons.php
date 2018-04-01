<!-- Modal Nueva Marca -->
<div class="modal top bottom-slide-in" id="nuevaMarca-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Gestionar Marca</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="nuevaMarca-form">
          <input type="hidden" name="iMarca_id">
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Nombre de Marca:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sMarca_nombre" autocomplete="off">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="button" onclick="$('#nuevaMarca-form').submit()">Continuar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Marca -->
<div class="modal top bottom-slide-in" id="eliminarMarca-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Eliminar Marca</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="eliminarMarca-form">
          <input type="hidden" name="iMarca_id">
          ¿Está seguro que desea dar de baja la ciudad <b class="sMarca_nombre"></b>?
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-danger" type="button" onclick="$('#eliminarMarca-form').submit()">Dar de baja</button>
      </div>
    </div>
  </div>
</div>
