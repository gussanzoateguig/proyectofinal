<script>

$(function() {

  $('#loginform').submit(function(e) {
    $('#loginErroresBox').hide();
    $.ajax({
        url: "http://<?php echo $_SERVER['HTTP_HOST']; ?>/usuario/ajax_usuarioExiste/",
        type: "POST",
        data: $('#loginform').serialize()
    }).done(function( data ) {
      var result = JSON.parse(data);
      if (result == null) {
        location.reload();
      } else {
        var toAppend = '';
        $.each(result['errores'], function(key, error) {
          toAppend = toAppend +
          '<li>' +
            error
          '</li>';
        });
        $('#loginErrores').html(toAppend);
        $('#loginErroresBox').show('fade');
      }
    });
    e.preventDefault();
  });

});

$(document).ready(function(){

	var login = $('#loginform');
	var recover = $('#recoverform');
	var speed = 400;

	$('#to-recover').click(function(){

		$("#loginform").slideUp();
		$("#recoverform").fadeIn();
	});
	$('#to-login').click(function(){

		$("#recoverform").hide();
		$("#loginform").fadeIn();
	});


	$('#to-login').click(function(){

	});

    if($.browser.msie == true && $.browser.version.slice(0,3) < 10) {
        $('input[placeholder]').each(function(){

        var input = $(this);

        $(input).val(input.attr('placeholder'));

        $(input).focus(function(){
             if (input.val() == input.attr('placeholder')) {
                 input.val('');
             }
        });

        $(input).blur(function(){
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'));
            }
        });
    });



    }
});

</script>
