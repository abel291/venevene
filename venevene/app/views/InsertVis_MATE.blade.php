<!DOCTYPE html>
<html lang="es">
<head>	

@include('estilos.head_mate')
<title> Tablero Admi </title>
 
</head>
</head>
<body >
<br><br>
<div class="container ">
<div class="row  ">
	<div class="col s12 z-depth-1 white">
		<h5 style="border-bottom: 1PX #bdbdbd solid; margin-top: 20px; "><?php echo $titulo ?></h5>
		<form  class="col s12" id="formuploadajax" action="" method="post" >
			<div class="row">
				<div class='input-field col s12'>					              	
					<label style='font-size: 14px;' >Titulo</label>	
					<input class='titulo-form' type='text' name='titulo-form'>					                
				</div>	

				<div class="input-field col s12 m6 l5">
					<input class="Lansamiento-form datepicker" type="date" name="Lansamiento-form">	
					<label for="" >Fecha de Estreno</label>					
				</div>

				<div class='input-field col s12 m11 l12'>
					<label for='Captura_0' style='font-size: 14px;' >Captura 0</label>
					<input id='Captura_0' type='text' name='captura0-form'>
				</div>
				<div class='input-field col s12 m11 l12'>
					<label for='Captura_0_mini' style='font-size: 14px;' >Captura 0 mini</label>
					<input id='Captura_0_mini' type='text' name='captura0-mini-form'>
																
				</div>

				<div class='input-field col s12 m11 l12'>
					<label for='Banner' style='font-size: 14px;' >Banner</label>
					<input id='Banner' type='text' name='banner-form'>
																	
				</div>

				<div class='input-field col s12 m11 l12'>
					<label for='Banner_mini' style='font-size: 14px;' >Banner mini</label>
					<input id='Banner_mini' type='text' name='banner-mini-form'>
																	
				</div>
				<div class='input-field col s12 m11 l12'>
					<label for='Captura 1' style='font-size: 14px;' >Captura 1</label>
					<input id='Captura 1' type='text' name='captura1-form'>																
				</div>
									
				<div class='input-field col s12 m11 l12'>
					<label for='Captura_2' style='font-size: 14px;' >Captura 2</label>
					<input id='Captura_2' type='text' name='captura2-form'>																
				</div>
									
				<div class='input-field col s12 m11 l12'>
					<label for='Captura_3' style='font-size: 14px;' >Captura 3</label>
					<input id='Captura_3' type='text' name='captura3-form'>																	
				</div>
									
				<div class='input-field col s12 m11 l12'>
					<label for='Captura_4' style='font-size: 14px;' >Captura 4</label>
					<input id='Captura_4' type='text' name='captura4-form'>																	
				</div>
				<?php echo $formulario;?>				
				<div class='input-field col s3 m3' style="margin-top: 30px;">
					<label style='font-size: 14px; ' >Peso</label>
					<input id='peso' class='peso-form' type='number' name='peso-form' >						          	
				</div>
				<div class='input-field col s6 m3'>
					<p>
						<input id="test2" class="pesoo-form with-gap" type="radio" name="pesoo-form" checked  value=" GB" />
					    <label for="test2">GB</label>
					    <input type="radio" id="test1" class="pesoo-form with-gap" name="pesoo-form" value=" MB" />
					    <label for="test1">MB</label>					      
					</p>
				</div>
				
				<div class="input-field col s12">	
					<label class="active" style="top:8px;font-size: 14px;">Descripcion</label>		
					<textarea  class="descripcion-form" placeholder="De que Trata el Juego" name="descripcion-form" ></textarea>						
				</div>				

				<div class="input-field col s12">
					<label>Fecha Actual</label>						
					<input class="datepicker" type="date" name="fecha-form" value="<?php echo date("Y-m-d"); ?>">
				</div>
					
				<div class="input-field col s12 m6">
					<label class="active" style="top:8px;font-size: 14px;">Link descarga</label>	
					<textarea  class="link-form" name="link-form" ></textarea>											
				</div>	
				
				<div class="input-field col s12">
					<label>Link pagina</label>					
					<input type="text" name="link-pagina-form">												
				</div>
				<div class='input-field col s12 m6 '>
					<label >Password</label>				          	
					<input  type='text' name='password-form'>						          	
				</div>	

				<div class="col s12">
					<a id="VISTA-PREVIA" type="submit"  class="waves-effect waves-light btn color_b"><i class="material-icons left">rate_review</i>vista previa</a>						
				</div>
				<div class="col s12 load" style="margin-top: 30px;">
				<label>Cargando</label>
					<div class="progress blue lighten-3" >
      					<div class="determinate color_b" style="width: 0%" ></div>
  					</div>
  				<label class="tamañoo"></label>
				</div>											
			</div>	<!-- row -->	
		</form>			
	</div>

	<div class="col s12 z-depth-1 white center-align vista_pre" style="margin-top: 20px; padding-bottom: 20px;">
	ddddd
	</div>	
	<div class="col s12 z-depth-1 white" style="margin-top: 20px; padding-bottom: 10px;padding-top: 10px;">
		<div class="col s12 m6 center-align" >
			<a id="guardar" type="submit"  class="waves-effect waves-light btn color_b"><i class="material-icons left">save</i>Guardar entrada</a>	
		</div>		
		<div class="col s12 m6 guardar_load center-align " >
		</div>	
	</div>			
