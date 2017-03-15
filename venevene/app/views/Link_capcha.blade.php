<!DOCTYPE html>
<html>
<head>
	<title>Link</title>
	@include('estilos.head_mate')
</head>
<body>

<div class="container">
	<div class="row ">
		<div id="respuesta" class="col s10 offset-s1 white z-depth-1 center-align" style="margin-top: 150px; padding: 10px;">
			<img  src="<?php echo $banner; ?>" style="width: 100%;">			
			<form action="" method="POST" id="form_captcha">			
				<div class="g-recaptcha" data-sitekey="6LekhxgUAAAAAN1O-JoqCPZZ53WgkBCNpOLh7pHP" style="display: inline-block;"></div><br>
				<button id="<?php echo $id_titulo; ?>" type="submit" class="verificar waves-effect waves-light btn color_b" >Aceptar</button>
				<div class="progress grey lighten-2 hide">
      				<div class="indeterminate color_b"></div>
  				</div>
     		</form>
     		<fieldset class="respuesta hide"></fieldset>
		</div>
	</div>
</div>

<script src="https://www.google.com/recaptcha/api.js"></script>
@include('estilos.scripp_mate')
<script type="text/javascript">
	$(document).ready(function() {

		$(document).on('click','.verificar', function(e) {//FORMULARIO
          	e.preventDefault();

          	var id_titulo= $(this).attr('id');
          	var datos= $('#g-recaptcha-response').val();
          	if (datos=="") {
          		$('.respuesta').text('termina el capcha');
          	}else{  
          		$('.verificar').text('cargando...'); 
          		$('.progress').removeClass('hide')                 
	          	$.ajax({
	          		url: '/link_verificar',
	          		type: 'POST',
	          		dataType: 'json',
	          		data: {'g-recaptcha-response':datos,'id_titulo':id_titulo},          	
	          	})
	          	.done(function(respuesta) {
	          	$('.respuesta').removeClass('hide').html(respuesta);
	          	$('#form_captcha').remove();
	          	})
	          	.fail(function() {
	          	console.log("error");          	
	          	});         
         	}//if
    	});//clck		
});//ready//
</script>
</body>
</html>