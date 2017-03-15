<!DOCTYPE html>
<html lang="es">
<head>	
<?php echo $meta; ?>
@include('estilos.head_mate')
<title> <?php echo $title; ?> </title>
</head>
</head>
<body>
@include('estilos.menu')
<br>
<div class="container ">
	<div class="row  ">
		<div class="col s12 z-depth-1 color_b" style="padding: 10px;">
		<h5 class="white-text">Quizás te interese...</h5>
			<?php echo $carousel ?>
		</div>
	</div>
	<div class="row " >		
		<div class="col s12 m12 l9 z-depth-1 white center-align">
			
			<ol class="breadcrumb color_l">
				<li><a class='color_l' href='/'>Inicio</a></li>
				<?php echo $breadcrumb; ?>				  		
			</ol>				
    		<?php echo $item; ?><br>
    		<br><br>
    		<fieldset  >
				<legend class="color_b"> Entradas Relacionados</legend>
				<?php echo $recomendados; ?>
			</fieldset>			
  			
		</div>
		<div class="col s12 m5 l3 " style="padding: 0 0 0 .75rem ;" >		    
		     @include('estilos.lado')
		     <div class="collection white">
          	<a class="color_b collection-item  active " style="font-size: 16px; margin-bottom: 5px; "> <i class="material-icons left">videogame_asset</i> Juegos Recientes</a>     
        	<?php echo $recientes_juegos; ?>	
       		</div>

       		<div class="collection white">
       		<a class="color_b collection-item  active " style="font-size: 16px; margin-bottom: 5px; "> <i class="material-icons left">movie</i> Peliculas Recientes</a>       
        	<?php echo $recientes_peliculas; ?>	
       		</div>

       		<div class="collection white">
       		<a class="color_b collection-item  active " style="font-size: 16px;  margin-bottom: 5px;"> <i class="material-icons left">local_movies</i>  Series Recientes</a>       
        	<?php echo $recientes_series; ?>	
       		</div>		    
    	</div>
	</div>

	<div class="row" >
		<div class="col s12 m12 l9 z-depth-1 white" >
			<h5 >Comentarios</h5>
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
<script id="dsq-count-scr" src="//EXAMPLE.disqus.com/count.js" async></script>
@include('estilos.footer')
@include('estilos.scripp_mate')
</body>
</html>