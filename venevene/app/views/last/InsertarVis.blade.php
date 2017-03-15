<!DOCTYPE html>
<html lang="es">
	<head>
	@include('estilos.head_mate')
		<title>vene | Insertar</title>
	</head>
<body  >
<br><br>
<div class="container">	
	<div class="row ">
		<div class="well_p col-xs-12 col-sm-10 col-sm-offset-1 ">
			<h5 style="border-bottom: 1PX #red solid; "><?php echo $titulo ?></h5>
			

			<form  class="form-horizontal " enctype="multipart/form-data" id="formuploadajax" action="" method="post" >
				<div class="form-group">
					<label for="formGroup" class="col-xs-12 col-sm-2  col-lg-2  control-label">Titulo </label>
					<div class="col-xs-12  col-sm-8   ">
						<input class="form-control titulo-form" type="text" name="titulo-form" placeholder="Titulo del Juego" value="ad" >
					</div>
				</div>

				<div class="form-group">
						<label for="formGroup" class="col-xs-12 col-sm-2 col-lg-2  control-label">Fecha de Estreno</label>
						<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3" >
							<input class="form-control Lansamiento-form" type="date" name="Lansamiento-form">
						</div>
					</div>

				<div class="form-group">
					<label for="formGroup" class="col-xs-12 col-sm-2 col-lg-2  control-label">Captura0</label>
					<div class="col-xs-8 col-sm-10">					
						<input class="form-control captura-form" type="text" name="captura0-form" ">			
					</div>												
				</div>	

				<div class="form-group">
					<label for="formGroup" class="col-xs-12 col-sm-2 col-lg-2  control-label">Captura0 Mini</label>
					<div class="col-xs-8 col-sm-10">					
						<input class="form-control captura-form" type="text" name="captura0-mini-form" ">			
					</div>												
				</div>				

				<div class="form-group">
					<label for="formGroup" class="col-xs-12 col-sm-2 col-lg-2  control-label">Banner</label>
					<div class="col-xs-8 col-sm-10">					
						<input class="form-control captura-form" type="text" name="banner-form" ">			
					</div>												
				</div>
				<div class="form-group">
					<label for="formGroup" class="col-xs-12 col-sm-2 col-lg-2  control-label">Banner Mini</label>
					<div class="col-xs-8 col-sm-10">					
						<input class="form-control captura-form" type="text" name="banner-mini-form" ">			
					</div>												
				</div>				

				<?php echo $formulario;?>

				
				<div class="form-group">
					<label for="formGroup" class="col-xs-12 col-sm-2 control-label">Peso</label>
					<div class="col-xs-6 col-sm-3 col-md-2">
						<input class="form-control peso-form" type="number" name="peso-form">
					</div>

					<div class="col-xs-6 col-sm-3">
						<label class="radio-inline">
						  <input class="pesoo-form" type="radio" name="pesoo-form" id="inlineRadio1"  value=" MB"> MB
						</label>
						<label class="radio-inline">
						  <input  class="pesoo-form" type="radio" name="pesoo-form" id="inlineRadio2" checked="true" value=" GB"> GB
						</label>
					</div>
				</div>
				<div class="form-group">
						<label for="formGroup" class="col-xs-12 col-sm-2 col-lg-2  control-label">Descripcion</label>
						<div class="col-xs-12 col-sm-10">
							<textarea class="form-control descripcion-form"placeholder="De que Trata el Juego" name="descripcion-form" ></textarea>
						</div>
					</div>
				<div class="form-group">
						<label for="formGroup" class="col-xs-12 col-sm-2 control-label">Captura 1</label>
						<div class="col-xs-12 col-sm-10 ">
							<input class="form-control" type="text" name="captura1-form" " >
						</div>
						<div class="col-xs-2 col-sm-2 col-md-3 " id="captura1-form">								
						</div>
					</div>

					<div class="form-group">
						<label for="formGroup" class="col-xs-12 col-sm-2 control-label">Captura 2</label>
						<div class="col-xs-12  col-sm-10 ">
							<input class="form-control" type="text"name="captura2-form" a >
						</div>
						<div class="col-xs-2 col-sm-2 col-md-3 " id="captura2-form">								
						</div>
					</div>

					<div class="form-group">
						<label for="formGroup" class="col-xs-12 col-sm-2 control-label">Captura 3</label>
						<div class="col-xs-12 col-sm-10 ">
							<input class="form-control" type="text" name="captura3-form" " >
						</div>
						<div class="col-xs-2 col-sm-2 col-md-3 " id="captura3-form">								
						</div>
					</div>
								
					<div class="form-group">
						<label for="formGroup" class="col-xs-12 col-sm-2 control-label">Captura 4</label>
						<div class="col-xs-12 col-sm-10 ">
							<input class="form-control" type="text" name="captura4-form" " >
						</div>
						<div class="col-xs-2 col-sm-2 col-md-3 " id="captura4-form">								
						</div>
					</div>

					<div class="form-group">
						<label for="formGroup" class="col-xs-12 col-sm-2 col-lg-2  control-label">Fecha Actual</label>
						<div class="col-xs-12 col-sm-5 col-md-4 col-lg-3">
							<input class="form-control fecha-form" type="date" name="fecha-form" value="<?php echo date("Y-m-d"); ?>">
						</div>
					</div>

					<div class="form-group">
						<label for="formGroup" class="col-xs-12 col-sm-2 col-lg-2  control-label">Link de Descarga</label>
						<div class="col-xs-12 col-sm-8">
							<input class="form-control link-form " type="text" name="link-form"  value="https://mega.nz/" placeholder="MEGA,putloker,mediafire...">
						</div>
					</div>		

					<div class="form-group">
						<div class="col-xs-12 col-sm-10 col-sm-offset-2 ">
							<button type="submit" id="VISTA-PREVIA"  class="btn btn-color blanco" >  <span class="icon-paint-format"></span> Vista Previa</button>
							<button type="Reset" class="btn btn-default"><span class="icon-pencil2"></span> Vaciar</button> 
							<div class="ESTATUS_VISTA label label-danger"><span class="glyphicon glyphicon-italic" ></span>No deje campos vacios</div>
						</div>
					</div>

					<div class="form-group loadd">
						<label for="formGroup" class="col-xs-12 col-sm-2 col-lg-2  control-label">Cargando..</label>
						<div class="col-xs-12 col-sm-10 ">
							<div class="progress">
						  	<div class="progress-bar progress-bar-danger" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>	
							</div>
							<div class="tamañoo">0%,0,0</div>	
						</div>
					</div>						
			</form>
		</div>
	</div><!--row-->	
	<br>	