</div>
</div><!-- CONTAINER-->

@include('estilos.scripp_mate')
<script src="/estilos/jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    //$('.load').hide();	  
    $('.datepicker').pickadate({
    	selectMonths: true, // Creates a dropdown to control month
    	selectYears: 15 // Creates a dropdown of 15 years to control ye
  	});
///////////////////////////////////////////////////////////////////////////
  	$(document).on('click', '#VISTA-PREVIA', function(e) {			
		<?php echo $link_vista; ?>
		//$('.load').fadeIn();				
		
			var determinate = $('.determinate');
			var tamañoo = $('.tamañoo');
			tamañoo.text('Esperando Respuesta');
			$('#formuploadajax').ajaxSubmit({					               
	            beforeSubmit: function() {	                	
	                var percentVal = '0%';
				    determinate.width(percentVal);					
	            },
	            uploadProgress: function(event, position, total, percentComplete) {
				    var percentVal = percentComplete + '%';
				    determinate.width(percentVal).html(percentVal);				               
					console.log(percentVal, position/1000, total/1000);						
					tamañoo.text(Math.round(position/1000)+' kbs  de '+Math.round(total/1000)+' kbs');
				},
				success: function(data) {				 	
				 	//$('.loadd').hide();
				    //$('.vista-row').fadeIn();
				    var percentVal = '100%';
				    determinate.width(percentVal)
				    tamañoo.text('LISTO');				      
				    $(".vista_pre").html(data);				    					
					//$("html, body").animate({ scrollTop:$('.titulo-vista').offset().top }, 1000);
				},
				error:function() {				   	
					$(".titulo-vista").html('Error al subir las imagenes');		
				}	               
	        }) //ajax */          
				
	});//vista preva
	$(document).on('click', '#guardar', function(e) {			
		<?php echo $link_guardar;?>			
			$('#formuploadajax').ajaxSubmit({					               
	            beforeSubmit: function() {	
	               	$('#guardar').attr('disabled', 'disabled');
	            	$(".guardar_load").html('<h5>Gaurdando...</h5><div class="progress blue lighten-3" ><div class="indeterminate color_b" style="width: 0%" ></div></div>');		                	
	            },
	            /*uploadProgress: function(event, position, total, percentComplete) {
				    var percentVal = percentComplete + '%';
				    determinate.width(percentVal).html(percentVal);				               
					console.log(percentVal, position/1000, total/1000);						
					tamañoo.text(Math.round(position/1000)+' kbs  de '+Math.round(total/1000)+' kbs');
				},*/
				success: function(data) {
					$('#guardar').remove();				 	
	            	$(".guardar_load").html(data);
	             },
				error:function() {								   	
					$(".guardar_load").html('error al cargar');		
				}	               
	        }) //ajax */          
				
	});//vista preva
});//jquery
</script>
 <style type="text/css">
   
 </style>
</body>
</html>