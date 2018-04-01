<!-- Modal Nuevo producto -->
<div class="modal top bottom-slide-in" id="nuevoProducto-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Gestionar Producto</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="nuevoProducto-form">
          <input type="hidden" name="iProducto_id">
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Nombre del Producto:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="sProducto_nombre" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Precio:</b></label>
            <div class="col-xs-9">
              <input class="form-control" type="text" name="fProducto_precio" autocomplete="off">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Marca:</b></label>
              <div class="col-xs-9">
                <select class="form-control" name="iMarca_id" data-plugin="selectpicker" data-live-search="true" title="Seleccionar Marca">
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

          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Categoria:</b></label>
              <div class="col-xs-9">
                <select class="form-control" name="iCategoria_id" data-plugin="selectpicker" data-live-search="true" title="Seleccionar Marca">
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
            <label class="col-xs-3 form-control-label text-right"><b>Contenido:</b></label>
            <div class="col-xs-9">
              <input class="form-check-input" type="checkbox" name="checkboxContenido" autocomplete="off" onchange="showDOMcheckbox(this, $('#nuevoProducto-form').find('input[name=iProducto_contenido]'))">
              <input class="hidden form-control" type="text" name="iProducto_contenido" autocomplete="off">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-xs-3 form-control-label text-right"><b>Nicotina:</b></label>
            <div class="col-xs-9">
              <input class="form-check-input" type="checkbox" name="checkboxNicotina" autocomplete="off" onchange="showDOMcheckbox(this, $('#nuevoProducto-form').find('input[name=iProducto_nicotina]'))">
              <input class="hidden form-control" type="text" name="iProducto_nicotina" autocomplete="off">
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="button" onclick="$('#nuevoProducto-form').submit()">Continuar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Eliminar Producto -->
<div class="modal top bottom-slide-in" id="eliminarProducto-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Eliminar Producto</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="eliminarProducto-form">
          <input type="hidden" name="iProveedor_id">
          ¿Está seguro que desea dar de baja al producto <b class="sProducto_nombre"></b>?
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-danger" type="button" onclick="$('#eliminarProducto-form').submit()">Dar de baja</button>
      </div>
    </div>
  </div>
</div>

<!--Modal Insertar Foto -->

<div class="modal top bottom-slide-in" id="uploadImage-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Insertar Foto</h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="uploadImage-form">
          <input type="hidden" name="iFoto_id" value ="0">
          <input type="hidden" name="iProducto_id">
          <div class="form-group">
            <label for="file">Seleccionar archivo</label>
            <input type="file" name="file">
            <p class="help-block"></p>
          </div>
          <div class="progress progress-sm active">
            <div id="upload-progress" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" style="width: 0%">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-success" type="button" onclick="$('#uploadImage-form').submit()" id="submitButton">Subir</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Ver Fotos del producto -->
<div class="modal top bottom-slide-in" id="Fotos-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Fotos del Producto</h4>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" id="Fotos-form">
          <input type="hidden" name="iProducto_id">
        </form>
        <div class="owl-carousel owl-theme" id="carrusel">
        </div>

      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-danger" type="button" onclick="this.fade()">Cerrar</button>
      </div>
    </div>
  </div>
</div>
