<script>







function verDetalleOrden(iOrden_pedido_id,iCliente_id)
{
  var toAppend,toAppend1;
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
      //traer los datos del cliente, nombre apellido direccion y telefono

      $.ajax({
          url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/cliente/getClienteDataById/",
          type: "POST",
          data: {
            iCliente_id : iCliente_id
          }
      }).done(function( data ) {
        if (data !== 'false') {
          data = JSON.parse(data);
          //borrar luego de probar
          console.log(data);
          //
          toAppend1 = "";

            toAppend1 = toAppend1 +
            '<tr><td>'+value['sCliente_nombre']+
            '</td><td>'+value['sCliente_direccion']+
            '</td><td>'+value['sCliente_telefono']+ '</td></tr>';

          //$('#Data-Cliente').html(toAppend1);

          //mostrar el modal al traer todos los datos
          $('#verDetalleOrden-modal').modal('show');
        }
      });
    }
  });


}

</script>
