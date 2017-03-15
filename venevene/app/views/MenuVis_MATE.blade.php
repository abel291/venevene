<!DOCTYPE html>
<html lang="es">
<head>	
<meta property="og:title" content="Venecompu" />
<meta property="og:description" content="Aqui Podras Descargar todo lo que quieras Series,Peliculas,Juegos y Mas" />
<meta property="og:image" content="http://venecompu.esy.es/imagenes/logo-facebook.png" />
<meta property="og:url" content="http://venecompu.esy.es/"/>
<meta property="og:site_name" content="Venecompu"/>
<meta property="fb:admins" content="" />
@include('estilos.head_mate')
<title> Vene | Menu </title>
</head>
</head>
<body >
@include('estilos.menu')
<br>
<div class="container ">
	<div class="row  ">
		<div class="col s12 z-depth-1 color_b" >		
			<?php echo $carousel ?>
		</div>
	</div>

	<div class="row  ">		
		<div class="col s12 m12 l9 z-depth-1 white center-align ">
			<h5>Menu de <?php echo $jp ?> </h5>
			<?php echo $item ?><br>
			<div class="col s12">
				
				<ul  class="pagination    ">	    
					<?php echo $pagination ?>   
				</ul>
			</div>
			
		</div>
		<div class="col s12 m5 l3 " >		   
		@include('estilos.lado')	          
        <?php echo $noticias; ?>	   
    	</div>
	</div>	
</div>
@include('estilos.footer')
@include('estilos.scripp_mate')
</body>
</html>