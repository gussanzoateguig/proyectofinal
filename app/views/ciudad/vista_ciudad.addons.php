<!-- Modal Nueva Ciudad -->
<div class="modal top bottom-slide-in" id="nuevaCiudad-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Gestionar Ciudad</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="nuevaCiudad-form">
          <input type="hidden" name="iCiudad_id">
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Nombre de Ciudad:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sCiudad_nombre" autocomplete="off">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="button" onclick="$('#nuevaCiudad-form').submit()">Continuar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Ciudad -->
<div class="modal top bottom-slide-in" id="eliminarCiudad-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Eliminar Ciudad</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="eliminarCiudad-form">
          <input type="hidden" name="iCiudad_id">
          ¿Está seguro que desea dar de baja la ciudad <b class="sCiudad_nombre"></b>?
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-danger" type="button" onclick="$('#eliminarCiudad-form').submit()">Dar de baja</button>
      </div>
    </div>
  </div>
</div>
