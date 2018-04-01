<div class="container-fluid">
  <div class="panel-wrapper">
    <div class="panel">
      <div class="panel-body">
        <div class="row-fluid text-right">
            <button type="button" class="btn btn-info font-weight-bold" onclick="nuevoProveedor()">
              Nuevo Proveedor
            </button>
        </div>
        <table class="table" data-plugin="DataTable">
          <thead>
            <tr>
              <th class="text-center">Nombre del Proveedor</th>
              <th class="text-center">Telefono</th>
              <th class="text-center">Correo</th>
              <th class="text-center">Nit</th>
              <th class="text-center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

              if ( !($parametros['proveedores'] === false) ) {
                foreach ($parametros['proveedores'] as $proveedor) {
            ?>

            <tr>
              <td>
                <?php echo $proveedor->sProveedor_nombre; ?>
              </td>
              <td>
                <?php echo $proveedor->sProveedor_telefono; ?>
              </td>
              <td>
                <?php echo $proveedor->sProveedor_correo; ?>
              </td>
              <td>
                <?php echo $proveedor->iProveedor_nit; ?>
              </td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group">
                  <button class="btn btn-warning" type="button" data-toggle="tooltip" data-original-title="Modificar Proveedor" data-placement="bottom" onclick="modificarProveedor('<?php echo $proveedor->iProveedor_id; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger" type="button" data-toggle="tooltip" data-original-title="Eliminar Proveedor" data-placement="bottom" onclick="eliminarProveedor('<?php echo $proveedor->iProveedor_id; ?>')"><i class="fa fa-trash"></i></button>
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
