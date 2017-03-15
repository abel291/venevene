<?php 
function menu_jp($jp,$pagina,$genero) {
	
	$numero_item=16;
	$inicio=($pagina *$numero_item)-$numero_item; 	
 	$id_pj="id_".$jp;
	$item="";	
	
	switch ($jp) {			
		case 'noticias':			
			$menu = DB::table("noticias")->orderBy("id_noticias", 'desc')->where('tipo','like',"%$genero%")->skip($inicio)->take($numero_item)->get();
			$menu_filas =DB::table("noticias")->where('tipo','like',"%$genero%")->count();
			if ($menu_filas==0) {
				$item="<label >Sin Resultados</label>";
			} else 
			{				
				foreach ($menu as $user)
				{								
					$id_titulo=$user->id_titulo;					
					$titulo=$user->titulo;					
						
					$captura0=$user->captura0;												
					$descripcion=$user->descripcion;	
					$tipo=$user->tipo;	
					
					switch ($tipo) {
						case 'peliculas':
							$tipo="<span class='label temaa '><span class='icon-film  blanco'></span> $tipo</span>";
						break;								
						case 'juegos':
							$tipo="<span class='label temaa '><span class='icon-pacman  blanco'></span> $tipo</span>";
						break;								
						case 'series':
							$tipo="<span class='label temaa '><span class='glyphicon  glyphicon-grain blanco'></span> $tipo</span>";
						break;							
						default:
							$tipo="<span class='label temaa '><span class='glyphicon glyphicon-asterisk  blanco'></span> $tipo</span>";
						break;
					}		
					$item=$item.	
					"<div class='col s12 m6 '>
						<div class='card z-depth-1 grey lighten-3  '>
							<a href='/noticias/$id_titulo'>
								<div class='card-image'>
	        						<img class='responsive-img' src='$captura0' alt='$titulo' >	        						
	        					</div>
	        					<div class='card-content left-align' style='padding: 10px ;color:black;'>
				          			<span class='card-title' style='font-size: 18px;font-weight: 400;line-height: 25px;margin-bottom: 0px;'>$titulo</span>
				        		</div>				
        					</a>
						</div>
					</div>
					";
				}
			}
		break;	
		default:
		switch ($jp) {
			case 'juegos':
				$menu = DB::table('entradas')
				->orderBy('id_entradas', 'desc')
				->where('jp', $jp)
				->where('genero','like',"%$genero%")
				->skip($inicio)
				->take($numero_item)->get();
				
				$menu_filas =DB::table('entradas')
				->where('jp', $jp)
				->where('genero','like',"%$genero%")
				->count();
			break;
			case 'peliculas':
			case 'series':
				$menu = DB::table('entradas')
				->orderBy('id_entradas', 'desc')
				->where('jp', $jp)
				->where('I_G','like',"%$genero%")
				->skip($inicio)
				->take($numero_item)->get();
				
				$menu_filas =DB::table('entradas')
				->where('jp', $jp)
				->where('I_G','like',"%$genero%")
				->count();					
			break;


			
			default:
				# code...
				break;
		}
			
			if ($menu_filas==0) {
				$item="<label class='blanco'>Sin Resultados</label>";
			} else 
			{
				foreach ($menu as $user)
				{	
					$id=$user->id_titulo;;			
					$aa=$user->titulo;
					
					$captura0_mini=$user->captura0_mini;
					$buscar = "blogspot";		
					if($captura0_mini ==! ""){
					 	$resultado = strpos($captura0_mini, $buscar);		 
						if($resultado === FALSE){
					    	$captura0_mini="/capturas/miniaturas/$captura0_mini";
						}   
					}						
					$peso=$user->peso;
					$descripcion=$user->descripcion;	
					$descripcion=substr("$descripcion",0, 200);			
					$item=$item.	
					"<div class='col s6 m4 l3'>
			    		<div class='card z-depth-2  '>
							<a href='/$jp/$id'  >	
							   	<div class='card-image '>
							     	<img   src='$captura0_mini'>
							    </div>	
							    <div class=' hide-on-med-and-down hover_vantana z-depth-2 '>
									<h5>$aa</h5>							
									$descripcion...	<br><br>
									Peso: <label class='color_b'>$peso</label>						
								</div>
							</a>
						</div>
			    	</div>";
				}
			}
		break;
	}				
			
	return $item;	
}
/////////////////////////////////////////////////////
function noticia_menu($tipo,$genero)


	{	
	if ($tipo=="series") {
		$noticia_menu = DB::table('noticias')
		->orderBy('id_noticias', 'desc')
		->where('tipo','like',"%$tipo%")
		->where('tipo','like',"%$genero%")
		->take(1)->get();
	}else{
		$noticia_menu = DB::table('noticias')
		->orderBy('id_noticias', 'desc')
		->where('tipo','like',"%$tipo%")	
		->take(1)->get();
	}
	$noticia="";
	foreach ($noticia_menu as $user)
	{
		$id_titulo=$user->id_titulo;		
		$titulo=$user->titulo;
		$captura0=$user->captura0;	
		$descripcion=$user->descripcion;
		$descripcion=substr("$descripcion",0, 100);				
		$noticia=
		"<div class='collection z-depth-1'>
        	<a class='color_b collection-item  active ' style='font-size: 16px; '> <span class='icon-newspaper'> </span> Noticias</a>
			<a href='/noticias/$id_titulo' class='collection-item color_l'>        
        		<div><img class='responsive-img' src='$captura0' alt='$titulo' ></div>
        		<div  style='color: black; font-size: 17px;text-align: left;' >$titulo</div>
        		<div style='color: black; font-size: 12px;text-align: left;'><p >$descripcion...</p></div>
        	</a>
		</div>
        ";
	}
	return $noticia;
}
/////////////////////////////////////////////////////
//*********************************************************
function pagination_jp($pagina,$jp,$genero,$id_titulo){ 

	if ($genero==!"") {
		$id="$jp/$genero";
	}else{
		$id="$jp";
	}
	$numero_filas =DB::table("entradas")
	->where('jp', $jp)
	->where('genero','like',"%$genero%")
	->where('id_titulo','like',"%$id_titulo%")
	->count();	
	$var=ceil($numero_filas/16);
	if ($var <= 1)
	{
		$pagination="";
	}else
	{
		$anteriror="
	    			<li class='waves-effect'><a href='/menu/$jp$genero/page/".($pagina-1)."'>
	    				<i class='material-icons'>chevron_left</i
	    			a></li>
	    			";
	   	$siguiente="
	    			<li class='waves-effect'><a href='/menu/$jp$genero/page/".($pagina+1)."'>
	    				<i class='material-icons'>chevron_right</i
	    			a></li>
	    			";		

		if ($pagina==1) {
			$anteriror="<li class='disabled'><a href='#!'><i class='material-icons'>chevron_left</i></a></li>";	
		}
		if ($pagina>=$var) {		
			$siguiente="<li class='disabled'><a href='#!'><i class='material-icons'>chevron_right</i></a></li>";
		}
		$pagination="$anteriror					
					<li class='active color_b'><a>$pagina de ".$var."</a></li>
					$siguiente";		
	}		
    return $pagination;
}
//*********************************************************

