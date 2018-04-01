<!-- Modal Nueva Sucursal -->
<div class="modal top bottom-slide-in" id="nuevaSucursal-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Gestionar Sucursal</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="nuevaSucursal-form">
          <input type="hidden" name="iSucursal_id">
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Nombre de Sucursal:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sSucursal_nombre" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Direccion:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sSucursal_direccion" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Telefono:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sSucursal_telefono" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Ciudad:</b></label>
              <div class="col-xs-9">
                <select class="form-control" name="iCiudad_id" data-plugin="selectpicker" data-live-search="true" title="Seleccionar Ciudad">
                  <?php
                    foreach ($parametros['ciudades'] as $ciudad) {
                      print "
                      <option value=\"".$ciudad->iCiudad_id."\">".$ciudad->sCiudad_nombre."</option>
                      ";
                    }
                  ?>
                </select>
            </div>
          </div>



        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="button" onclick="$('#nuevaSucursal-form').submit()">Continuar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Sucursal -->
<div class="modal top bottom-slide-in" id="eliminarSucursal-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Eliminar Sucursal</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="eliminarSucursal-form">
          <input type="hidden" name="iSucursal_id">
          ¿Está seguro que desea dar de baja la sucursal <b class="sSucursal_nombre"></b>?
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-danger" type="button" onclick="$('#eliminarSucursal-form').submit()">Dar de baja</button>
      </div>
    </div>
  </div>
</div>
