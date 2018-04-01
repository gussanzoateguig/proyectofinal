<div class="container-fluid">
  <div class="panel-wrapper">
    <div class="panel">
      <div class="panel-body">
        <div class="row-fluid pull-right">
            <button type="button" class="btn btn-info font-weight-bold" data-toggle="modal" data-target="#nuevaNoticia-modal">
              Redactar Noticia
            </button>
        </div>
        <table class="table" data-plugin="DataTable">
          <thead>
            <tr>
              <th class="text-center">Título</th>
              <th class="text-center">Publicación</th>
              <th class="text-center">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php

              if ( !($parametros['noticias'] === false) ) {
                foreach ($parametros['noticias'] as $noticia) {
            ?>

            <tr>
              <td>
                <?php echo $noticia->sNoticia_titulo; ?>
              </td>
              <td class="text-center">
                <?php echo strftime('%d-%m-%Y', strtotime($noticia->dtNoticia_fecha)); ?>
              </td>
              <td class="text-center">
                <div class="btn-group btn-group-sm" role="group">
                  <button class="btn btn-primary" type="button" data-toggle="tooltip" data-original-title="Ver Noticia" data-placement="bottom"><i class="fa fa-eye"></i></button>
                  <button class="btn btn-warning" type="button" data-toggle="tooltip" data-original-title="Editar Noticia" data-placement="bottom"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger" type="button" data-toggle="tooltip" data-original-title="Eliminar Noticia" data-placement="bottom"><i class="fa fa-trash"></i></button>
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
