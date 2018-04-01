<script>




function obtenerProductos() {
  var iMarca_id =  $('#formprincipal').find('select[name=iMarca_id]').val();
  var iCategoria_id =  $('#formprincipal').find('select[name=iCategoria_id]').val();

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/principal/getProductoMarcaCategoria/",
      type: "POST",
      data: {
        iMarca_id : iMarca_id,
        iCategoria_id : iCategoria_id
      }
  }).done(function( data ) {
    var toAppend = '';
    console.log(data);
    if (data !== 'false') {
      data = JSON.parse(data);
      console.log(data);
      $.each(data, function(key, value) {

        toAppend = toAppend +
        '<tr><td>'+value['sProducto_nombre']+
        '</td><td>'+value['fProducto_precio']+
        '</td><td>'+value['sMarca_nombre']+
        '</td><td>'+value['sCategoria_nombre']+
        '</td><td><button class="btn btn-warning" type="button" data-toggle="tooltip" data-original-title="Ver Fotos" data-placement="bottom" onclick="verFotos(\''+value['iProducto_id']+'\')">Fotos</button>'+
        '<button class="btn btn-success" type="button" data-toggle="tooltip" data-original-title="Agregar Producto" data-placement="bottom" onclick="agregarProducto(\''+value['iProducto_id']+'\')">Agregar</button></td></tr>';
      });
    } else {
      toAppend = toAppend + '<tr><td colspan="5">No se encontraron resultados.</td></tr>';
    }
    $('#listado-productos').html(toAppend);
  });
}
function agregarProducto(iProducto_id)
{
  var toAppend;
  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/producto/getProductoDataById/",
      type: "POST",
      data: {
        iProducto_id : iProducto_id
      }
  }).done(function( data ) {
    if (data !== 'false') {
      data = JSON.parse(data);

      $('#cantidadProducto-form').find('input[name=iProducto_id]').val(iProducto_id);
      $('#cantidadProducto-form').find('input[name=iDetalle_pedido_cantidad]').val('');
      $('#cantidadProducto-modal').modal('show');

    }
  });



    }

function dibujarEnTabla() {
  var toAppend;
  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/producto/getProductoDataById/",
      type: "POST",
      data: {
        iProducto_id : $('#cantidadProducto-form').find('input[name=iProducto_id]').val()
      }
  }).done(function( data ) {
    if (data !== 'false') {
      data = JSON.parse(data);


        toAppend = toAppend +
        '<tr><td>'+data['sProducto_nombre']+
        '</td><td>'+data['fProducto_precio']+
        '</td><td>'+data['sMarca_nombre']+
        '</td><td>'+data['sCategoria_nombre']+
        //cantidad
        '</td><td>'+$('#cantidadProducto-form').find('input[name=iDetalle_pedido_cantidad]').val()+
        '</td><td><button class="btn btn-danger" type="button" data-toggle="tooltip" data-original-title="Quitar Producto" data-placement="bottom" onclick="$(this).parent().parent().remove()">Eliminar</button></td></tr>';
      $('#carrito-compras').append(toAppend);
    }
  });

  $('#cantidadProducto-modal').modal('hide');
}



</script>
