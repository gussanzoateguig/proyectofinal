<div class="container-fluid">
  <div class="panel-wrapper">
    <div class="panel">
      <div class="panel-body">

        <table class="table" data-toggle="table">
          <thead>
            <tr>
              <th class="text-center">Numero de orden</th>
              <th class="text-center">Detalle</th>
              <th class="text-center">Fecha</th>
              <th class="text-center">Estado</th>
              <th class="text-center">Sucursal</th>
              <th class="text-center">Cliente</th>

            </tr>
          </thead>
          <tbody>
            <?php

              if ( !($parametros['ordenes'] === false) ) {
                foreach ($parametros['ordenes'] as $orden) {
            ?>

            <tr>

              <td>
                <?php echo $orden->iOrden_pedido_id; ?>
              </td>
              <td>
                <button class="hidden-sm-down btn btn-success" type="button" data-toggle="tooltip" data-original-title="Ver Detalle" data-placement="bottom" onclick="verDetalleOrden('<?php echo $orden->iOrden_pedido_id; ?>')">Ver</button>
                <button class="hidden-md-up btn btn-info" type="button" data-toggle="tooltip" data-original-title="Generar Orden PDF" data-placement="bottom" onclick="generarOrdenPDF('<?php echo $orden->iOrden_pedido_id; ?>')"><i class="fa fa-search-plus"></i></button>
              </td>
              <td>
                <?php echo $orden->dtOrden_pedido_fecha; ?>
              </td>
              <td>
                <?php
                      $pendiente = "Pendiente";
                      $aceptado = "Aceptado";
                      $rechazado = "Rechazado";

                      if($orden->bOrden_pedido_estado == 0)
                      {
                          echo $pendiente;
                      }
                      else if($orden->bOrden_pedido_estado == 1)
                      {
                          echo $aceptado;
                      }
                      else if($orden->bOrden_pedido_estado == 2)
                      {
                          echo $rechazado;
                      }
                 ?>
              </td>
              <td>
                <?php echo $orden->sSucursal_nombre; ?>
              </td>
              <td>
                <?php echo $orden->sCliente_nombre; ?>
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
