<div class="container-fluid">
  <div class="panel-wrapper">
    <div class="panel">
      <div class="panel-body">
        <table class="table" data-plugin="DataTable">
          <thead>
            <tr>
              <th class="text-center">Id</th>
              <th class="text-center">Nombre</th>
            </tr>
          </thead>
          <tbody>
            <?php

              if ( !($parametros['extras'] === false) ) {
                foreach ($parametros['extras'] as $extra) {
            ?>

            <tr>
              <td>
                <?php echo $extra->iExtra_id; ?>
              </td>
              <td>
                <?php echo $extra->sExtra_nombre; ?>
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
