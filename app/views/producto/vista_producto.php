<div class="container-fluid">
  <div class="panel-wrapper">
    <div class="panel">
      <div class="panel-body">
        <div class="row-fluid text-right">
            <button type="button" class="btn btn-info font-weight-bold" onclick="nuevoProducto()">
              Nuevo Producto
            </button>
        </div>
        <table class="table" data-plugin="DataTable">
          <thead>
            <tr>
              <th class="text-center">Nombre del Producto</th>
              <th class="text-center">Precio</th>
              <th class="text-center">Marca</th>
              <th class="text-center">Categoria</th>
              <th class="text-center">Contenido(ml)</th>
              <th class="text-center">Nicotina(mg)</th>
              <th class="text-center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

              if ( !($parametros['productos'] === false) ) {
                foreach ($parametros['productos'] as $producto) {
            ?>

            <tr>
              <td>
                <?php echo $producto->sProducto_nombre; ?>
              </td>
              <td>
                <?php echo $producto->fProducto_precio; ?>
              </td>
              <td>
                <?php echo $producto->sMarca_nombre; ?>
              </td>
              <td>
                <?php echo $producto->sCategoria_nombre; ?>
              </td>
              <td>
                <?php echo $producto->iProducto_contenido; ?>
              </td>
              <td>
                <?php echo $producto->iProducto_nicotina; ?>
              </td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group">
                  <button class="btn btn-success" type="button" data-toggle="tooltip" data-original-title="Insertar Foto" data-placement="bottom" onclick="fotosProducto('<?php echo $producto->iProducto_id; ?>')"><i class="fa fa-image"></i></button>
                  <button class="btn btn-info" type="button" data-toggle="tooltip" data-original-title="Ver Fotos" data-placement="bottom" onclick="FotosCarrusel('<?php echo $producto->iProducto_id; ?>')"><i class="fa fa-search"></i></button>
                  <button class="btn btn-warning" type="button" data-toggle="tooltip" data-original-title="Modificar Producto" data-placement="bottom" onclick="modificarProducto('<?php echo $producto->iProducto_id; ?>')"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger" type="button" data-toggle="tooltip" data-original-title="Eliminar Producto" data-placement="bottom" onclick="eliminarProducto('<?php echo $producto->iProducto_id; ?>')"><i class="fa fa-trash"></i></button>
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
