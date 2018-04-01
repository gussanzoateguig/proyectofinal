<?php

  if ( !($parametros['noticias'] === false) ) {
    foreach ($parametros['noticias'] as $noticia) {
?>
      <div class="container-fluid">
        <div class="panel-wrapper">
          <div class="panel">
            <div class="page-header">
              <div class="row">
                <div class="col-md-4">
                  <div class="media">
                    <div class="media-left media-middle"><i class="fa fa-newspaper-o fa-2x"></i></div>
                    <div class="media-body">
                      <h4 class="page-header-title"><b><?php echo $noticia->sNoticia_titulo; ?></b></h4>
                      <div class="small text-muted">
                        <?php echo strftime('%d de %B de %Y', strtotime($noticia->dtNoticia_fecha)); ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="pull-xs-right">
                    <a class="btn btn-link">
                      <i class="fa fa-user"></i>
                    </a>
                    <?php echo $noticia->sUsuario_nombre; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel-body text-justify">
              <?php echo $noticia->sNoticia_contenido; ?>
            </div>
          </div>
        </div>
      </div>

<?php
    }
  }
?>
