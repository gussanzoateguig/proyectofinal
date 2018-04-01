<!-- Modal Eliminar Sucursal -->
<div class="modal top bottom-slide-in" id="eliminarOrden-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
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

<!-- Ver Detalle Orden -->
<div class="modal top bottom-slide-in" id="verDetalleOrden-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Detalle Pedido</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="eliminarSucursal-form">

          <table class="table" data-plugin="DataTable" >
            <thead>
              <tr>
                <th class="text-center">Nombre del Produto</th>
                <th class="text-center">Marca</th>
                <th class="text-center">Categoria</th>
                <th class="text-center">Cantidad</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Total</th>
              </tr>
            </thead>
            <tbody id="Data-Productos">

            </tbody>
          </table>

        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
