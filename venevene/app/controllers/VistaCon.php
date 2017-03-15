<?php
function metas($genero,$id_titulo,$titulo,$c0,$c1,$banner,$descripcion,$jp)
{	
	$descripcion=substr("$descripcion",0, 300);
	$meta=
	"<meta property='og:type' 			content='$genero' />
	<meta property='og:url'    			content='http://venecompu.esy.es/$jp/$id_titulo/' />
	<meta property='og:title' 			content='$titulo' />	
	<meta property=og:description 		content='$descripcion' />
	<meta property='fb:admins' 			content='Venecompu.esy.es' />
	<meta property='og:image' 			content='$c0' />
	<meta property='og:image' 			content='$c1' />
	<meta property='og:image' 			content='$banner' />";
	return $meta;
}	
function recomendados_funcion($jp,$genero,$id_titulo){			
	$recomendado = DB::table('entradas')	
    ->where('jp', $jp)  
	->where("id_titulo","!=", "$id_titulo") 
	->where('genero',"like", "%$genero%")
	->orderBy('id_entradas', 'desc')
	->take(6)->get();	
	$recomendados="";
	foreach ($recomendado as $user)
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
		$recomendados=$recomendados.
		   "<div class='col s4 m2 '>
	    		<div class='card z-depth-1  '>
					<a href='/$jp/$id'  >	
					   	<div class='card-image '>
					     	<img   src='$captura0_mini' >
					    </div>	
					    <div class='hide-on-med-and-down hover_vantana z-depth-1 '>
							<h6>$aa</h6>						
							<label class='color_b'>$peso</label>						
						</div>
					</a>
				</div>
	    	</div>
			";
	}	
	return $recomendados;		
}
//*******************************************************************
function captura($capturas){

	if ($capturas==!"") {
		$buscar = "blogspot";
			$resultado = strpos($capturas, $buscar);		 
			if($resultado === FALSE){
		    	$capturas="<img src='/$capturas' class='z-depth-1 responsive-img'>";
			}
			else{
				$capturas="<img src='$capturas' class='z-depth-1 responsive-img'>";
			}		
	}
	return $capturas;
}
function carousel_principal($jp,$id_titulo){

	$carousel_princ = DB::table("entradas")
	->orderBy("id_entradas", 'desc')
	->where("jp", "$jp")
	->where("id_titulo","!=", "$id_titulo")
	->skip(0)
	->take(6)
	->get();		
	$item="";	
	foreach ($carousel_princ as $user)
	{
		$id=$user->id_titulo;		
		$captura0_mini=$user->captura0_mini;
		$buscar = "blogspot";
		if($captura0_mini ==! ""){
			$resultado = strpos($captura0_mini, $buscar);		 
			if($resultado === FALSE){
			$captura0_mini="/capturas/miniaturas/$captura0_mini";
			}   
		}											
		$item=$item.
		"<div class=' col s2 m2 '>
			<a href='/$jp/$id'>
				<img src='$captura0_mini' alt='$jp' class='responsive-img z-depth-2'> 
			</a>
		</div>";
	}	
	return $item;
}
function recientes($jp,$id_titulo)
{
	$recientes_jp=DB::table("entradas")
	->join('capturas', 'entradas.id_titulo', '=', 'capturas.id_titulo')
    ->select('entradas.*','capturas.banner_mini')
	->orderBy("entradas.id_entradas", 'desc')
	->where("entradas.jp", "$jp")
	->where("entradas.id_titulo","!=", "$id_titulo")
	->skip(0)
	->take(6)
	->get();		
	$item="";
	foreach ($recientes_jp as $user)
	{
		$id=$user->id_titulo;			
		$titulo=$user->titulo;
		$banner_mini=$user->banner_mini;
		$item=$item.
		"<a href='/$jp/$id' class='lado_banner' style='display: inline-block; font-size: 13px;padding: 0px 5px; margin-bottom: 0px;line-height: 0px;'> <img src='$user->banner_mini' class='z-depth-1 responsive-img'>
		</a>";			
	}
	
	return $item;
}
//*******************************************************************https://www.blogger.com/blogger.g?blogID=1195188888093485982#editor/target=post;postID=3433081985413665663
class VistaCon extends BaseController
{

