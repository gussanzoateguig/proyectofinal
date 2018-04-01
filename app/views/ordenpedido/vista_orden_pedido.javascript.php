<script>

$('#nuevaOrdenPedido-form').on('submit', function(e) {
  $('#nuevaOrdenPedido-modal').modal('hide');

  if ($('#nuevaOrdenPedido-form').find('input[name=iOrden_pedido_id]').val() == 0) {
    $.notify('Registrando Orden...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  } else {
    $.notify('Modificando Orden...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  }

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/ordenpedido/insertar_ordenpedido/",
      type: "POST",
      data: $('#nuevaOrdenPedido-form').serialize()
  }).done(function( data ) {
    console.log($('#nuevaOrdenPedido-form').serialize());
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
      $('#nuevaOrdenPedido-modal').modal('show');
    }
  });
  e.preventDefault();
});

$('#eliminarOrdenPedido-form').on('submit', function(e) {
  $('#eliminarOrdenPedido-modal').modal('hide');

  $.notify('Eliminando Orden...', {
    position: 'top center',
    hideDuration: '1',
    showAnimation: 'fadeIn',
    hideAnimation: 'fadeOut',
    className: 'warning'
  });

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/ordenpedido/eliminar_ordenpedido/",
      type: "POST",
      data: $('#eliminarOrdenPedido-form').serialize()
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
      $('#eliminarOrdenPedido-modal').modal('show');
    }
  });

  e.preventDefault();
});

  function nuevaOrdenPedido() {
    //$('#nuevaOrdenPedido-form').find('input[name=iOrden_pedido_id]').val('0');
    //$('#nuevaOrdenPedido-form').find('input[name=sSucursal_nombre]').val('');
    //$('#nuevaOrdenPedido-form').find('input[name=sSucursal_direccion]').val('');
    //$('#nuevaOrdenPedido-form').find('input[name=sSucursal_telefono]').val('');
    //$('#nuevaOrdenPedido-form').find('select[name=iCiudad_id]').val('0');
    $('#nuevaOrdenPedido-modal').modal('show');
  }

  function modificarOrdenPedido(iOrden_pedido_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/ordenpedido/getOrdenPedidoDataById/",
        type: "POST",
        data: {
          iOrden_pedido_id : iOrdne_pedido_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        //$('#nuevaSucursal-form').find('input[name=iSucursal_id]').val(data['iSucursal_id']);
        //$('#nuevaSucursal-form').find('input[name=sSucursal_nombre]').val(data['sSucursal_nombre']);
        //$('#nuevaSucursal-form').find('input[name=sSucursal_direccion]').val(data['sSucursal_direccion']);
        //$('#nuevaSucursal-form').find('input[name=sSucursal_telefono]').val(data['sSucursal_telefono']);
        //$('#nuevaSucursal-form').find('select[name=iCiudad_id]').selectpicker('val', data['iCiudad_id']);
        $('#nuevaOrdenPedido-modal').modal('show');
      }
    });
  }

  function eliminarOrdenPedido(iOrden_pedido_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/ordenpedido/getOrdenPedidoDataById/",
        type: "POST",
        data: {
          iOrden_pedido_id : iOrden_pedido_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        //$('#eliminarSucursal-form').find('.sSucursal_nombre').html(data['sSucursal_nombre']);
        //$('#eliminarSucursal-form').find('input[name=iSucursal_id]').val(data['iSucursal_id']);
        $('#eliminarOrdenPedido-modal').modal('show');
      }
    });
  }
  function verDetalleOrden(iOrden_pedido_id)
  {
    var toAppend;
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/orden_pedido/getDetalle_pedido/",
        type: "POST",
        data: {
          iOrden_pedido_id : iOrden_pedido_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        console.log(data);
        toAppend = "";
        var total = 0;
        $.each(data, function(key, value) {
          total = total + (value['iDetalle_pedido_cantidad'] * value['fProducto_precio']);
          toAppend = toAppend +
          '<tr><td>'+value['sProducto_nombre']+
          '</td><td>'+value['sMarca_nombre']+
          '</td><td>'+value['sCategoria_nombre']+
          '</td><td>'+value['iDetalle_pedido_cantidad']+
          '</td><td>'+value['fProducto_precio']+
          '</td><td>'+ (value['fProducto_precio'] * value['iDetalle_pedido_cantidad']);
        });
        toAppend = toAppend + '<tr><td>Total:</td><td></td><td></td><td></td><td></td><td>'+ total +'</td></tr>'
        $('#Data-Productos').html(toAppend);

        //hacer ajax del detalle pedido traer todosd los productos que contiene la orden
        $('#verDetalleOrden-modal').modal('show');
      }
    });

  }

  function generarOrdenPDF(iOrden_pedido_id) {
    window.open('http://<?php echo $_SERVER['HTTP_HOST']; ?>/orden_pedido/route_list_orden_pedidoPDF/&iOrden_pedido_id='+iOrden_pedido_id, '_blank');
  }
</script>