<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->		
	<div class="row vista-row ">
		<div class="well_p col-xs-12 col-sm-10 col-sm-offset-1 center vista">						
		</div>
	</div><!--row-->	
	<br>
	<!--///////////////////////////////////////////////////////////////////////////////////////////////////-->	
	<div class="row vista-row ">
		<div class="well_p col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 vista-row ">
			<div class="col-xs-12 col-sm-6">
				<h4>Guardar </h4>
				<h5 >Al dar guarda el juego se agregara a la base de dato y en minutos parecera el el Menu </h5>
				<button type="submit"  class=" btn btn-color blanco guardar"  >
					<span class="glyphicon glyphicon-floppy-disk"> </span> Guardar  
				</button><br><br>
				<div class="loadd_guardar">
					<div class="progress">
					  	<div class="progress-bar progress-bar-danger" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>	
					</div>
					<div class="tamañoo">0%,0,0</div>					
				</div>	
				<br>
			</div>
			<h4 class="estatus center"></h4>
			<div class="col-xs-12 col-sm-6 center estado">			
			</div>			
		</div>
	</div><!--row-->
	<br>	
</div><!--contenedor-->

<div class="contenedor-carga">	
	<div class="gif well_p col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-lg-2 col-lg-offset-5 center">	
		<img src="/imagenes/482.gif">
		<br>
		<div class="col-xs-10 col-xs-offset-1">
			<div class="progress">
		  	<div class="progress-bar color_claro progress-bar-striped active" role="progressbar"  aria-valuemin="40" aria-valuemax="100" style="width: 0%;">0%</div>	
			</div>
			<div class="tamañoo">0%,0,0</div>			
    	</div>
    	<div class="btn"></div>
	</div>
		<br>
		<h4 ></h4>	
	<div class="fondo-carga"></div>	
</div>

