<html>
<head>

  <link href="../../../public/templates/adminhero/assets/scripts/plugins/quill/quill.core.css" rel="stylesheet">
  <link href="../../../public/templates/adminhero/assets/scripts/plugins/quill/quill.snow.css" rel="stylesheet">
  <link href="../../../public/templates/adminhero/assets/scripts/plugins/quill/quill.bubble.css" rel="stylesheet">


  <!-- Theme-->
  <!-- Concat all lib & plugins css-->
  <link id="mainstyle" rel="stylesheet" href="../../../public/templates/adminhero/assets/stylesheets/theme-libs-plugins.css">
  <link id="mainstyle" rel="stylesheet" href="../../../public/templates/adminhero/assets/stylesheets/skin.css">

  <style type="text/css">



  #formprincipal{
      /*max-width: 800px;*/
      /*background: #FAFAFA;*/
      background: rgba(250, 250, 250, 0.9);
      /*opacity: 0.7;*/
      padding: 20px;
      /*margin: 50px auto;*/
      margin: 10px auto;
      box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
      border-radius: 30px;
      border: 2px solid #305A72;
  }
  </style>

</head>
<body  background = "/public/templates/img/fondo.jpg"style="background-size:cover;background-repeat: no-repeat;background-position: center center;">

<!--
        <div class= "container-fluid text-center">

            <img src="/public/templates/img/logofury1.jpg"/>

        </div>
      -->
      <form id="formprincipal">
      <div class="row" style="padding-left: 15px; padding-right: 15px;">
        <div class="col-md-12">
          <h3>Seleccione Categoria y Marca</h3>

          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Categoria:</b></label>
              <div class="col-xs-9">
                <select class="form-control" name="iCategoria_id" data-plugin="selectpicker" data-live-search="true" title="Seleccionar Categoria">
                  <?php
                    foreach ($parametros['categorias'] as $categoria) {
                      print "
                      <option value=\"".$categoria->iCategoria_id."\">".$categoria->sCategoria_nombre."</option>
                      ";
                    }
                  ?>
                </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Marca:</b></label>
              <div class="col-xs-9">
                <select class="form-control" name="iMarca_id" data-plugin="selectpicker" data-live-search="true" title="Seleccionar Categoria">
                  <?php
                    foreach ($parametros['marcas'] as $marca) {
                      print "
                      <option value=\"".$marca->iMarca_id."\">".$marca->sMarca_nombre."</option>
                      ";
                    }
                  ?>
                </select>
            </div>
          </div>
          <div class="row text-center">
            <button class="btn btn-success" type="button" data-toggle="tooltip" data-original-title="Obtener Productos" data-placement="bottom" onclick="obtenerProductos()">Buscar Productos</button>
          </div>
          <hr style="margin-top: 0.3rem;">
          <h3>Seleccione los productos a pedir:</h3>
        </div>
      </div>


      <div class="container-fluid">
        <div class="panel-wrapper">
          <div class="panel">
            <div class="panel-body">
              <div class="row-fluid text-right">
              </div>
              <table class="table" data-plugin="DataTable">
                <thead>
                  <tr>
                    <th class="text-center">Nombre del Producto</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Opciones</th>
                  </tr>
                </thead>
                <tbody id="listado-productos">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


      <hr style="margin-top: 0.3rem;">
      <h3>Listado de pedido</h3>
      <div class="container-fluid">
        <div class="panel-wrapper">
          <div class="panel">
            <div class="panel-body">

              <table class="table" data-plugin="DataTable">
                <thead>
                  <tr>
                    <th class="text-center">Nombre del Producto</th>
                    <th class="text-center">Precio</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Opciones</th>
                  </tr>
                </thead>
                <tbody id="carrito-compras">

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <button class="btn btn-danger" type="button" data-toggle="tooltip" data-original-title="Solicitar Orden" data-placement="bottom" onclick="solicitarOrden('<?php echo $producto->iProducto_id; ?>')">Solicitar</button>
      </div>
    </form>
    <!-- modals-->
    <!-- Modal Cantidad Producto -->
    <div class="modal top bottom-slide-in" id="cantidadProducto-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
            <h4 class="modal-title">Gestionar Cantidad</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" id="cantidadProducto-form">
              <input type="hidden" name="iProducto_id">
              <div class="form-group row">
                <label class="col-xs-3 form-control-label text-right"><b>Cantidad:</b></label>
                <div class="col-xs-9">
                  <input class="form-control" type="text" name="iDetalle_pedido_cantidad" autocomplete="off">
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
            <button class="btn btn-primary" type="button" onclick="dibujarEnTabla()">Continuar</button>
          </div>
        </div>
      </div>
    </div>




<script src="../../../public/templates/adminhero/assets/scripts/lib/jquery-1.11.3.min.js"></script>
<script src="../../../public/templates/adminhero/assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
