<script>
  var sNoticia_contenido = new Quill('.sNoticia_contenido',
  {
    modules: {
      toolbar: [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],

        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme

        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

        [{ 'font': [] }],
        [{ 'align': [] }],

        ['clean']                                         // remove formatting button
      ]
    },
  theme: 'snow'
  });

  $('#nuevaNoticia-form').on('submit', function(e) {
    $('#nuevaNoticia-modal').modal('hide');
    $.notify('Publicando noticia...', {
      position: 'top center',
      hideDuration: '1',
      showAnimation: 'fadeIn',
      hideAnimation: 'fadeOut',
      className: 'warning'
    });

    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/administracion/nuevaNoticia/",
        type: "POST",
        data: {
          iUsuario_id         : <?php echo $_SESSION['iUsuario_id']; ?>,
          sNoticia_titulo     : $('#nuevaNoticia-form').find('input[name=sNoticia_titulo]').val(),
          sNoticia_contenido  : sNoticia_contenido.root.innerHTML,
          dtNoticia_fecha     : '<?php echo strftime('%Y-%m-%d'); ?>',
          iStatus_fl          : 1
        }
    }).done(function( data ) {
      if (data === 'true') {
        $.notify('Noticia publicada con éxito', {
          position: 'top center',
          hideDuration: '1',
          showAnimation: 'fadeIn',
          hideAnimation: 'fadeOut',
          className: 'success'
        });
        $('#nuevaNoticia-form').find('input[name=sNoticia_titulo]').val('');
        sNoticia_contenido.root.innerHTML = '';
      } else {
        $.notify('Ha ocurrido un error, favor verificar', {
          position: 'top center',
          hideDuration: '1',
          showAnimation: 'fadeIn',
          hideAnimation: 'fadeOut',
          className: 'danger'
        });
        $('#nuevaNoticia-modal').modal('show');
      }
    });

    e.preventDefault();
  });
</script>
