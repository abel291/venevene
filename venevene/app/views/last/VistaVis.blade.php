<!DOCTYPE html>
<html lang="es">
<head>
	<?php echo $meta ?>
	@include('estilos.head')
	<title><?php echo $title ?></title>
</head>
<body><br><br><br>
<div class="container  ">
	<div class="col-xs-12">
		<div class="row">
			<div class="  col-xs-12 ">
				<div id="carousel_prin" class="carousel slide temaa " data-ride="carousel">
		            <!-- Wrapper for slides -->
		           	<div class="carousel-inner" role="listbox">    
		                <?php echo $carousel ?>			
		            </div>
		            <!-- Controls -->
		            <a class="left carousel-control" href="#carousel_prin" role="button" data-slide="prev">
		                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		                <span class="sr-only">Previous</span>
		            </a>
		            <a class="right carousel-control" href="#carousel_prin" role="button" data-slide="next">
		                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		                <span class="sr-only">Next</span>
		            </a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 ">	
			@include('estilos.menu')	
			</div>
		</div><!--row-->
	<!--*****************************************************************************************-->
		<div class="row ">
			<div class="  col-xs-12 col-sm-12 col-md-9 col-lg-9 center    ">
				<div class="panel  sombra_generic ">         
	          		<div class="panel-body fondo ">
		          		<ol class="breadcrumb ">
							<li><a href='/'>Inicio</a></li>
					  		<?php echo $breadcrumb ?>
						</ol>				
						<?php echo $item ?>				
						<div class="comparte">
						<label class="label label-default">Comparte para ver el link <span class="glyphicon glyphicon-arrow-right"></span> </label>
						 <a class="face label label-primary" 
								href="javascript: void(0);" 
							 	onclick=" javascript:AbrirCentrado('http://www.facebook.com/sharer.php?u=http://venecompu.esy.es/<?php echo urlencode($facebook)?>','Comparte','700','500','scrollbars=1');">
							 	<div class="facee "><b>f</b></div> <b > compartir</b>
							 </a>			
						 	o espera <label class="contadorr">100</label> Seg
						</div>
						<br><br>
						<fieldset  >
							<legend class="temaa"> Articulos Relacionados</legend>
							<?php echo $recomendados; ?>
						</fieldset>	
					</div>
				</div>						
			</div>
			
			<div class=" col-xs-12 col-sm-6 col-sm-offset-3 col-md-3 col-md-offset-0 col-lg-3">

				@include('estilos.lado')
				
				<?php echo $recientes_juegos; ?>
				
				<?php echo $recientes_peliculas; ?>
				
				<?php echo $recientes_series;?>
				
				<div class="list-group">
	    			<a class="list-group-item active">
	        			<b>Comentarios</b>
	    			</a>			
					<div class="list-group-item">		
						<div >   
	                		<canvas id="barra_co" width="200" height="200" ></canvas>        
	            		</div>
	            		<div class=" grafico_leyenda">
	                		<span class="glyphicon glyphicon-stop color_amarillo"></span> 
	                		Pregunta(<?php echo $dona_pre; ?>)
	                		<br>                		
	                		<span class="glyphicon glyphicon-stop color_rojo_wa"></span> 
	                		Inconveniento(<?php echo $dona_inco; ?>)
	                		<br> 		
	                		<span class="glyphicon glyphicon-stop color_azul"></span> 
	                		Agradecimiento(<?php echo $dona_agra; ?>)
	                		<br>                		
	                		<span class="glyphicon glyphicon-stop "></span> 
	                		Total(<?php echo $dona_total; ?>) 
	                	</div>
	            	</div>
	           </div>												
			</div>		
		</div>
	<!--*****************************************************************************************-->
		<div class="row ">
			<div class="  col-xs-12 col-sm-12 col-md-9 col-lg-9 ">	
				<div class="panel">
					<div class="panel-body sombra_generic fondo">
						<form class="form-horizontal form-comentario">
							<h3 class="page-header"><b>COMENTA</b> (<?php echo $title; ?>)</h3>					
							<div class="form-group">
								<label for="formGroup" class="col-xs-2 control-label"> Nombre </label>
								<div class="col-xs-4">
									<input type="text" maxlength="20" class="form-control nombre-form" name='nombre-form'  required>
								</div>
							</div>
							<div class="form-group">
								<label for="formGroup"  class="col-xs-2  control-label"> Correo</label>
								<div class="col-xs-6">
									<input type="email" maxlength="20" class="form-control correo-form" name="correo-form"  >
								</div>
							</div>					
							<div class="form-group">
								<label for="formGroup" class="col-xs-2  control-label">Tipo de Comentario</label>
								<div class="col-xs-9">
									<label class="radio-inline">
										<input type="radio" name="tipo-form" class='tipo-form' id="inlineRadio1" value="Pregunta">
										<span class="label label-warning "> <span class='glyphicon glyphicon-question-sign'></span> Pregunta</span>
									</label>
										
									<label class="radio-inline">
										<input type="radio" name="tipo-form" checked="true"class='tipo-form'  id="inlineRadio2"  value="Agradecimiento">
										<span class="label label-info "><span class='glyphicon glyphicon-thumbs-up'></span> Agradecimiento </span>
									</label>
										
									<label class="radio-inline">
										<input type="radio" name="tipo-form" class='tipo-form' id="inlineRadio3" value="Inconveniente">
										<span class="label label-danger "><span class='glyphicon glyphicon-remove-sign'></span> Inconveniente</span>
									</label>
								</div>
							</div>
							<div class="form-group">
								<label for="formGroup" class="col-xs-2  control-label">Comentario</label>
								<div class="col-xs-10">
									<textarea class="form-control text-form" maxlength="500" name="comentario-form"></textarea>
								</div>
							</div>
							<div style="text-align: right;">								
								<button  class="btn btn-color blanco comentario-button"   >  
									<span class="icon-bubbles3"></span> Enviar 
								</button>										
							</div>
							<div class="col-xs-8">				
								<label class="estado"></label>											
							</div>							
						</form>	
						<br>
						<br>
						<br>
						<h3 class="page-header"><b>COMENTARIOS</b> </h3>	
						<div class="col-xs-12  comentarios" >
						<div id="disqus_thread"></div>
