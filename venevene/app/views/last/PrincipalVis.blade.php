<!DOCTYPE html>
<html lang="es">
<head>	
<meta property="og:title" content="Venecompu" />
<meta property="og:description" content="Aqui Podras Descargar todo lo que quieras Series,Peliculas,Juegos y Mas" />
<meta property="og:image" content="http://venecompu.esy.es/imagenes/logo-facebook.png" />
<meta property="og:url" content="http://venecompu.esy.es/"/>
<meta property="og:site_name" content="Venecompu"/>
<meta property="fb:admins" content="" />
@include('estilos.head')
<title> Vene | Principal </title>
</head>
<body>
<div class="container    ">			
		<br>					
		<!--/////////////////////////////////////////////////////////////////////-->			
		<div class="col-xs-12">
			<div class="row ">
				<div class=" col-xs-12 col-sm-12 col-md-9 col-lg-9 ">
						<div id="myCarousel" class="carousel slide   sombra_generic" data-ride="carousel">					  
							<div class="carousel-inner" role="listbox">
							    
							    <div class="item ">
							      	<?php echo $banner_juegos ?>					
							    </div>

							    <div class="item active">
							      	<?php echo $banner_peliculas ?>
							    </div>

							    <div class="item">
							     	<?php echo $banner_series ?>
							    </div>						    
							</div>	  		
								<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								    <span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								    <span class="sr-only">Next</span>
								</a>
						</div>
				</div>
				
				<div class=" hidden-xs  hidden-sm col-md-3">
					<?php echo $poster_derecho ?>
				</div>
			</div>	
				
		<!--/////////////////////////////////////////////////////////////////////-->
			<div class="row center ">
				<?php echo $thumb_juegos ?>
				<?php echo $thumb_peliculas ?>
				<?php echo $thumb_series ?>					  
			</div>
			
		<!--/////////////////////////////////////////////////////////////////////-->
		<div class="row">
			<div class="col-xs-12 ">
				@include('estilos.menu')
			</div>
		</div><!--<row-->	
			<div class="row ">
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 ">
					<div class="panel  sombra_generic ">         
	          			<div class="panel-body fondo ">
					  	<!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
						    <li role="prensen" > 
						    	<a href="#juegos" class="label_tab color_temaa" role="tab" data-toggle="tab"> <label class="label_tab color_temaa" >
						    	 <span class="icon-pacman "></span> Juegos 
						    	 </label>
								</a>
						    </li>
						    <li role="prensen" class="active" >
						    <a href="#peliculas" class="label_tab color_temaa"  role="tab" data-toggle="tab"><label class="label_tab color_temaa" > <span class="icon-film"></span> Peliculas
						     </label></a></li>
						    <li role="prensen">
						    <a href="#series" class="label_tab color_temaa" role="tab" data-toggle="tab"> <label class="label_tab color_temaa" >
						     <span class="icon-file-video"></span>Series 
						     </label></a></li>
						    
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content ">
						    <div role="tabpanel" class="tab-pane fade " id="juegos">
						    	<br><?php echo $juegos; ?> 
						    	<div class="col-xs-12" style="text-align: right;">
						    		<a  href="/menu/juegos" class="btn temaa blanco sombra_generic"> Ver mas...</a>  
						    	</div>  

						    </div>
						    <div role="tabpanel" class="tab-pane  active " id="peliculas">
						    	<br><?php echo $peliculas; ?> 
						    	<div class="col-xs-12" style="text-align: right;">
						    		<a  href="/menu/peliculas" class="btn temaa blanco sombra_generic"> Ver mas</a>  
						    	</div>  
						    </div>
						    <div role="tabpanel" class="tab-pane fade " id="series">
						    	<br><?php echo $series; ?> 
						    	<div class="col-xs-12" style="text-align: right;">
						    		<a  href="/menu/series" class="temaa blanco sombra_generic"> Ver mas</a>  
						    	</div>    
						    </div>
						    
						  </div>
						</div>	
					</div>
				</div>	
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-3 col-md-offset-0">
					<div class="hidden-lg">
						<div class="panel  sombra_generic ">
						<div  class="panel-heading temaa blanco">
        					<span class='icon-share2'> </span> <b>Buscas algo?</b>
    					</div>
	          			<div class="panel-body fondo ">
							<form class=" " action="/buscar" method="post" >
								<input type="text" name="titulo" class="form-control" placeholder="Titulo" required style="margin-bottom: 10px;"> 				
								<select name='jp' class="select_control" >
						    		<option value='juegos'>Juego</option>
						    		<option value='peliculas'>Peliculas</option>
						    		<option value='series'>Series</option>
						    	</select>
								<button type="submit" class="btn temaa blanco">
									<span class='glyphicon glyphicon-search' ></span>
								</button>
							</form>	
						</div>								
					</div>
					</div>
					@include('estilos.lado')
					<?php echo $noticia; ?>				
				</div>								
			</div>
			
		</div>	
</div><!--container-->
@include('estilos.pie de pagina')
@include('estilos.scripp')
</script>
</body>
</html>