<div class="container-fluid">
  <div class="panel-wrapper">
    <div class="panel">
      <div class="panel-body">
        <div class="row-fluid text-right">
            <button type="button" class="btn btn-info font-weight-bold" onclick="nuevoStock()">
              Nuevo Stock
            </button>
        </div>
        <table class="table" data-plugin="DataTable">
          <thead>
            <tr>
              <th class="text-center">Nombre de Producto</th>
              <th class="text-center">Nombre de Sucursal</th>
              <th class="text-center">Cantidad</th>
              <th class="text-center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

              if ( !($parametros['stocks'] === false) ) {
                foreach ($parametros['stocks'] as $stock) {
            ?>

            <tr>
              <td>
                <?php echo $stock->sProducto_nombre; ?>
              </td>
              <td>
                <?php echo $stock->sSucursal_nombre; ?>
              </td>
              <td>
                <?php echo $stock->iStock_cantidad; ?>
              </td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group">
                  <button class="btn btn-warning" type="button" data-toggle="tooltip" data-original-title="Modificar Stock" data-placement="bottom" onclick="modificarStock('<?php echo $stock->iStock_id; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger" type="button" data-toggle="tooltip" data-original-title="Eliminar Stock" data-placement="bottom" onclick="eliminarStock('<?php echo $stock->iStock_id; ?>')"><i class="fa fa-trash"></i></button>
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