<script>
var disqus_config = function () {
this.page.url = <?php echo $comentarios;  ?>;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//venecompu.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                
						
						</div>	
															
					</div>
				</div>		
			</div>		
		</div><!--row-->
	
		
	</div>			
</div><!--container-->
@include('estilos.pie de pagina')

@include('estilos.scripp')
<script type="text/javascript">
function AbrirCentrado(Url,NombreVentana,width,height,scrollbars) {
var largo = width;
var altura = height;
var top = (screen.height-altura)/2.8;
var izquierda = (screen.width-largo)/2.8; nuevaVentana=window.open(''+ Url + '',''+ NombreVentana + '','width=' + largo + ',height=' + altura + ',top=' + top + ',left=' + izquierda  + ',scrollbars=1');
nuevaVentana.focus();
}

	$(document).ready(function() {

		
		$('.link').hide();

		function segundoss(){
			var contadorr= $('.contadorr').text();
			if (contadorr==0){
				$('.comparte').remove();
				$('.link').fadeIn();
			}else{
			$('.contadorr').text(contadorr-1);
		}}
		setInterval(segundoss, 1000);

		$(document).on('click', '.face', function(event) {
			event.preventDefault();
			$('.comparte').remove();
				$('.link').fadeIn();
		});
		
		$(document).on('click', '.comentario-button', function(a) {
			var nombre=$('.nombre-form').val();
			var correo=$('.correo-form').val();
			var textt=$('.text-form').val();
			a.preventDefault();
			if (textt=="" || correo=="" || nombre=="") {
			$('.estado').html('<b> Algun campo esta vacio</b>');
			}else{				
				$('.comentario-button').html("<img src='/imagenes/333.gif' > Cargando...");
				var id_titulo = $('.titulo-vista').attr('id');			
				var datos = $('.form-comentario').serialize();			
				$.ajax({
					url:'/comentario/agregar/'+id_titulo,
					type:'post',
					dataType:'json', 
					data:datos
				}).done(function(data){
					$("textarea[name='comentario-form']").val("");		
					$('.comentarios').prepend(data);				
					$('.comentario-button').html(" <span class='glyphicon glyphicon-ok-sign'></span> Listo");
					$('.comentario-button').attr('disabled', 'disable');
					$('.estado').text('');
				})
			}//if
		});//comentario-button		
		$(document).on('click', '.juegos ,.peliculas', function(b) {
			b.preventDefault();
			var jp=$(this).attr('class');
			var titulo=$(this).attr('id');
			$('.pagina_roja a').html('<img src="/imagenes/333.gif"> Cargando ');

			$.ajax({
				url: '/comentario/vista/'+titulo,
				type: 'POST',
				dataType: 'json',
				data: {jp: jp},
			})
			.done(function(ddd) {
				$('.comentarios').html(ddd.comentarios);
				$('.pagination').html(ddd.pagination);
			})
			.fail(function() {
				$('.pagina_roja a').html('Error');
			});
		
		
		});

		var comentarios = {
        labels : [""],
        datasets : [
          {label: "My First dataset",
            fillColor : "#f39c12",
            strokeColor : "#ffffff",
            highlightFill: "#f1c40f",
            highlightStroke: "#ffffff",
            data : [<?php echo $dona_pre; ?>]
          },
          {label: "My First dataset",
            fillColor : "#c0392b",
            strokeColor : "#ffffff",
            highlightFill : "#e74c3c",
            highlightStroke : "#ffffff",
            data : [<?php echo $dona_inco; ?>]
          },
          {label: "My First dataset",
            fillColor : "#5BC0DE",
            strokeColor : "#ffffff",
            highlightFill : "#7AD3EE",
            highlightStroke : "#ffffff",
            data : [<?php echo $dona_agra; ?>]
          }]
      }
	var ctx = document.getElementById("barra_co").getContext("2d");
	window.myPie = new Chart(ctx).Bar(comentarios, {responsive:true});


});//ready
	function popup(url,ancho,alto) {
var posicion_x; 
var posicion_y; 
posicion_x=(screen.width/2)-(ancho/2); 
posicion_y=(screen.height/2)-(alto/2); 
window.open(url, "leonpurpura.com", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
}


</script>

</body>
</html>