	public function vistaEntrada($jp,$id_titulo)
	{	
		$item="";					
		$entrada = DB::table('entradas')
		->join('link', 'entradas.id_titulo', '=', 'link.id_titulo')
        ->join('capturas', 'entradas.id_titulo', '=', 'capturas.id_titulo')
        ->select('entradas.*', 'link.*', 'capturas.*')
		->where('entradas.id_titulo', $id_titulo)
		->where('entradas.jp', $jp)              
		->get();	
		foreach ($entrada as $user)
		{
			$titulo 		=$user->titulo;
			$captura0 		=$user->captura0;
			$buscar = "blogspot";
			$resultado = strpos($captura0, $buscar);		 
			if($resultado === FALSE){
		    	$captura0="/capturas/$jp/$captura0";
			}
			$descripcion 	=$user->descripcion;
			$requisitos 	="";	
			if ($jp=="juegos"){
				$requisitos="
				<fieldset><legend class='color_b'> <i class='material-icons left'>settings</i> Requisitos</legend>
					$user->requisitos
				</fieldset>";}	
			$genero			=$user->genero;
			$genero_1 = explode(" ", $genero);
			$I_G			=$user->I_G;			
			$peso			=$user->peso;													
			$e1=captura($user->captura1);
			$e2=captura($user->captura2);	
			$e3=captura($user->captura3);	
			$e4=captura($user->captura4);
			$link			=$user->linkk;
			$link_pagina			=$user->link_pagina;
			$password			=$user->password;			
			$item=$item. 
			"<h5 class=' style='margin-bottom: 20px;'>$titulo</h5>    			 			
  			<img class='responsive-img z-depth-1' src='$captura0'>
  			<br>					 
			<table class='i_G striped' style='display: inline-table; width: auto; margin: 20px;'>
			    <tbody>							
					$I_G									
				</tbody>
			</table>			
  			<br>  			
				       	
  			<fieldset><legend class='color_b'> <i class='material-icons left '>description</i>  Descripcion</legend>
  				$descripcion
  			</fieldset>  			
  			$requisitos
  			<div class='center-align img_vista'>
				$e1 
				$e2 
				$e3 
				$e4  				
			</div>
			<table style='display: inline-table;width: auto;margin-top:20px;'>        		
        		<tbody>
          			<tr>            
            			<td>pagina de origen</td>
            			<td class='center-align'><a class='waves-effect waves-light btn color_b' href='$link_pagina' target='_blank'><span class='icon-arrow-down'></span> ENLACES</a></td>
          			</tr> 
          			<tr>            
            			<td>Link Directos sin publicidad</td>
            			<td class='center-align'><a class='waves-effect waves-light btn color_b' href='/link/$id_titulo' target='_blank'><span class='icon-arrow-down'></span> ENLACES</a></td>
          			</tr> 
          			<tr>            
            			<td>password rar</td>
            			<td>$password</td>
            			
          			</tr>          
        		</tbody>
      		</table>
			";
		}
		$breadcrumb="<li><a class='color_l' href='/menu/$jp'>$jp</a></li><li class='active'>$titulo</li>";

		//$facebook="juegos/$id_titulo";
		$meta=metas($genero,$id_titulo,$titulo,$user->captura1,$user->captura0,$user->banner,$descripcion,"$jp");
		//$comentarios = comentarios_funcion(1,"juegos",$id_titulo);		
		$comentarios = "'http://venecompu.esy.es/$jp/$id_titulo'"	;	
		$recomendados=recomendados_funcion($jp,$genero_1[0],$id_titulo);		
		//$countt = DB::table('comentarios')->where('jp',"juegos")->where('id_titulo',$id_titulo)->count();		
				
		//$pagination=pagination_comen(1,$countt,$id_titulo,"juegos");
		

  		$recientes_juegos=recientes("juegos",$id_titulo);
		$recientes_peliculas=recientes("peliculas",$id_titulo);
		$recientes_series=recientes("series",$id_titulo);		
        $carousel=carousel_principal("$jp",$id_titulo);
		return View::make('Vista_MATE',array(	'item'			=>$item,
											'title'			=>$titulo,											
											'recomendados'	=>$recomendados,											
											'comentarios'	=>$comentarios,																						
											'meta' 	=> $meta,											
											'carousel'=>$carousel,
											'breadcrumb'=>$breadcrumb,
											'recientes_juegos'=>$recientes_juegos,
											'recientes_peliculas'=>$recientes_peliculas,
											'recientes_series'=>$recientes_series,
											));		

	}
//**************************************************************************************
	public function vistaNoticias($id_titulo)
	{	
		$item="";
		$noticias = DB::table('noticias')->where('id_titulo',$id_titulo)->get();	
		foreach ($noticias as $user)
		{	
			$id_titulo 		=$user->id_titulo;							
			$titulo 		=$user->titulo;			
			$tipo 			=ucwords($user->tipo);
			$fecha_subida 	=$user->fecha_subida;
			$descripcion 	=$user->descripcion;
			$captura0 		=$user->captura0;			
			$referencia 	=$user->referencia;							
			$item=$item.
			"
			<h5 class=' style='margin-bottom: 20px; '>$titulo</h5>						
			<br>					
			<div style='text-align: center; font-size: 18px; padding: ' >	
			<img class='responsive-img z-depth-1 ' src='$captura0' style='width: 100%; max-height: 550px; margin-bottom: 20px;'>		
			<p style='text-align: justify;'>
			$descripcion	
			</p>
			
			</div >	
			<br>											
			<a  target='_blank' href='$referencia'> Ver noticia Completa </a>";
		}
		
		$meta=metas($tipo,$id_titulo,$titulo,"",$user->captura0,"",$descripcion,'noticias');
		$comentarios = "'http://venecompu.esy.es/noticias/$id_titulo'"	;
		//$comentarios =comentarios_funcion(1,"noticias",$id_titulo);		
		//$countt = DB::table('comentarios')->where('jp',"noticias")->where('id_titulo',$id_titulo)->count();		
		//$pagination=pagination_comen(1,$countt,$id_titulo,"noticias");		
		$breadcrumb="<li><a href='/menu/noticias'>noticias</a></li><li class='active'>$titulo</li>";
		$recientes_juegos=recientes("juegos",$id_titulo);
		$recientes_peliculas=recientes("peliculas",$id_titulo);
		$recientes_series=recientes("series",$id_titulo);
		$carousel=carousel_principal("peliculas",$id_titulo);
		return View::make('VistaVisNoti_MATE',array(	'item'			=>$item,
											'title'			=>$titulo,											
																						
											'comentarios'	=>$comentarios,
											//'pagination'	=>$pagination,
											//'dona_pre' 		=> $dona_pre,
											//'dona_inco' 	=> $dona_inco,
											//'dona_agra' 	=> $dona_agra,
											//'dona_total' 	=> $countt,
											'meta' 			=> $meta,
											
											'carousel'=>$carousel	,
											'breadcrumb'=>$breadcrumb,
											'recientes_juegos'=>$recientes_juegos,
											'recientes_peliculas'=>$recientes_peliculas,
											'recientes_series'=>$recientes_series,										
											));		
	}
	
		
}//CONTROLER
?>