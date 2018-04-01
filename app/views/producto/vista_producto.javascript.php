<script src="public/templates/owl/owl.carousel.js"></script>
<script>

$('#nuevoProducto-form').on('submit', function(e) {
  $('#nuevoProducto-modal').modal('hide');
  if ($('#nuevoProducto-form').find('input[name=iProducto_id]').val() == 0) {
    $.notify('Registrando Producto...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  } else {
    $.notify('Modificando Producto...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });
  }

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/producto/insertar_producto/",
      type: "POST",
      data: $('#nuevoProducto-form').serialize()
  }).done(function( data ) {
    console.log($('#nuevoProducto-form').serialize());
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
      $('#nuevoProducto-modal').modal('show');
    }
  });
  e.preventDefault();
});

$('#eliminarProducto-form').on('submit', function(e) {
  $('#eliminarProducto-modal').modal('hide');

  $.notify('Eliminando Producto...', {
    position: 'top center',
    hideDuration: '1',
    showAnimation: 'fadeIn',
    hideAnimation: 'fadeOut',
    className: 'warning'
  });

  $.ajax({
      url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/producto/eliminar_producto/",
      type: "POST",
      data: $('#eliminarProducto-form').serialize()
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
      $('#eliminarProducto-modal').modal('show');
    }
  });

  e.preventDefault();
});

  function nuevoProducto() {
    $('#nuevoProducto-form').find('input[name=iProducto_id]').val('0');
    $('#nuevoProducto-form').find('input[name=sProducto_nombre]').val('');
    $('#nuevoProducto-form').find('input[name=fProducto_precio]').val('');
    $('#nuevaProducto-form').find('select[name=iMarca_id]').val('0');
    $('#nuevaProducto-form').find('select[name=iCategoria_id]').val('0');
    $('#nuevoProducto-modal').modal('show');
  }

  function modificarProducto(iProducto_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/producto/getProductoDataById/",
        type: "POST",
        data: {
          iProducto_id : iProducto_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        console.log(data);
        data = JSON.parse(data);
        $('#nuevoProducto-form').find('input[name=iProducto_id]').val(data['iProducto_id']);
        $('#nuevoProducto-form').find('input[name=sProducto_nombre]').val(data['sProducto_nombre']);
        $('#nuevoProducto-form').find('input[name=fProducto_precio]').val(data['fProducto_precio']);
        $('#nuevaProducto-form').find('select[name=iMarca_id]').selectpicker('val', data['iMarca_id']);
        $('#nuevaProducto-form').find('select[name=iCategoria_id]').selectpicker('val', data['iCategoria_id']);
        $('#nuevoProducto-modal').modal('show');
      }
    });
  }

  function eliminarProducto(iProducto_id) {
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/producto/getProductoDataById/",
        type: "POST",
        data: {
          iProducto_id : iProducto_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        $('#eliminarProducto-form').find('.sProducto_nombre').html(data['sProducto_nombre']);
        $('#eliminarProducto-form').find('input[name=iProducto_id]').val(data['iProducto_id']);
        $('#eliminarProducto-modal').modal('show');
      }
    });
  }

  function fotosProducto(iProducto_id) {

    $('#uploadImage-form').on('submit', function(event) {
        var toAppend = '';
        if ($('#uploadImage-form').find('input[name=file]').val() != '') {
          var file = $('#uploadImage-form').find('input[name=file]').prop('files')[0];
          var data = new FormData();
          data.append('file', file);
          data.append('iProducto_id', $('#uploadImage-form').find('input[name=iProducto_id]').val());
          data.append('iFoto_id', $('#uploadImage-form').find('input[name=iFoto_id]').val());

          $('#submitButton').addClass('disabled');
          $.ajax({
            enctype: 'multipart/form-data',
            url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/foto/insertar_foto/",
            type: "POST",
            data: data,
            contentType: false,
            cache: false,
            processData: false,
            xhr: function() {
              //upload Progress
              var xhr = $.ajaxSettings.xhr();
              if (xhr.upload) {
                xhr.upload.addEventListener('progress', function(event) {
                  var percent = 0;
                  var position = event.loaded || event.position;
                  var total = event.total;
                  if (event.lengthComputable) {
                    percent = Math.ceil(position / total * 100);
                  }
                  //update progressbar
                  $("#upload-progress").css("width", +percent + "%");
                }, true);
              }
              return xhr;
            },
            mimeType: "multipart/form-data"
          }).done(function(res) {
            $('.loader').show();
            location.reload();
          });
        }
        event.preventDefault();
      });

    $('#uploadImage-form').find('input[name=iProducto_id]').val(iProducto_id);
    $('#uploadImage-modal').modal('show');
  }

  function FotosCarrusel(iProducto_id) {
    var toAppend;


    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/foto/route_list_FotoProducto/",
        type: "POST",
        data: {
          iProducto_id : iProducto_id
        }
    }).done(function( data ) {
      if (data !== 'false') {
        data = JSON.parse(data);
        console.log(data);
          toAppend = "";
          $.each(data, function(key, value) {
            toAppend = toAppend + '<div class="item"><img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/'+value['sFoto_url']+'" width="300" height="300"></img></div>';
          });
        } else {
          toAppend = toAppend + '<div class="item"><h4>Sin Datos</h4></div>';
        }


      $('#carrusel').html(toAppend);
      $('.owl-carousel').owlCarousel({
      loop:false,
      margin:10,
      nav:true,
      items:3



  });
      $('#Fotos-form').find('input[name=iProducto_id]').val(data['iProducto_id']);
      //alert(toAppend);
      $('#Fotos-modal').modal('show');
      });
  }

  function showDOMcheckbox(checkbox, target) {
    if ($(checkbox).is(':checked')) {
      target.show('fade');
    } else {
      target.hide('fade');
    }
  }
</script>
