<!-- Modal Redactar Noticia -->
<div class="modal top bottom-slide-in" id="nuevaNoticia-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ion-close"></i></span></button>
        <h4 class="modal-title">Redactar Noticia</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="nuevaNoticia-form">
          <div class="form-group row">
            <label class="col-xs-2 form-control-label text-right"><b>Título:</b></label>
            <div class="col-xs-10">
              <input class="form-control" type="text" name="sNoticia_titulo" autocomplete="off">
            </div>
          </div>
          <div class="sNoticia_contenido">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-primary" type="button" onclick="$('#nuevaNoticia-form').submit()">Publicar</button>
      </div>
    </div>
  </div>
</div>
