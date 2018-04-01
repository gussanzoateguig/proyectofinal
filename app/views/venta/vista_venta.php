<div class="container-fluid">
  <div class="panel-wrapper">
    <div class="panel">
      <div class="panel-body">
        <div class="row-fluid text-right">
            <button type="button" class="btn btn-info font-weight-bold" onclick="nuevaSucursal()">
              Nueva Venta
            </button>
        </div>
        <table class="table" data-plugin="DataTable">
          <thead>
            <tr>
              <th class="text-center">Detalle</th>
              <th class="text-center">Fecha</th>
              <th class="text-center">Pais</th>
              <th class="text-center">Ciudad</th>
              <th class="text-center">Direccion</th>
              <th class="text-center">Codigo Postal</th>
              <th class="text-center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

              if ( !($parametros['ventas'] === false) ) {
                foreach ($parametros['ventas'] as $venta) {
            ?>

            <tr>
              <td>
                <button class="hidden-sm-down btn btn-success" type="button" data-toggle="tooltip" data-original-title="Ver Detalle" data-placement="bottom" onclick="verDetalleOrden('<?php echo $venta->iOrden_pedido_id; ?>,<?php echo $venta->iCliente_id; ?>')">Ver</button>
                <button class="hidden-md-up btn btn-info" type="button" data-toggle="tooltip" data-original-title="Generar Orden PDF" data-placement="bottom" onclick="generarOrdenPDF('<?php echo $venta->iOrden_pedido_id; ?>')"><i class="fa fa-search-plus"></i></button>
              </td>
              <td>
                <?php echo $venta->dtVenta_fecha; ?>
              </td>
              <td>
                <?php echo $venta->sPais_nombre; ?>
              </td>
              <td>
                <?php echo $venta->sVenta_ciudad; ?>
              </td>
              <td>
                <?php echo $venta->sVenta_direccion; ?>
              </td>
              <td>
                <?php echo $venta->iVenta_codigo_postal; ?>
              </td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group">
                  <button class="btn btn-warning" type="button" data-toggle="tooltip" data-original-title="Modificar Venta" data-placement="bottom" onclick="modificarVenta('<?php echo $venta->iVenta_id; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger" type="button" data-toggle="tooltip" data-original-title="Eliminar Venta" data-placement="bottom" onclick="eliminarVenta('<?php echo $venta->iVenta_id; ?>')"><i class="fa fa-trash"></i></button>
                </div>
              </td>
            </tr>

            <?php
                }
              }

            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
