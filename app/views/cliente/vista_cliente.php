<div class="container-fluid">
  <div class="panel-wrapper">
    <div class="panel">
      <div class="panel-body">
        <div class="row-fluid text-right">
            <button type="button" class="btn btn-info font-weight-bold" onclick="nuevoCliente()">
              Nuevo Cliente
            </button>
        </div>
        <table class="table" data-plugin="DataTable">
          <thead>
            <tr>
              <th class="text-center">Nombre del Cliente</th>
              <th class="text-center">Telefono</th>
              <th class="text-center">Correo</th>
              <th class="text-center">Direccion</th>
              <th class="text-center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

              if ( !($parametros['clientes'] === false) ) {
                foreach ($parametros['clientes'] as $cliente) {
            ?>

            <tr>
              <td>
                <?php echo $cliente->sCliente_nombre; ?>
              </td>
              <td>
                <?php echo $cliente->sCliente_telefono; ?>
              </td>
              <td>
                <?php echo $cliente->sCliente_correo; ?>
              </td>
              <td>
                <?php echo $cliente->sCliente_direccion; ?>
              </td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group">
                  <button class="btn btn-warning" type="button" data-toggle="tooltip" data-original-title="Modificar Cliente" data-placement="bottom" onclick="modificarCliente('<?php echo $cliente->iCliente_id; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger" type="button" data-toggle="tooltip" data-original-title="Eliminar Cliente" data-placement="bottom" onclick="eliminarCliente('<?php echo $cliente->iCliente_id; ?>')"><i class="fa fa-trash"></i></button>
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
