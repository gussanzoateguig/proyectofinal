<div class="container-fluid">
  <div class="panel-wrapper">
    <div class="panel">
      <div class="panel-body">
        <div class="row-fluid text-right">
            <button type="button" class="btn btn-info font-weight-bold" onclick="nuevoPais()">
              Nuevo Pais
            </button>
        </div>
        <table class="table" data-plugin="DataTable">
          <thead>
            <tr>
              <th class="text-center">Nombre del Pais</th>
              <th class="text-center">Codigo Postal</th>
              <th class="text-center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

              if ( !($parametros['paises'] === false) ) {
                foreach ($parametros['paises'] as $pais) {
            ?>

            <tr>
              <td>
                <?php echo $pais->sPais_nombre; ?>
              </td>
              <td>
                <?php echo $pais->iPais_codigo_postal; ?>
              </td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group">
                  <button class="btn btn-warning" type="button" data-toggle="tooltip" data-original-title="Modificar Pais" data-placement="bottom" onclick="modificarPais('<?php echo $pais->iPais_id; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger" type="button" data-toggle="tooltip" data-original-title="Eliminar Pais" data-placement="bottom" onclick="eliminarPais('<?php echo $pais->iPais_id; ?>')"><i class="fa fa-trash"></i></button>
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
