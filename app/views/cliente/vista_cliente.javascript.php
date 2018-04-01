<script>

$('#nuevoCliente-form').on('submit', function(e) {
  $('#nuevoCliente-modal').modal('hide');

  if ($('#nuevoCliente-form').find('input[name=iCliente_id]').val() == 0) {
    $.notify('Registrando Cliente...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  } else {
    $.notify('Modificando Cliente...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  }

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/cliente/insertar_cliente/",
      type: "POST",
      data: $('#nuevoCliente-form').serialize()
  }).done(function( data ) {
    console.log($('#nuevoCliente-form').serialize());
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
      $('#nuevoCliente-modal').modal('show');
    }
  });
  e.preventDefault();
});

$('#eliminarCliente-form').on('submit', function(e) {
  $('#eliminarCliente-modal').modal('hide');

  $.notify('Eliminando Cliente...', {
    position: 'top center',
    hideDuration: '1',
    showAnimation: 'fadeIn',
    hideAnimation: 'fadeOut',
    className: 'warning'
  });

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/cliente/eliminar_cliente/",
      type: "POST",
      data: $('#eliminarCliente-form').serialize()
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
      $('#eliminarCliente-modal').modal('show');
    }
  });

  e.preventDefault();
});

  function nuevoCliente() {
    $('#nuevoCliente-form').find('input[name=iCliente_id]').val('0');
    $('#nuevoCliente-form').find('input[name=sCliente_nombre]').val('');
    $('#nuevoCliente-form').find('input[name=sCliente_direccion]').val('');
    $('#nuevoCliente-form').find('input[name=sCliente_telefono]').val('');
    $('#nuevoCliente-form').find('input[name=sCliente_correo]').val('');
    $('#nuevoCliente-modal').modal('show');
  }

  function modificarCliente(iCliente_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/cliente/getClienteDataById/",
        type: "POST",
        data: {
          iCliente_id : iCliente_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#nuevoCliente-form').find('input[name=iCliente_id]').val(data['iCliente_id']);
        $('#nuevoCliente-form').find('input[name=sCliente_nombre]').val(data['sCliente_nombre']);
        $('#nuevoCliente-form').find('input[name=sCliente_direccion]').val(data['sCliente_direccion']);
        $('#nuevoCliente-form').find('input[name=sCliente_telefono]').val(data['sCliente_telefono']);
        $('#nuevoCliente-form').find('input[name=sCliente_correo]').val(data['sCliente_correo']);
        $('#nuevoCliente-modal').modal('show');
      }
    });
  }

  function eliminarCliente(iCliente_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/cliente/getClienteDataById/",
        type: "POST",
        data: {
          iCliente_id : iCliente_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#eliminarCliente-form').find('.sCliente_nombre').html(data['sCliente_nombre']);
        $('#eliminarCliente-form').find('input[name=iCliente_id]').val(data['iCliente_id']);
        $('#eliminarCliente-modal').modal('show');
      }
    });
  }
</script>
