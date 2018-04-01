<script>

$('#nuevaMarca-form').on('submit', function(e) {
  $('#nuevaMarca-modal').modal('hide');

  if ($('#nuevaMarca-form').find('input[name=iMarca_id]').val() == 0) {
    $.notify('Registrando Marca...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  } else {
    $.notify('Modificando Marca...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  }

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/marca/insertar_marca/",
      type: "POST",
      data: $('#nuevaMarca-form').serialize()
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
      $('#nuevaMarca-modal').modal('show');
    }
  });
  e.preventDefault();
});

$('#eliminarMarca-form').on('submit', function(e) {
  $('#eliminarMarca-modal').modal('hide');

  $.notify('Eliminando Marca...', {
    position: 'top center',
    hideDuration: '1',
    showAnimation: 'fadeIn',
    hideAnimation: 'fadeOut',
    className: 'warning'
  });

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/marca/eliminar_marca/",
      type: "POST",
      data: $('#eliminarMarca-form').serialize()
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
      $('#eliminarMarca-modal').modal('show');
    }
  });

  e.preventDefault();
});

  function nuevaMarca() {
    $('#nuevaMarca-form').find('input[name=iMarca_id]').val('0');
    $('#nuevaMarca-form').find('input[name=sMarca_nombre]').val('');
    $('#nuevaMarca-modal').modal('show');
  }

  function modificarMarca(iMarca_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/marca/getMarcaDataById/",
        type: "POST",
        data: {
          iMarca_id : iMarca_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#nuevaMarca-form').find('input[name=iMarca_id]').val(data['iMarca_id']);
        $('#nuevaMarca-form').find('input[name=sMarca_nombre]').val(data['sMarca_nombre']);
        $('#nuevaMarca-modal').modal('show');
      }
    });
  }

  function eliminarMarca(iMarca_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/marca/getMarcaDataById/",
        type: "POST",
        data: {
          iMarca_id : iMarca_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#eliminarMarca-form').find('input[name=iMarca_id]').val(data['iMarca_id']);
        $('#eliminarMarca-form').find('.sMarca_nombre').html(data['sMarca_nombre']);
        $('#eliminarMarca-modal').modal('show');
      }
    });
  }
</script>