function carousel_principal($jp)
{
	$carousel_princ = DB::table("entradas")->orderBy("id_entradas", 'desc')
	->where("jp", "$jp")->skip(0)->take(6)->get();		
	$item="";	
	foreach ($carousel_princ as $user)
	{
		$id=$user->id_titulo;			
		$aa=$user->titulo;		
		$captura0_mini=$user->captura0_mini;			
		$genero=$user->genero;				
		$peso=$user->peso;		
		$buscar = "blogspot";
		if($captura0_mini ==! ""){
				 	$resultado = strpos($captura0_mini, $buscar);		 
					if($resultado === FALSE){
				    	$captura0_mini="/capturas/miniaturas/$captura0_mini";
					}   
				}											
		$item=$item.
		"<div class='col s2 m2 '>
	    		<div class='card z-depth-2  '>
					<a href='/$jp/$id'  >	
					   	<div class='card-image '>
					     	<img   src='$captura0_mini' >
					    </div>	
					    <div class='hide-on-med-and-down hover_vantana z-depth-2 '>
							<h5>$aa</h5>						
							Peso: <label class='color_b'>$peso</label>						
						</div>
					</a>
				</div>
	    	</div>";
	}	
	return $item;
}

class MenusCon extends BaseController
{
	
	public function menu($jp){
		
		if ($jp=="juegos" or $jp=="peliculas"  or  $jp=="series" or $jp=="noticias" )
		{	
			$noticias="";
			if ($jp!=="noticias") {
				$noticias=noticia_menu($jp,"");				
			}
			$item=menu_jp($jp,1,"");
			$pagination=pagination_jp(1,$jp,"","");
			$titulo="Menu de ".ucwords($jp);
						
			switch ($jp) {
				case 'series':
					$carousel=carousel_principal("juegos");
				break;
				case 'juegos':
					$carousel=carousel_principal("peliculas");
				break;
				case 'peliculas':
					$carousel=carousel_principal("series");
				break;				
				default:
				$carousel=carousel_principal("juegos");					
				break;
			}

			return View::make('MenuVis_MATE',array(	'item'	=>$item,
													'pagination'=>$pagination,
													'titulo'=>$titulo
													,'jp'=>$jp,													
													'noticias'=>$noticias,
													'carousel'=>$carousel));
		}
		else
		{return Redirect::to('/');}		
	}//index
//***********************************************************
	public function menu_pagina($jp,$pagina){
		
		if ($jp=="juegos" or $jp=="peliculas"  or $jp=="series" or $jp=="noticias" )
		{	
			$noticias="";
			if ($jp!=="noticias") {
				$noticias=noticia_menu($jp,"");				
			}
			$item=menu_jp($jp,$pagina,"");		
			$pagination=pagination_jp($pagina,$jp,"","");	
			$titulo="Menu de ".$jp;		
			
			switch ($jp) {
				case 'series':
					$carousel=carousel_principal("juegos");
				break;
				case 'juegos':
					$carousel=carousel_principal("peliculas");
				break;
				case 'peliculas':
					$carousel=carousel_principal("series");
				break;				
				default:					
				break;
			}

			return View::make('MenuVis_MATE',array(	'item'	=>$item,
												'pagination'=>$pagination,
												'titulo'=>$titulo,
												'jp'=>$jp,
												
												'noticias'=>$noticias,
												'carousel'=>$carousel));
		}else
		{return Redirect::to('/');}
	}//page
//***********************************************************
	public function genero($jp,$genero){

		if ($jp=="juegos" or $jp=="peliculas"  or $jp=="series" or $jp=="noticias" )
		{	
			$noticias="";
			if ($jp!=="noticias") {
				$noticias=noticia_menu($jp,"");				
			}				
			$item=menu_jp($jp,1,$genero);
			$pagination=pagination_jp(1,$jp,$genero,"");		
			$titulo="Menu de ".$jp." : ".$genero;
				

			switch ($jp) {
				case 'series':
					$carousel=carousel_principal("juegos");
				break;
				case 'juegos':
					$carousel=carousel_principal("peliculas");
				break;
				case 'peliculas':
					$carousel=carousel_principal("series");
				break;				
				default:					
				break;
			}		
			return View::make('MenuVis_MATE',array(	'item'=>$item,
												'pagination'=>$pagination,
												'titulo'=>$titulo,
												'jp'=>$jp,
												////'recientes_juegos'=>$recientes_juegos,
												////'recientes_peliculas'=>$recientes_peliculas,
												////'recientes_series'=>$recientes_series,
												'noticias'=>$noticias,
												'carousel'=>$carousel));						
		}else
		{return Redirect::to('/');}
	}//genero 
//***********************************************************
	public function genero_pagina($jp,$genero,$pagina){

		if ($jp=="juegos" or $jp=="peliculas" or $jp=="series" or $jp=="noticias" )
		{	
			$noticias="";
			if ($jp!=="noticias") {
				$noticias=noticia_menu($jp,"");				
			}
			$item=menu_jp($jp,$pagina,$genero);		
			$pagination=pagination_jp($pagina,$jp,$genero,"");
			$titulo="Menu de ".$jp." Genero: ".$genero;
			
			switch ($jp) {
				case 'series':
					$carousel=carousel_principal("juegos");
				break;
				case 'juegos':
					$carousel=carousel_principal("peliculas");
				break;
				case 'peliculas':
					$carousel=carousel_principal("series");
				break;				
				default:					
				break;
			}			
			return View::make('MenuVis_MATE',array(	'item'	=>$item,
												'pagination'=>$pagination,
												'titulo'=>$titulo,
												'jp'=>$jp,
												//'recientes_juegos'=>$recientes_juegos,
												//'recientes_peliculas'=>$recientes_peliculas,
												//'recientes_series'=>$recientes_series,
												'noticias'=>$noticias,
												'carousel'=>$carousel));
		}else
		{return Redirect::to('/');}
	}//genero page*/
	public function buscar(){

			$jp=$_POST['jp'];
			$titulo_buscar=$_POST['titulo'];					
		 	
			$item="";						
				$menu = DB::table("entradas")
				->where('id_titulo','like',"%$titulo_buscar%")
				->where('jp','like',"%$jp%")
				->orderBy('id_entradas', 'desc')
				->skip(0)
				->take(16)
				->get();

				$menu_filas =DB::table("entradas")
				->where('id_titulo','like',"%$titulo_buscar%")
				->where('jp','like',"%$jp%")
				->count();

			
			if ($menu_filas==0){
				
				$item="<h4>Sin Resultados</h4>";
			} 
			else{	
				foreach ($menu as $user)
			{	
				
				$id=$user->id_titulo;;			
				$aa=$user->titulo;
				$bb=$user->captura0;
				
				$captura0_mini=$user->captura0_mini;
				$buscar = "blogspot";		
				if($captura0_mini ==! ""){
				 	$resultado = strpos($captura0_mini, $buscar);		 
					if($resultado === FALSE){
				    	$captura0_mini="/capturas/miniaturas/$captura0_mini";
					}   
				}			
				$genero=$user->genero;				
				$peso=$user->peso;
				$descripcion=$user->descripcion;	
				$descripcion=substr("$descripcion",0, 200);			
				$item=$item.	
				"<div class='col s4 m3 '>
			    		<div class='card z-depth-2  '>
							<a href='/$jp/$id'  >	
							   	<div class='card-image '>
							     	<img   src='$captura0_mini' >
							    </div>	
							    <div class='hover_vantana z-depth-2 '>
									<h5>$aa</h5>							
									$descripcion...	<br><br>
									Peso: <label class='color_b'>$peso</label>						
								</div>
							</a>
						</div>
			    	</div>";
			}
			}		
			$pagination=pagination_jp(1,$jp,"",$titulo_buscar)	;
			$titulo="Resultados de la Busqueda :".$titulo_buscar;
			$noticias="";
			if ($jp!=="noticias") {
				$noticias=noticia_menu($jp,"");				
			}			
			switch ($jp) {
				case 'series':
					$carousel=carousel_principal("juegos");
				break;
				case 'juegos':
					$carousel=carousel_principal("peliculas");
				break;
				case 'peliculas':
					$carousel=carousel_principal("series");
				break;				
				default:
					$carousel=carousel_principal("juegos");					
				break;
			}				
			
			return View::make('MenuVis_MATE',array(	'item'=>$item,
												'pagination'=>$pagination,
												'titulo'=>$titulo,												
												'noticias'=>$noticias,
												'jp'=>$jp,
												'carousel'=>$carousel));
	}
}//controller	