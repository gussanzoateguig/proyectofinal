<div class="container-fluid">
  <div class="panel-wrapper">
    <div class="panel">
      <div class="panel-body">
        <div class="row-fluid text-right">
            <button type="button" class="btn btn-info font-weight-bold" onclick="nuevaSucursal()">
              Nueva Sucursal
            </button>
        </div>
        <table class="table" data-plugin="DataTable">
          <thead>
            <tr>
              <th class="text-center">Nombre de Sucursal</th>
              <th class="text-center">Direccion</th>
              <th class="text-center">Telefono</th>
              <th class="text-center">Ciudad</th>
              <th class="text-center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              
              if ( !($parametros['sucursales'] === false) ) {
                foreach ($parametros['sucursales'] as $sucursal) {
            ?>

            <tr>
              <td>
                <?php echo $sucursal->sSucursal_nombre; ?>
              </td>
              <td>
                <?php echo $sucursal->sSucursal_direccion; ?>
              </td>
              <td>
                <?php echo $sucursal->sSucursal_telefono; ?>
              </td>
              <td>
                <?php echo $sucursal->sCiudad_nombre; ?>
              </td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group">
                  <button class="btn btn-warning" type="button" data-toggle="tooltip" data-original-title="Modificar Sucursal" data-placement="bottom" onclick="modificarSucursal('<?php echo $sucursal->iSucursal_id; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger" type="button" data-toggle="tooltip" data-original-title="Eliminar Sucursal" data-placement="bottom" onclick="eliminarSucursal('<?php echo $sucursal->iSucursal_id; ?>')"><i class="fa fa-trash"></i></button>
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
