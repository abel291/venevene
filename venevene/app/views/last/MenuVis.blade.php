<!DOCTYPE html>
<html lang="es">
	<head>
	@include('estilos.head')
		<title> Compu | Menu </title>
	</head>	
<body>

<div class="container    ">
	<div class="col-xs-12">
		<div class="row">
		<div class="col-xs-12">
			<div id="carousel_prin" class="carousel slide color_claro sombra_generic" data-ride="carousel">
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
				
			@include('estilos.menu')
		</div>
	</div><!--row-->	
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 center ">			
			<div class='ver_mas fondo sombra_generic    '>														
				<h3 class='titulo_menu'><?php echo $titulo ?></h3>				
				<?php echo $item ?>				
			</div>
			<ul  class="pagination    ">	    
				<?php echo $pagination ?>   
			</ul>
			
			<br>
			<br>
			<br>
			
		</div><!--contenido-->	
		<div class=" col-xs-12 col-sm-6 col-sm-offset-3 col-md-3 col-md-offset-0">
				<?php echo $noticias; ?>
				@include('estilos.lado')
				<!--<div class='list-group '>
				<a  class='list-group-item active'><span class='icon-pacman'> </span><b>Juegos Recientes</b></a>   
				<?php  $recientes_juegos; ?>
				</div>
				<div class='list-group '>
				<a  class='list-group-item active'><span class='icon-film'> </span><b>Series Recientes</b></a>   
				<?php  $recientes_peliculas; ?>
				</div>
				<div class='list-group '>
				<a  class='list-group-item active'><span class='icon-file-video'> </span><b>Peliculas Recientes</b></a>   
				<?php  $recientes_series;?>
				</div>-->
			</div><!--lado-->

	</div><!--row-->
	
	</div>	
</div><!--container-->
@include('estilos.pie de pagina')
@include('estilos.scripp')
</body>
</html>

