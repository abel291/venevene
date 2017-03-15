<!DOCTYPE html>
<html lang="es">
	<head>
	@include('estilos.head')
		<title> Compu | Insertar Noticia </title>
	</head>
<body >
<br><br>
<div class="container">	
	<div class="row ">
		<div class="well_p col-xs-12 col-sm-10 col-sm-offset-1 ">
			<h3 class="page-header"><span class='glyphicon glyphicon-globe color_temaa'> </span> Insertar Noticia</h3>

			<form  class="form-horizontal" enctype="multipart/form-data" id="formuploadajax" action="" method="post" >
				<div class="form-group">
					<label for="formGroup" class="col-xs-12 col-sm-2  col-lg-2  control-label">Titulo de la Noticia</label>
					<div class="col-xs-12  col-sm-10   ">
						<input class="form-control titulo-form" type="text" name="titulo-form" placeholder="Titulo del Juego" value="WW">
					</div>
				</div>

				<div class="form-group">
					<label for="formGroup" class="col-xs-12 col-sm-2 col-lg-2  control-label">Imagen link </label>
					<div class="col-xs-8 col-sm-10">					
						<input class="form-control captura-form" type="text" name="captura-form" ">			
					</div>												
				</div>

				<div class="form-group">
					<label for="formGroup" class="col-xs-12 col-sm-2 col-lg-2 control-label">Categoria</label>
					<div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 ">
						<select name="categoria-form" class="form-control categoria-form">
							<option></option>
							<option value="juegos"> Juegos </option>
							<option value="peliculas"> Peliculas </option>
							<option value="series"> Series </option>								
						</select>
					</div>
				</div>				

				<div class="form-group">
					<label for="formGroup" class="col-xs-12 col-sm-2 col-lg-2  control-label">Noticia</label>
					<div class="col-xs-12 col-sm-10">
						<textarea class="form-control descripcion-form" name="descripcion-form" ></textarea>
					</div>
				</div>			

				<div class="form-group">
					<label for="formGroup" class="col-xs-12 col-sm-2  col-lg-2  control-label"> Referencia </label>
					<div class="col-xs-12  col-sm-10   ">
						<input class="form-control referencia-form" type="text" name="link-form" placeholder="Link de la Noticia Completa">
					</div>
				</div>
					<div class="form-group">
						<div class="col-xs-12 col-sm-10 col-sm-offset-2 ">
							<button type="submit" id="VISTA-PREVIA"  class="btn btn-color blanco" >  <span class="icon-paint-format"></span> Vista Previa Todo</button>
							
							<button type="Reset" class="btn btn-default"><span class="icon-pencil2"></span> Vaciar</button> 
							<div class="ESTATUS_VISTA label label-danger"><span class="glyphicon glyphicon-italic" ></span>No deje campos vacios</div>
						</div>
					</div>

					<div class="form-group loadd">
						
						<div class="col-xs-12 col-sm-10 col-sm-offset-2 ">
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
			<br><br>
			<label class='titulo-vista '> Titulo Noticia </label>
			<br><br>
			<div class='vista_todo center'>
				<img class="captura-vista img-responsive" src="" style="max-width: 800px;max-height: 600px;">						
			</div>						
			<br><br>						
			<fieldset class="descripcion-vista">
			</fieldset>					
			<a class='link-vista' target='_blank' href=''> Ver noticia completa </a><br><br>						
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

@include('estilos.scripp')
<script type="text/javascript">
$(document).ready(function() {
	$('.vista-row,.ESTATUS_VISTA,.loadd,.loadd_guardar').hide();		
/////////////////////////////////////////////////////////////////////////////
$(document).on('click', '#VISTA-PREVIA', function(ee) {
		ee.preventDefault();		
		var image=$(".captura-form").val();		
		$('.vista-row').fadeIn();
		$('.titulo-vista').html($(".titulo-form").val());
		$('.captura-vista').attr('src',$(".captura-form").val());
		$('.descripcion-vista').html("<legend class='temaa' ><span class='icon-file-text'></span> Noticia </legend>	"+$(".descripcion-form").val());
		$('.link-vista').attr('href',$(".link-form").val());
});//#pasar

////////////////////////////////////////////////////////////////////////////
	$('.guardar').click(function(e)
	{
		e.preventDefault();
		$('#formuploadajax').attr('action', '/insertar/noticia/guardar');	    	
		$('.loadd_guardar').fadeIn();				
		$('.progress').html('<div class="progress-bar color_claro progress-bar-striped active" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%</div>')
			var bar = $('.progress-bar');
			var tamañoo = $('.tamañoo');								
			tamañoo.text('Guardando...');
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
				    
					$(".titulo-vista").html('Error');		
				    }	               
	        }) //ajax           
						
	});//#guardar






});//ready//
</script>
</body>
</html>
