<script>

$('#nuevaCiudad-form').on('submit', function(e) {
  $('#nuevaCiudad-modal').modal('hide');

  if ($('#nuevaCiudad-form').find('input[name=iCiudad_id]').val() == 0) {
    $.notify('Registrando Ciudad...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  } else {
    $.notify('Modificando Ciudad...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  }

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/ciudad/insertar_ciudad/",
      type: "POST",
      data: $('#nuevaCiudad-form').serialize()
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
      $('#nuevaCiudad-modal').modal('show');
    }
  });
  e.preventDefault();
});

$('#eliminarCiudad-form').on('submit', function(e) {
  $('#eliminarCiudad-modal').modal('hide');

  $.notify('Eliminando Ciudad...', {
    position: 'top center',
    hideDuration: '1',
    showAnimation: 'fadeIn',
    hideAnimation: 'fadeOut',
    className: 'warning'
  });

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/ciudad/eliminar_ciudad/",
      type: "POST",
      data: $('#eliminarCiudad-form').serialize()
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
      $('#eliminarCiudad-modal').modal('show');
    }
  });

  e.preventDefault();
});

  function nuevaCiudad() {
    $('#nuevaCiudad-form').find('input[name=iCiudad_id]').val('0');
    $('#nuevaCiudad-form').find('input[name=sCiudad_nombre]').val('');
    $('#nuevaCiudad-form').find('select[name=iPais_id]').val('0');
    $('#nuevaCiudad-modal').modal('show');
  }

  function modificarCiudad(iCiudad_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/ciudad/getCiudadDataById/",
        type: "POST",
        data: {
          iCiudad_id : iCiudad_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#nuevaCiudad-form').find('input[name=iCiudad_id]').val(data['iCiudad_id']);
        $('#nuevaCiudad-form').find('input[name=sCiudad_nombre]').val(data['sCiudad_nombre']);
        $('#nuevaCiudad-form').find('select[name=iPais_id]').val(data['iPais_id']);
        $('#nuevaCiudad-modal').modal('show');
      }
    });
  }

  function eliminarCiudad(iCiudad_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/ciudad/getCiudadDataById/",
        type: "POST",
        data: {
          iCiudad_id : iCiudad_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#eliminarCiudad-form').find('.sCiudad_nombre').html(data['sCiudad_nombre']);
        $('#eliminarCiudad-form').find('input[name=iCiudad_id]').val(data['iCiudad_id']);
        $('#eliminarCiudad-modal').modal('show');
      }
    });
  }
</script>
