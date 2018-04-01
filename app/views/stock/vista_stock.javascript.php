<script>

$('#nuevoStock-form').on('submit', function(e) {
  $('#nuevoStock-modal').modal('hide');

  if ($('#nuevoStock-form').find('input[name=iStock_id]').val() == 0) {
    $.notify('Registrando Stock...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  } else {
    $.notify('Modificando Stock...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  }

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/stock/insertar_stock/",
      type: "POST",
      data: $('#nuevoStock-form').serialize()
  }).done(function( data ) {
    console.log($('#nuevoStock-form').serialize());
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
      $('#nuevoStock-modal').modal('show');
    }
  });
  e.preventDefault();
});

$('#eliminarStock-form').on('submit', function(e) {
  $('#eliminarStock-modal').modal('hide');

  $.notify('Eliminando Stock...', {
    position: 'top center',
    hideDuration: '1',
    showAnimation: 'fadeIn',
    hideAnimation: 'fadeOut',
    className: 'warning'
  });

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/stock/eliminar_stock/",
      type: "POST",
      data: $('#eliminarStock-form').serialize()
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
      $('#eliminarStock-modal').modal('show');
    }
  });

  e.preventDefault();
});

  function nuevoStock() {
    $('#nuevoStock-form').find('input[name=iStock_id]').val('0');
    $('#nuevoStock-form').find('select[name=iProducto_id]').val('0');
    $('#nuevoStock-form').find('select[name=iSucursal_id]').val('0');
    $('#nuevoStock-modal').modal('show');
  }

  function modificarStock(iStock_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/stock/getStockDataById/",
        type: "POST",
        data: {
          iStock_id : iStock_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#nuevoStock-form').find('input[name=iStock_id]').val(data['iStock_id']);
        $('#nuevoStock-form').find('input[name=iStock_cantidad]').val(data['iStock_cantidad']);
        $('#nuevoStock-form').find('select[name=iProducto_id]').selectpicker('val', data['iProducto_id']);
        $('#nuevoStock-form').find('select[name=iSucursal_id]').selectpicker('val', data['iSucursal_id']);
        $('#nuevoStock-modal').modal('show');
      }
    });
  }

  function eliminarStock(iStock_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/stock/getStockDataById/",
        type: "POST",
        data: {
          iStock_id : iStock_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#eliminarStock-form').find('input[name=iStock_id]').val(data['iStock_id']);
        $('#eliminarStock-modal').modal('show');
      }
    });
  }
</script>
