<!DOCTYPE html>
<html lang="es">
<head>	
<?php echo $meta; ?>
@include('estilos.head_mate')
<title> <?php echo $title; ?> </title>
</head>
</head>
<body >
@include('estilos.menu')
<br>
<div class="container ">
	<div class="row  ">
		<div class="col s12 z-depth-1 color_b" style="padding: 10px;">
		<h6 class="white-text">Quizás te interese...</h6>
			<?php echo $carousel ?>
		</div>
	</div>

	<div class="row  ">		
		<div class="col s12 m12 l9 z-depth-1 white center-align" style="margin-bottom: 20px; padding: 0px 30px ;">			
			<ol class="breadcrumb ">
				<li><a href='/'>Inicio</a></li>
				<?php echo $breadcrumb; ?>				  		
			</ol>				
    		<?php echo $item; ?><br>    				
  			<br><br>
		</div>
		<div class="col s12 m5 l3 " style="padding: 0 0 0 .75rem ; " >		   
		    
		     @include('estilos.lado')
		     <div class="collection z-depth-1">
          	<a class="color_b collection-item  active " style="font-size: 16px; "> <span class='icon-pacman'> </span> Juegos Recientes</a>       
        	<?php echo $recientes_juegos; ?>	
       		</div>
       		<div class="collection z-depth-1">
       		<a class="color_b collection-item  active " style="font-size: 16px; "> <span class='icon-film'> </span> Peliculas Recientes</a>       
        	<?php echo $recientes_peliculas; ?>	
       		</div>
       		<div class="collection z-depth-1">
       		<a class="color_b collection-item  active " style="font-size: 16px; "> <span class='icon-file-video'> </span> Series Recientes</a>       
        	<?php echo $recientes_series; ?>	
       		</div>
		    
    	</div>
	</div>

	<div class="row">
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