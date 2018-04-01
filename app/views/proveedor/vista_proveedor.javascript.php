<script>

$('#nuevoProveedor-form').on('submit', function(e) {
  $('#nuevoProveedor-modal').modal('hide');

  if ($('#nuevoProveedor-form').find('input[name=iProveedor_id]').val() == 0) {
    $.notify('Registrando Proveedor...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  } else {
    $.notify('Modificando Proveedor...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  }

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/proveedor/insertar_proveedor/",
      type: "POST",
      data: $('#nuevoProveedor-form').serialize()
  }).done(function( data ) {
    console.log($('#nuevoProveedor-form').serialize());
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
      $('#nuevoProveedor-modal').modal('show');
    }
  });
  e.preventDefault();
});

$('#eliminarProveedor-form').on('submit', function(e) {
  $('#eliminarProveedor-modal').modal('hide');

  $.notify('Eliminando Proveedor...', {
    position: 'top center',
    hideDuration: '1',
    showAnimation: 'fadeIn',
    hideAnimation: 'fadeOut',
    className: 'warning'
  });

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/proveedor/eliminar_proveedor/",
      type: "POST",
      data: $('#eliminarProveedor-form').serialize()
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
      $('#eliminarProveedor-modal').modal('show');
    }
  });

  e.preventDefault();
});

  function nuevoProveedor() {
    $('#nuevoProveedor-form').find('input[name=iProveedor_id]').val('0');
    $('#nuevoProveedor-form').find('input[name=sProveedor_nombre]').val('');
    $('#nuevoProveedor-form').find('input[name=sProveedor_telefono]').val('');
    $('#nuevoProveedor-form').find('input[name=sProveedor_correo]').val('');
    $('#nuevoProveedor-form').find('select[name=iProveedor_nit]').val('0');
    $('#nuevoProveedor-modal').modal('show');
  }

  function modificarProveedor(iProveedor_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/proveedor/getProveedorDataById/",
        type: "POST",
        data: {
          iProveedor_id : iProveedor_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#nuevoProveedor-form').find('input[name=iProveedor_id]').val(data['iProveedor_id']);
        $('#nuevoProveedor-form').find('input[name=sProveedor_nombre]').val(data['sProveedor_nombre']);
        $('#nuevoProveedor-form').find('input[name=sProveedor_telefono]').val(data['sProveedor_telefono']);
        $('#nuevoProveedor-form').find('input[name=sProveedor_correo]').val(data['sProveedor_correo']);
        $('#nuevoProveedor-form').find('imput[name=iProveedor_nit]').val(data['iProveedor_nit']);
        $('#nuevoProveedor-modal').modal('show');
      }
    });
  }

  function eliminarProveedor(iProveedor_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/proveedor/getProveedorDataById/",
        type: "POST",
        data: {
          iProveedor_id : iProveedor_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#eliminarProveedor-form').find('.sProveedor_nombre').html(data['sProveedor_nombre']);
        $('#eliminarProveedor-form').find('input[name=iProveedor_id]').val(data['iProveedor_id']);
        $('#eliminarProveedor-modal').modal('show');
      }
    });
  }
</script>
