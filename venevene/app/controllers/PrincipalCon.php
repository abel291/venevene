<?php 
/*function noticia_principal()
{
	$principal = DB::table('noticias')->orderBy('id_noticias', 'desc')->take(1)->get();	
	$noticia="";
	foreach ($principal as $user)
	{
		$id_titulo=$user->id_titulo;		
		$titulo=$user->titulo;
		$captura0=$user->captura0;	
		$descripcion=$user->descripcion;
		$descripcion=substr("$descripcion",0, 100);				
		$noticia=
		"<a href='/noticias/$id_titulo' class='collection-item color_l'>        
        <div><img class='responsive-img' src='$captura0' alt='$titulo' ></div>
        <div  style='color: black; font-size: 17px;text-align: left;' >$titulo</div>
        <div style='color: black; font-size: 12px;text-align: left;'><p >$descripcion...</p></div>
        </a>";		
	}
	return $noticia;
}
/*function banner_prin($jp)
{
	
	$banner_prin = DB::table("entradas")->orderBy("id_entradas", 'desc')->where('jp','LIKE',"%$jp%")->skip(0)->take(1)->get();
	$item="";
	foreach ($banner_prin as $user)
	{
		$id=$user->id_titulo;
		$titulo=$user->titulo;
		$banner=$user->banner;
		$peso=$user->peso;
		
		$item=$item.
		"
		
    	<a href='/peliculas/$id' style='position: relative;'> 
		<div class='card z-depth-0' style='margin: 0px;'>
            <div class='card-image'>
              <img class='responsive-img' src='$banner' alt='$titulo' style='width: 100%;'>
              <span class='card-title' style='text-shadow: 1px 1px 2px black;'><h4>$titulo</h4></span>
            </div>
            </div>
            </a>
    	";
	}	
	return $item;
}*/
function thumbnail_prin($jp,$posi)
{
	$thumbnail_prin = DB::table("capturas")
	->where('jp','LIKE',"%$jp%")
	->skip("$posi")
	->take(1)
	->orderBy("id_capturas", 'desc')->get();		
	$item="";	
	foreach ($thumbnail_prin as $user)
	{	
		$icon='';
		switch ($jp) {
			case 'juegos':
			$icon='videogame_asset';	
			break;
			case 'peliculas':
			$icon='movie';		
			break;
			case 'series':
			$icon='local_movies';		
			break;
		}
		$id=$user->id_titulo;			
		$titulo=$user->titulo;
		$banner_mini=$user->banner_mini;
		$item=$item.
		"<a href='$jp/$id' style='position: relative;'> 
			<div class='card z-depth-0' style='margin: 0px;'>
	            <div class='card-image'>
	              <img class='responsive-img' class='' src='$banner_mini'>
	              <span class='card-title' style='text-shadow: 1px 1px 2px black;'><i class='material-icons' style='vertical-align: middle;'> $icon</i>$titulo</span>
	            </div>
           	</div>
         </a>";
		
	}	
return $item;
}
function principal($jp){
	
	$principal = DB::table("entradas")	
	->orderBy("id_entradas", 'desc')
	->where('jp','LIKE',"%$jp%")
	->skip(0)
	->take(12)
	->get();	
	$item="";
	foreach ($principal as $user)
	{
		$id=$user->id_titulo;			
		$aa=$user->titulo;		
		$captura0_mini=$user->captura0_mini;					
		$peso=$user->peso;
		$descripcion=$user->descripcion;
		$descripcion=substr("$descripcion",0, 250);
		
		$buscar = "blogspot";		
		if($captura0_mini ==! ""){
		 	$resultado = strpos($captura0_mini, $buscar);		 
			if($resultado === FALSE){
		    	$captura0_mini="/capturas/miniaturas/$captura0_mini";
			}   
		}						
		$item=$item.
		"
			<div class='col s6 m4 l3 '>
	    		<div class='card z-depth-2  '>
					<a href='/$jp/$id'  >	
					   	<div class='card-image '>
					     	<img   src='$captura0_mini' >
					    </div>	
					    <div class=' hide-on-med-and-down hover_vantana z-depth-2  '>
							<h5>$aa</h5>							
							$descripcion...	<br>
							<label class='color_b'>$peso</label>	
							<br>
												
						</div>
					</a>
				</div>
	    	</div>

		";	
		/*<div class='col-xs-6 col-sm-3'>
				<a href='/$jp/$id' >				     
					<div class=' thum'>								
						<img src='$captura0_mini'  class=' img-responsive thumm'>								      	
						<div class='tool  hidden-xs '>
							<h4><b>$aa</b></h4>							
							$descripcion...<br>							
							<div class=' caption-mio  '>								
								<span class='label temaa'> <span class='glyphicon glyphicon-hdd blanco'> </span> $peso</span><br>							
							</div>											
						</div>								      
					</div>
				</a>
		</div>*/			
	}		
	return $item;
}
class PrincipalCon extends BaseController
{	
	public function Index()	{		
				
		
		$banner_prin = DB::table("capturas")->orderBy("id_capturas", 'desc')->skip(0)->take(1)->get();
		$item="";
		foreach ($banner_prin as $user)
		{	

			$id=$user->id_titulo;
			$titulo=$user->titulo;
			$banner=$user->banner;			
			$jp_banner=$user->jp;
			$icon='';
			switch ($jp_banner) {
				case 'juegos':
				$icon='videogame_asset';	
				break;
				case 'peliculas':
				$icon='movie';		
				break;
				case 'series':
				$icon='local_movies';		
				break;
			}
			$item_banner_principal=$item.
			"<a href='/$jp_banner/$id' style='position: relative;'> 
				<div class='card z-depth-0' style='margin: 0px;'>
		            <div class='card-image'>
		              <img class='responsive-img' src='$banner' alt='$titulo' style='width: 100%;'>
		              <span class='card-title' style='text-shadow: 1px 1px 2px black;'><h4> <i class='material-icons' style='font-size: 30px;vertical-align: middle;'> $icon</i> $titulo</h4></span>
		            </div>
		        </div>
	        </a>";
		}
		switch ($jp_banner) {
			case 'peliculas':
				$thumb_1=thumbnail_prin("juegos",0);
				$thumb_2=thumbnail_prin("peliculas",1);
				$thumb_3=thumbnail_prin("juegos",1);
				$thumb_4=thumbnail_prin("series",0);
			break;

			case 'juegos':
				$thumb_1=thumbnail_prin("peliculas",0);
				$thumb_2=thumbnail_prin("juegos",1);
				$thumb_3=thumbnail_prin("peliculas",1);
				$thumb_4=thumbnail_prin("series",0);
			break;

			case 'series':
				$thumb_1=thumbnail_prin("juegos",0);
				$thumb_2=thumbnail_prin("peliculas",0);
				$thumb_3=thumbnail_prin("juegos",1);
				$thumb_4=thumbnail_prin("peliculas",1);
			break;

			default:
				$thumb_1=thumbnail_prin("juegos",0);
				$thumb_2=thumbnail_prin("peliculas",1);
				$thumb_3=thumbnail_prin("juegos",1);
				$thumb_4=thumbnail_prin("series",0);					
			break;			
		}
		$principal = DB::table('noticias')->orderBy('id_noticias', 'desc')->take(1)->get();	
		$noticia="";
		foreach ($principal as $user)
		{
			$id_titulo=$user->id_titulo;		
			$titulo=$user->titulo;
			$captura0=$user->captura0;	
			$descripcion=$user->descripcion;
			$descripcion=substr("$descripcion",0, 100);				
			$noticia=
			"<a href='/noticias/$id_titulo' class='collection-item color_l'>        
	        <div><img class='responsive-img' src='$captura0' alt='$titulo' ></div>
	        <div  style='color: black; font-size: 17px;text-align: left;' >$titulo</div>
	        <div style='color: black; font-size: 12px;text-align: left;'><p >$descripcion...</p></div>
	        </a>";
	    }
		//$noticia=noticia_principal();
		$juegos=principal("juegos");
		$peliculas=principal("peliculas");
		$series=principal("series");
		//$banner=banner_prin("peliculas");	

		return View::make('Principa_MATE',array(			
			'noticia'=>$noticia,
			'juegos'=>$juegos,
			'peliculas'=>$peliculas,
			'series'=>$series,
			'thumb_1'=>$thumb_1,
			'thumb_2'=>$thumb_2,
			'thumb_3'=>$thumb_3,
			'thumb_4'=>$thumb_4,
			'banner'=>$item_banner_principal,
			
			
			));
	}//GET INDEX	
}//CONTROLLER
?>
