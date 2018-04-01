<script>

$('#nuevaSucursal-form').on('submit', function(e) {
  $('#nuevaSucursal-modal').modal('hide');

  if ($('#nuevaSucursal-form').find('input[name=iSucursal_id]').val() == 0) {
    $.notify('Registrando Sucursal...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  } else {
    $.notify('Modificando Sucursal...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  }

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/sucursal/insertar_sucursal/",
      type: "POST",
      data: $('#nuevaSucursal-form').serialize()
  }).done(function( data ) {
    console.log($('#nuevaSucursal-form').serialize());
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
      $('#nuevaSucursal-modal').modal('show');
    }
  });
  e.preventDefault();
});

$('#eliminarSucursal-form').on('submit', function(e) {
  $('#eliminarSucursal-modal').modal('hide');

  $.notify('Eliminando Sucursal...', {
    position: 'top center',
    hideDuration: '1',
    showAnimation: 'fadeIn',
    hideAnimation: 'fadeOut',
    className: 'warning'
  });

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/sucursal/eliminar_sucursal/",
      type: "POST",
      data: $('#eliminarSucursal-form').serialize()
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
      $('#eliminarSucursal-modal').modal('show');
    }
  });

  e.preventDefault();
});

  function nuevaSucursal() {
    $('#nuevaSucursal-form').find('input[name=iSucursal_id]').val('0');
    $('#nuevaSucursal-form').find('input[name=sSucursal_nombre]').val('');
    $('#nuevaSucursal-form').find('input[name=sSucursal_direccion]').val('');
    $('#nuevaSucursal-form').find('input[name=sSucursal_telefono]').val('');
    $('#nuevaSucursal-form').find('select[name=iCiudad_id]').val('0');
    $('#nuevaSucursal-modal').modal('show');
  }

  function modificarSucursal(iSucursal_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/sucursal/getSucursalDataById/",
        type: "POST",
        data: {
          iSucursal_id : iSucursal_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#nuevaSucursal-form').find('input[name=iSucursal_id]').val(data['iSucursal_id']);
        $('#nuevaSucursal-form').find('input[name=sSucursal_nombre]').val(data['sSucursal_nombre']);
        $('#nuevaSucursal-form').find('input[name=sSucursal_direccion]').val(data['sSucursal_direccion']);
        $('#nuevaSucursal-form').find('input[name=sSucursal_telefono]').val(data['sSucursal_telefono']);
        $('#nuevaSucursal-form').find('select[name=iCiudad_id]').selectpicker('val', data['iCiudad_id']);
        $('#nuevaSucursal-modal').modal('show');
      }
    });
  }

  function eliminarSucursal(iSucursal_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/sucursal/getSucursalDataById/",
        type: "POST",
        data: {
          iSucursal_id : iSucursal_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#eliminarSucursal-form').find('.sSucursal_nombre').html(data['sSucursal_nombre']);
        $('#eliminarSucursal-form').find('input[name=iSucursal_id]').val(data['iSucursal_id']);
        $('#eliminarSucursal-modal').modal('show');
      }
    });
  }
</script>
