<script>

$('#nuevaCategoria-form').on('submit', function(e) {
  $('#nuevaCategoria-modal').modal('hide');

  if ($('#nuevaCategoria-form').find('input[name=iCategoria_id]').val() == 0) {
    $.notify('Registrando Categoria...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  } else {
    $.notify('Modificando Categoria...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  }

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/categoria/insertar_categoria/",
      type: "POST",
      data: $('#nuevaCategoria-form').serialize()
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
      $('#nuevaCategoria-modal').modal('show');
    }
  });
  e.preventDefault();
});

$('#eliminarCategoria-form').on('submit', function(e) {
  $('#eliminarCategoria-modal').modal('hide');

  $.notify('Eliminando Categoria...', {
    position: 'top center',
    hideDuration: '1',
    showAnimation: 'fadeIn',
    hideAnimation: 'fadeOut',
    className: 'warning'
  });

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/categoria/eliminar_categoria/",
      type: "POST",
      data: $('#eliminarCategoria-form').serialize()
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
      $('#eliminarCategoria-modal').modal('show');
    }
  });

  e.preventDefault();
});

  function nuevaCategoria() {
    $('#nuevaCategoria-form').find('input[name=iCategoria_id]').val('0');
    $('#nuevaCategoria-form').find('input[name=sCategoria_nombre]').val('');
    $('#nuevaCategoria-modal').modal('show');
  }

  function modificarCategoria(iCategoria_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/categoria/getCategoriaDataById/",
        type: "POST",
        data: {
          iCategoria_id : iCategoria_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#nuevaCategoria-form').find('input[name=iCategoria_id]').val(data['iCategoria_id']);
        $('#nuevaCategoria-form').find('input[name=sCategoria_nombre]').val(data['sCategoria_nombre']);
        $('#nuevaCategoria-modal').modal('show');
      }
    });
  }

  function eliminarCategoria(iCategoria_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/categoria/getCategoriaDataById/",
        type: "POST",
        data: {
          iCategoria_id : iCategoria_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#eliminarCategoria-form').find('input[name=iCategoria_id]').val(data['iCategoria_id']);
        $('#eliminarCategoria-form').find('.sCategoria_nombre').html(data['sCategoria_nombre']);
        $('#eliminarCategoria-modal').modal('show');
      }
    });
  }
</script>
