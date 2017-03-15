<!DOCTYPE html>
<html lang="es">
<head>	
@include('estilos.head_mate')
<meta property="og:description" content="Aqui Podras Descargar todo lo que quieras Series,Peliculas,Juegos y Mas" />
<meta property="og:title" content="Venecompu | Entretenimiento" />
<meta property="og:image" content="http://venecompu.esy.es/imagenes/logo-facebook.png" />
<meta property="og:url" content="http://venecompu.esy.es/"/>
<meta property="og:site_name" content="Venecompu"/>
<meta property="fb:admins" content="1569988333299991" />
<title> Vene | Principal </title>
</head>
</head>
<body>

@include('estilos.menu')
<div class="row">
    <div class="col s12  l6 thuu" style="padding: 0px 0px;background: #ccc ;line-height: 0px;" >
    <?php echo $banner; ?>
	</div>
    <div class="col s6 hide-on-med-and-down " style="padding: 0px 0px;">	
		
    	<div class="col s12  l6 thuu" style="padding: 0px 0px;">
		<?php echo $thumb_1; ?>
    	</div>
    	<div class="col s12  l6 thuu" style="padding: 0px 0px;">
    	<?php echo $thumb_2; ?>
		</div>
    	<div class="col s12  l6 thuu" style="padding: 0px 0px;">
		<?php echo $thumb_3; ?>
		</div>
		<div class="col s12  l6 thuu" style="padding: 0px 0px;">  
		<?php echo $thumb_4; ?>
		</div>
			
		
	</div>        	
</div>

<div class="container">
 	<div class="row  "> 	
    	<div class="col s12 m12 l9 z-depth-1 white" style="margin-bottom: 10px;">

	      	<ul class="tabs ">
	        	<li class="tab col s4"><a class="color_l" style="font-size: 18px;" class="active" href="#test1"><b> <i class="material-icons">videogame_asset</i> JUEGOS</b></a></li>
	        	<li class="tab col s4"><a class="color_l" style="font-size: 18px;"  href="#test2"><b> <i class="material-icons">movie</i> PELICULAS</b></a></li>
	        	<li class="tab col s4"><a class="color_l" style="font-size: 18px;" href="#test3"><b> <i class="material-icons">local_movies</i> SERIES</b></a></li>        
	      	</ul>
		    <div id="test1" class="col s12 " style="padding-bottom: 10px; ">
		    	<?php echo $juegos; ?>
		    	
		    	<div class="col s12 center-align">
		    		<a href="/menu/juegos" class="color_b waves-effect waves-light btn"> VER MAS</a>
		    	</div>

		    </div>
		    <div id="test2" class="col s12 " style="padding-bottom: 10px; ">
		    	<?php echo $peliculas; ?>
		    	
		    	<div class="col s12 center-align">
		    		<a href="/menu/peliculas" class="color_b waves-effect waves-light btn">VER MAS</a>
		    	</div>

		    </div>
		    <div id="test3" class="col s12 " style="padding-bottom: 10px; "> 
				<?php echo $series; ?>
				
				<div class="col s12 center-align">
					<a href="/menu/series" class="color_b waves-effect waves-light btn">VER MAS</a>
				</div>

		    </div>
    	</div>

		<div class="col s12 m12 l3" >
		@include('estilos.lado')

		<div class="collection z-depth-1" >
          	<a class="color_b collection-item  active " style="font-size: 16px; "> <i class='material-icons left'>fiber_new</i> Noticias</a>       
        	<?php echo $noticia; ?>
       	</div>	
	    
	    
    	</div>
	</div>
</div>
@include('estilos.footer')
@include('estilos.scripp_mate')
</body>
</html>