@include('estilos.scripp_mate')
<script type="text/javascript">
$(document).ready(function() {
	$('.vista-row,.ESTATUS_VISTA,.loadd,.loadd_guardar').hide();		
///////////////////////////////////////////////	//////////////////////////////		
	$(document).on('change', 'input[type="file"]', function(event) {
		event.preventDefault();
		var tamaño= ($(this)[0].files[0].size / 1024);
		var id='#'+$(this).attr('name');
		if (tamaño>1000) {
			$(id).html("<label class='label label-danger '>"+Math.round(tamaño)+" kb </label> max 1000 kb " );				
		}
		else{
			$(id).html("<label class='label label-success '>"+Math.round(tamaño)+" kb </label>" );				
		}
	});
/////////////////////////////////////////////////////////////////////////////
	$(document).on('click', '#VISTA-PREVIA', function(e) {			
		e.preventDefault();		
		var ititulo=$(".titulo-form").val();
		/*var idescripcion=$(".descripcion-form").val();			
		var icaptura0=$(".captura0-form").val();
		var ireferencia=$(".referencia-form").val();
		var ifecha=$('.fecha-form').val();	*/

		if (ititulo=='' /*|| ireferencia==''|| idescripcion=='' || icaptura0==''|| ifecha==''*/) {					
			$(".ESTATUS_VISTA").fadeIn('slow/400/fast');
			setTimeout(function(){
			$(".ESTATUS_VISTA").fadeOut('slow/400/fast');	
			}, 1000);						
		}else{						
			<?php echo $link_vista; ?>
		    
		     $('.loadd').fadeIn();				
			$('.progress').html('<div class="progress-bar color_claro progress-bar-striped active" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>')
			var bar = $('.progress-bar');
			var tamañoo = $('.tamañoo');
			tamañoo.text('Esperando Respuesta');
			$('#formuploadajax').ajaxSubmit({					               
	            beforeSubmit: function() {	                	
	                var percentVal = '0%';
				    bar.width(percentVal);					
	            },
	            uploadProgress: function(event, position, total, percentComplete) {
				    var percentVal = percentComplete + '%';
				    bar.width(percentVal).html(percentVal);				               
					console.log(percentVal, position/1000, total/1000);						
					tamañoo.html('<span class="label label-default">'+Math.round(position/1000)+' kbs </span> de <span class="label label-success">'+Math.round(total/1000)+' kbs</span>');
				},
				success: function(data) {				 	
				 	$('.loadd').hide();
				    $('.vista-row').fadeIn();
				    var percentVal = '100%';
				    bar.width(percentVal)				      
				    $(".vista").html(data);				    					
					$("html, body").animate({ scrollTop:$('.titulo-vista').offset().top }, 1000);
				},
				error:function() {				   	
					$(".titulo-vista").html('Error al subir las imagenes');		
				}	               
	        }) //ajax           
		}//if			
	});//#pasar
////////////////////////////////////////////////////////////////////////////
	$('.guardar').click(function(e) 
	{
		e.preventDefault();		
		var ititulo=$(".titulo-form").val();
		/*var idescripcion=$(".descripcion-form").val();			
		var icaptura0=$(".captura0-form").val();
		var ireferencia=$(".referencia-form").val();
		var ifecha=$('.fecha-form').val();*/		

		if (ititulo=='' /*|| ireferencia==''|| idescripcion=='' || icaptura0==''|| ifecha==''*/) {		
			$(".estatus").html('<span class="glyphicon glyphicon-italic" ></span>No deje campos vacios</div>').fadeIn('slow/400/fast');
			setTimeout(function(){
			$(".estatus").fadeOut('slow/400/fast');	
			}, 1000);	
		}else{
			<?php echo $link_guardar;?>		    	
		    $('.loadd_guardar').fadeIn();				
			$('.progress').html('<div class="progress-bar color_claro progress-bar-striped active" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>')
			var bar = $('.progress-bar');
			var tamañoo = $('.tamañoo');								
			tamañoo.text('esperando respuesta');
			$('#formuploadajax').ajaxSubmit({
	            beforeSubmit: function() {	                	
	                var percentVal = '0%';
				    bar.width(percentVal);
					tamañoo.text('0%, 0kb, 0kb');
	                },
	            uploadProgress: function(event, position, total, percentComplete) {
				    var percentVal = percentComplete + '%';
				    bar.width(percentVal).html(percentVal);
					console.log(percentVal, position/1000, total/1000);
					tamañoo.html(' <label class="label label-danger">'+Math.round(position/1000)+' kbs </label> de <label class="label label-success">'+Math.round(total/1000)+' kbs</label>');
				    },
				success: function(dataa) {
				    $('.loadd_guardar').hide();
					$(".estatus").html(dataa);
				    var percentVal = '100%';
				    bar.width(percentVal);
				    },
				error:function() {
				    
					$(".titulo-vista").html('Error al subir las imagenes');		
				    }	               
	        }) //ajax           
		}//if				
	});//#guardar






});//ready//
</script>
</body>
</html>
