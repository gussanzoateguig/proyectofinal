<script>

$('#nuevoCatalogo-form').on('submit', function(e) {
  $('#nuevoCatalogo-modal').modal('hide');

  if ($('#nuevoCatalogo-form').find('input[name=iCatalogo_id]').val() == 0) {
    $.notify('Registrando Catalogo...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  } else {
    $.notify('Modificando Catalogo...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  }

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/catalogo/insertar_catalogo/",
      type: "POST",
      data: $('#nuevoCatalogo-form').serialize()
  }).done(function( data ) {
    console.log($('#nuevoCatalogo-form').serialize());
    if (data === 'true') {
      $.notify('Acción realizada con éxito. Actualizando en 2 segundos...', {
        position: 'top center',
        hideDuration: '1',
        showAnimation: 'fadeIn',
        hideAnimation: 'fadeOut',
        className: 'success'
      });
      setTimeout(function() {
        window.location.reload(1);
      }, 2000);
    } else {
      $.notify('Ha ocurrido un error, favor verificar', {
        position: 'top center',
        hideDuration: '1',
        showAnimation: 'fadeIn',
        hideAnimation: 'fadeOut',
        className: 'danger'
      });
      $('#nuevoCatalogo-modal').modal('show');
    }
  });
  e.preventDefault();
});

$('#eliminarCatalogo-form').on('submit', function(e) {
  $('#eliminarCatalogo-modal').modal('hide');

  $.notify('Eliminando Catalogo...', {
    position: 'top center',
    hideDuration: '1',
    showAnimation: 'fadeIn',
    hideAnimation: 'fadeOut',
    className: 'warning'
  });

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/catalogo/eliminar_catalogo/",
      type: "POST",
      data: $('#eliminarCatalogo-form').serialize()
  }).done(function( data ) {
    if (data === 'true') {
      $.notify('Acción realizada con éxito. Actualizando en 2 segundos...', {
        position: 'top center',
        hideDuration: '1',
        showAnimation: 'fadeIn',
        hideAnimation: 'fadeOut',
        className: 'success'
      });
      setTimeout(function() {
        window.location.reload(1);
      }, 2000);
    } else {
      $.notify('Ha ocurrido un error, favor verificar', {
        position: 'top center',
        hideDuration: '1',
        showAnimation: 'fadeIn',
        hideAnimation: 'fadeOut',
        className: 'danger'
      });
      $('#eliminarCatalogo-modal').modal('show');
    }
  });

  e.preventDefault();
});

  function nuevoCatalogo() {
    $('#nuevoCatalogo-form').find('input[name=iCatalogo_id]').val('0');
    $('#nuevoCatalogo-form').find('input[name=fCatalogo_precio]').val('0');
    $('#nuevoCatalogo-form').find('select[name=iProducto_id]').val('0');
    $('#nuevoCatalogo-form').find('select[name=iProveedor_id]').val('0');
    $('#nuevoCatalogo-modal').modal('show');
  }

  function modificarCatalogo(iCatalogo_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/catalogo/getCatalogoDataById/",
        type: "POST",
        data: {
          iCatalogo_id : iCatalogo_id
        }
    }).done(function( data ) {
      console.log(data);
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#nuevoCatalogo-form').find('input[name=iCatalogo_id]').val(data['iCatalogo_id']);
        $('#nuevoCatalogo-form').find('input[name=fCatalogo_precio]').val(data['fCatalogo_precio']);
        $('#nuevoCatalogo-form').find('select[name=iProducto_id]').selectpicker('val', data['iProducto_id']);
        $('#nuevoCatalogo-form').find('select[name=iProveedor_id]').selectpicker('val', data['iProveedor_id']);
        $('#nuevoCatalogo-modal').modal('show');
      }
    });
  }

  function eliminarCatalogo(iCatalogo_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/catalogo/getCatalogoDataById/",
        type: "POST",
        data: {
          iCatalogo_id : iCatalogo_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#eliminarCatalogo-form').find('input[name=iCatalogo_id]').val(data['iCatalogo_id']);
        $('#eliminarCatalogo-modal').modal('show');
      }
    });
  }
</script>
