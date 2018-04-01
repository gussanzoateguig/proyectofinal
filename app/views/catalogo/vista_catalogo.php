<div class="container-fluid">
  <div class="panel-wrapper">
    <div class="panel">
      <div class="panel-body">
        <div class="row-fluid text-right">
            <button type="button" class="btn btn-info font-weight-bold" onclick="nuevoCatalogo()">
              Nuevo Catalogo
            </button>
        </div>
        <table class="table" data-plugin="DataTable">
          <thead>
            <tr>
              <th class="text-center">Nombre de Producto</th>
              <th class="text-center">Nombre de Proveedor</th>
              <th class="text-center">Precio</th>
              <th class="text-center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

              if ( !($parametros['catalogos'] === false) ) {
                foreach ($parametros['catalogos'] as $catalogo) {
            ?>

            <tr>
              <td>
                <?php echo $catalogo->sProducto_nombre; ?>
              </td>
              <td>
                <?php echo $catalogo->sProveedor_nombre; ?>
              </td>
              <td>
                <?php echo $catalogo->fCatalogo_precio; ?>
              </td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group">
                  <button class="btn btn-warning" type="button" data-toggle="tooltip" data-original-title="Modificar Catalogo" data-placement="bottom" onclick="modificarCatalogo('<?php echo $catalogo->iCatalogo_id; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger" type="button" data-toggle="tooltip" data-original-title="Eliminar Catalogo" data-placement="bottom" onclick="eliminarCatalogo('<?php echo $catalogo->iCatalogo_id; ?>')"><i class="fa fa-trash"></i></button>
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
