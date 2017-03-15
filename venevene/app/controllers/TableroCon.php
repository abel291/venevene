<?php
//////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////
function pagination($pagina,$numero_item,$lista_item,$selector)
{	
	
	$var=ceil($lista_item/$numero_item);		
		if($var > 1) {								
			if ($pagina==1)
			{
				$anteriror="";
			}	
			else{$anteriror=
				"<li>
					<span ' class='$selector' id='".($pagina-1)."'   aria-label='Next'>
			        	<span class='glyphicon glyphicon-arrow-left'></span>
			      	</span>					
			    </li>";
		    }
		    if ($pagina>=ceil($lista_item/$numero_item)){
		    		
				$siguiente="";
			}
			else{ $siguiente=
				"<li>
					<span  class='$selector'id='".($pagina+1)."'' aria-abel='Next'>
			        	<span class='glyphicon glyphicon-arrow-right'></span> 
			      	</span>
		    	</li>";
			}
			$pagination="$anteriror
						<li class='active'><a>$pagina de ".ceil($lista_item/$numero_item)."-$numero_item</a></li>
						$siguiente";		
		}else{
			$pagination="";			
		}
		return $pagination;
}
///////////////////////////////////////////////////////////////////////////////////////////////
function ver($jp,$pagina,$id_titulo)
{
	$numero_item=18;
	$inicio=($pagina *$numero_item)-$numero_item;	
	$item="";
	switch ($jp){
		case 'noticias':
			
			if ($id_titulo==!""){		
				$lista_item = DB::table("noticias")				
				->where('id_titulo','like',"%$id_titulo%")
				->count();
				
				$entradas = DB::table("noticias")->orderBy("id_noticias",'desc')				
				->where('id_titulo','like',"%$id_titulo%")
				->skip($inicio)
				->take($numero_item)
				->get();			
			}else{
				$entradas = DB::table("noticias")				
				->orderBy("id_noticias",'desc')
				->skip($inicio)
				->take($numero_item)
				->get();
				$lista_item = DB::table("noticias")->count();
			}foreach ($entradas as $user)
			{	
				$id 		=$user->id_noticias;
				$id_titulo	=$user->id_titulo;
				$titulo 	=$user->titulo;								
				$captura0  		=$user->captura0;						
				$item=$item.	
						"<div class='col s12 m4 '>
							<div class='card z-depth-1 grey lighten-3  '>
								<a href='/noticias/$id_titulo'>
									<div class='card-image'>
		        						<img class='responsive-img' src='$captura0'>
		        						<span class='card-title' style=' font-size: 18px;padding: 18px;text-shadow: 1px 1px 2px black; ;'>$titulo</span>	        						
		        					</div>
		        					<div class='card-content center-align  grey lighten-3' style='padding: 10px ;'>					          			
					          			<a  class='btn color_b waves-effect waves-light boton_azul' id='$jp/$id' href='#modal1'>
											<i class='material-icons'>mode_edit</i>
										</a>
							        	<a  class='btn waves-effect red waves-light eliminar' id='$jp/$id' href='#modal1'>
							        		<i class='material-icons'>delete</i> 
							        	</a>
					        		</div>				
	        					</a>
							</div>
						</div>
								";
			/*<button type='button' class='btn temaa blanco boton_azul' id='$jp/$id' 
								data-toggle='modal' data-target='#modal'>
									<span class='glyphicon glyphicon-pencil'></span>
								</button>
					        	<button type='button'class='btn btn-danger blanco eliminar' id='$jp/$id'
					        	data-toggle='modal' data-target='#modal'>
					        		<span class='glyphicon glyphicon-trash'></span>
					        	</button>				
							</div>
						</div>*/
			}
		    
	    break;	          
	    default:		    	
				$lista_item = DB::table("entradas")				
				->where('jp','like',"%$jp%")
				->where('id_titulo','like',"%$id_titulo%")
				->count();
				
				$entradas = DB::table("entradas")
				->join('link', 'entradas.id_titulo', '=', 'link.id_titulo')
                ->join('capturas', 'entradas.id_titulo', '=', 'capturas.id_titulo')
                ->select('entradas.*', 'link.*', 'capturas.*')
				->orderBy("entradas.id_entradas",'desc')
				->where('entradas.jp','like',"%$jp%")
				->where('entradas.id_titulo','like',"%$id_titulo%")
				->skip($inicio)
				->take($numero_item)
				->get();			
					
		    foreach ($entradas as $user) 
					{	
						$id 		=$user->id_entradas;
						$id_titulo	=$user->id_titulo;
						$titulo 	=$user->titulo;				
						
						$captura_mini=$user->captura0_mini;	
						$buscar = "blogspot";		
						if($captura_mini ==! ""){
						 	$resultado = strpos($captura_mini, $buscar);		 
							if($resultado === FALSE){
						    	$captura_mini="/capturas/miniaturas/$captura_mini";
							}   
						}
						$item =$item.
						"<div class='col s6 m4  l3 $id '>
				    		<div class='card z-depth-1'   >
								<a href='/$jp/$id_titulo' target='_blank'  >	
								   	<div class='card-image '>
								     	<img  src='$captura_mini' class='responsive-img' >
								    </div>								    							    
								</a>
								<div class='card-content center-align  grey lighten-3' id='$titulo' style='padding: 10px;'>
              						<a  class='btn color_b waves-effect waves-light boton_azul' id='$jp/$id' href='#modal1'>
										<i class='material-icons'>mode_edit</i>
									</a>
						        	<a  class='btn waves-effect red waves-light eliminar' id='$jp/$id' href='#modal1'>
						        		<i class='material-icons'>delete</i> 
						        	</a>
            					</div>							
							</div>
				    	</div>
						";/*<div class='col s6 m3  l2 $id  '>							     
								<div class=' thumbnail thum_tablero fondo center' id='$titulo'>
									<a href='/$jp/$id_titulo' target='_blank' >
										<img src='$captura_mini'  class=' img-responsive thumm'>
										<div class='tool  hidden-xs '>
											<h4><b>$titulo</b></h4>						
										</div>
									</a>					
									<button type='button' class='btn temaa blanco boton_azul' id='$jp/$id' 
									data-toggle='modal' data-target='#modal'>
										<span class='glyphicon glyphicon-pencil'></span>
									</button>
						        	<button type='button'class='btn btn-danger blanco eliminar' id='$jp/$id'
						        	data-toggle='modal' data-target='#modal'>
						        		<span class='glyphicon glyphicon-trash'></span>
						        	</button>								
								</div>		
						</div>*/
					}
	    break;
	}		
	$pagination=pagination($pagina,$numero_item,$lista_item,$jp);
	return array($item,$pagination );	
} 
///////////////////////////////////////////////////////////////////////////////////////////////
class TableroCon extends BaseController
{	
	public function __construct(){
		$this->beforeFilter('auth');
	}
	public function getIndex()
	{  		
	 	list($peliculas,$pagination_peliculas)=ver("peliculas",1,"");
	 	list($series,$pagination_series)=ver("series",1,"");
	 	list($juegos,$pagination_juegos)=ver("juegos",1,"");
	 	list($noticias,$pagination_noticias)=ver("noticias",1,"");			
		return View::make('DahsboardVis_MATE',array(			
			'juegos' 			=> $juegos,			
			'pagination_juegos' => $pagination_juegos,

			'peliculas' 		=> $peliculas,			
			'pagination_peliculas' => $pagination_peliculas,

			'series' 			=> $series,
			'pagination_series' => $pagination_series,

			'noticias' 			=> $noticias,
			'pagination_noticias' => $pagination_noticias,
		));
	}
/////////////////////////////////////////////////////////////
	public function postTableroform($jp,$id)
	{		
		switch ($jp) {
			case 'noticias':
				$formulario = DB::table('noticias')
				->where('id_noticias', $id)			
				->get();
				foreach ($formulario as $user ) 
				{
					$id 		=$user->id_noticias;
					$titulo 	=$user->titulo;
					$id_titulo	=$user->id_titulo;
					$tipo=$user->tipo;
					$captura0=$user->captura0;
					$descripcion=$user->descripcion;
					$link=$user->referencia;
				$formulario=
				"<form class='form-horizontal ' id='modifi-form'>
					<div class='input-field'>
						<label for='' class='col s12  m2  l2  control-label'>Titulo de la Noticia</label>
						<div class='col-xs-12  col-sm-10   '>
							<input class=' titulo-form' type='text' name='titulo-form'  value='$titulo'>
						</div>
					</div>

					<div class='input-field'>
						<label for='' class='col s12  m2 l2  control-label'>Imagen link </label>
						<div class='col-xs-8 col-sm-10'>					
							<input class=' captura-form' type='text' name='captura0-form'  value='$captura0' >			
						</div>												
					</div>

					<div class='input-field'>
						<label for='' class='col s12 m2 col-lg-2 control-label'>Categoria</label>
						<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2 '>
							<select name='tipo-form' class=' tipo-form'>
								<option value='$tipo'> $tipo </option>
								<option disabled > ------------ </option>
								<option value='juegos'> Juegos </option>
								<option value='peliculas'> Peliculas </option>
								<option value='series'> Series </option>								
							</select>
						</div>
					</div>				

					<div class='input-field'>
						<label for='' class='col s12 m2 col-lg-2  control-label'>Noticia</label>
						<div class='col-xs-12 col-sm-10'>
							<textarea class=' descripcion-form' name='descripcion-form' > $descripcion</textarea>
							
						</div>
					</div>			

					<div class='input-field'>
						<label for='' class='col s12 m2  col-lg-2  control-label'> Referencia </label>
						<div class='col-xs-12  col-sm-10   '>
							<input class=' referencia-form' type='text' name='link-form' value='$link' >
						</div>
					</div>";

				}			
			break;
			
			default:
				$formulario = DB::table('entradas')
				->join('link', 'entradas.id_titulo', '=', 'link.id_titulo')
                ->join('capturas', 'entradas.id_titulo', '=', 'capturas.id_titulo')
                ->select('entradas.*', 'link.*', 'capturas.*')
				->where('entradas.id_entradas', $id)
				->where('entradas.jp', $jp)              
				->get();
				foreach ($formulario as $user ) {
					$id 		=$user->id_entradas;
					$titulo 	=$user->titulo;
					$id_titulo	=$user->id_titulo;
					$genero=$user->genero;

					$peso=$user->peso;
					$I_G=$user->I_G;					
					$captura0=$user->captura0;
					$captura0_mini=$user->captura0_mini;
					$banner=$user->banner;
					$banner_mini=$user->banner_mini;
					$captura1=$user->captura1;
					$captura2=$user->captura2;
					$captura3=$user->captura3;
					$captura4=$user->captura4;
					$linkk=$user->linkk;
					$link_pagina=$user->link_pagina;
					$password=$user->password;
					$requisitos="";
					$requisitosblo="";
					if ($jp=="juegos") {
						$requisitos=$user->requisitos;
						$requisitos=str_replace("<br>","\n",$user->requisitos);
						$requisitosblo="<fieldset style=' padding: 0px; background: #F8F8F8;text-align: justify;border: 1px solid #C0C0C0;border-radius: 2px;line-height:25px;margin-bottom:20px;
								font-size:16px;'  >
							<legend style=' margin-bottom: 0px; width: 80px; margin-left: 15px;color: white;padding:0px 5px;font-size:16px;border-radius: 3px;font-weight: bold;background-color: #1565C0;	'> Requisitos </legend>				
							<div style='margin-top: 0px; padding: 1px 15px 15px 15px;'>
								$requisitos
							</div>
							</fieldset>";
						$requisitos="<div class='input-field col s12' style='margin-bottom: 20px;'>						          						          	
						            <textarea  id='Requisitos' class='requisitos-form' name='requisitos-form'>$requisitos</textarea>
						            <label class='active' for='Requisitos' style='top:25px;font-size: 14px;' >Requisitos</label>	
						        </div>";
										
					}					
					$descripcion=$user->descripcion;					
					$descripcionblo=$descripcion;					
					$descripcion=str_replace("<br>","\n",$user->descripcion);
					$formulario="
							<form id='modifi-form'  class='col s12'>					            
					            <div class='row'>
						            <div class='input-field col s12'>					              	
						                <label class='active' style='top: 25px;font-size: 14px;' >Titulo</label>	
						                <input class='titulo-form' type='text' name='titulo-form' value='$titulo'>					                
						            </div>						            
							        <div class='input-field col s12 m6'>
						            	<label class='active' style='top: 25px;font-size: 14px;' >Genero</label>
						          		<input id='peso' class='genero-form' type='text' name='genero-form' value='$genero'>						          	
						        	</div>
					        								
					        						        		
					        		<div class='input-field col s12 m6'>
						            	<label class='active' style='top: 25px;font-size: 14px;' >Peso</label>
						          		<input id='peso' class='peso-form' type='text' name='peso-form' value='$peso'>						          	
						        	</div>
							       
							    <div class='input-field col s6 '>
						          	<label class='active'  style='top: 25px;font-size: 14px;' >Link pagina</label>				          	
						            <input  type='text' name='link-pagina-form' value='$link_pagina'>						          	
						        </div>

						        <div class='input-field col s6 '>
						          	<label class='active'  style='top: 25px;font-size: 14px;' >Password Link</label>				          	
						            <input  type='text' name='password-form' value='$password'>						          	
						        </div>

						        <div class='input-field col s12 ' style='margin-bottom: 20px;'>
						          	<label class='active'  style='top: 25px;font-size: 14px;' >Link</label>						          	
						            <textarea  class='link-form' name='link-form' >$linkk</textarea>							          	
						        </div>

						        <div class='input-field col s12' style='margin-bottom: 20px;'>
						          	<label class='active' for='Informacion' style='top:25px;font-size: 14px;' >Informacion</label>				          	
						            <textarea id='Informacion' class='I-G-form' name='I-G-form'> $I_G </textarea>						          	
						        </div>
						        <br>

						        <div class='input-field col s12' style='margin-bottom: 20px;'>
						          	<label class='active' for='Descripcion' style='top:25px;font-size: 14px;' >Descripcion</label>
						          	<textarea id='Descripcion' class='descripcion-form' name='descripcion-form'>$descripcion </textarea>			          	
						        </div>		        
						        	$requisitos
						        
								<div class='input-field col s12'>
										<label class='active' for='Captura_0' style='top: 25px;font-size: 14px;' >Captura 0</label>
										<input id='Captura_0' type='text' name='captura0-form' value='$captura0'  >
																
									</div>
									<div class='input-field col s12 m11 l12'>
										<label class='active' for='Captura_0_mini' style='top: 25px;font-size: 14px;' >Captura 0 mini</label>
										<input id='Captura_0_mini' type='text' name='captura0-mini-form' value='$captura0_mini'  >
																
									</div>

									<div class='input-field col s12 m11 l12'>
										<label class='active' for='Banner' style='top: 25px;font-size: 14px;' >Banner</label>
										<input id='Banner' type='text' name='banner-form' value='$banner'  >
																	
									</div>

									<div class='input-field col s12 m11 l12'>
										<label class='active' for='Banner_mini' style='top: 25px;font-size: 14px;' >Banner mini</label>
										<input id='Banner_mini' type='text' name='banner-mini-form' value='$banner_mini'  >
																	
									</div>

							        <div class='input-field col s12 m11 l12'>
										<label class='active' for='Captura 1' style='top: 25px;font-size: 14px;' >Captura 1</label>
										<input id='Captura 1' type='text' name='captura1-form' value='$captura1'  >
																
									</div>
									
									<div class='input-field col s12 m11 l12'>
										<label class='active' for='Captura_2' style='top: 25px;font-size: 14px;' >Captura 2</label>
										<input id='Captura_2' type='text' name='captura2-form' value='$captura2'  >
																
									</div>
									
									<div class='input-field col s12 m11 l12'>
										<label class='active' for='Captura_3' style='top: 25px;font-size: 14px;' >Captura 3</label>
										<input id='Captura_3' type='text' name='captura3-form' value='$captura3'  >
																	
									</div>
									
									<div class='input-field col s12 m11 l12'>
										<label class='active' for='Captura_4' style='top: 25px;font-size: 14px;' >Captura 4</label>
										<input id='Captura_4' type='text' name='captura4-form' value='$captura4'  >
																	
									</div>
								</div>
								<div class='input-field col s12 m11 l12'>
						          	
						          	<div class='col s12'>
						            	<textarea class=' descripcion-form'>
<center> 
<img style='display: inline-block;box-shadow: 1px 2px 2px #ccc;	border-radius: 2px;	width: 700px;' src=".'"'.$banner.'"'.">
<!--more-->
<br><br>					
<table >
	<tbody>
		$I_G							
	</tbody>
</table>
<style type='text/css'>
table{
	border-collapse: collapse;border: 2px solid #ddd; margin:10px;
}
td{
	background-color: #f9f9f9;
}
td{
	border: 1px solid #ccc;
	padding: 0px 5px;
}
td b{
	color: #1565C0;		
}	
</style>

<!--///////////////////////-->
<fieldset style=' padding: 0px; background: #F8F8F8;text-align: justify;border: 1px solid #C0C0C0;border-radius: 2px;line-height:25px;margin-bottom:20px;
	font-size:16px;'  >
<legend style=' margin-bottom: 0px;  width: 80px; margin-left: 15px;color: white;padding: 0px 5px;font-size:16px;border-radius: 3px;font-weight: bold;background-color: #1565C0;'> Descricion </legend>
<div style='margin-top: 0px; padding: 1px 15px 15px 15px;'>	
	$descripcionblo
</div>
</fieldset>

<!--///////////////////////-->
$requisitosblo
<!--///////////////////////-->


<img style='display:none;' src=".'"'.$captura0.'"'.">
<img style='display:none;' src=".'"'.$captura0_mini.'"'.">
<img style='display:none;' src=".'"'.$banner_mini.'"'.">
<img src=".'"'.$captura1.'" '." style='display: inline-block;box-shadow: 1px 2px 2px #ccc;	border-radius: 2px;	width: 700px;' /> 
<br><br>
<img src=".'"'.$captura2.'"'." style='display: inline-block;box-shadow: 1px 2px 2px #ccc;	border-radius: 2px;	width: 700px;' /> 
<br><br>
<img src=".'"'.$captura3.'"'." style='display: inline-block;box-shadow: 1px 2px 2px #ccc;	border-radius: 2px;	width: 700px;' /> 
<br><br>
<img src=".'"'.$captura4.'"'." style='display: inline-block;box-shadow: 1px 2px 2px #ccc;	border-radius: 2px;	width: 700px;' />
<br>
<br>
<a type='button' style='background-color: #1565C0;-webkit-user-select: none;border-radius: 2px;border: 1px solid transparent;box-sizing: border-box; 
color: white;cursor: pointer;display:inline-block;font-size: 14px;line-height: 1.42857; margin-bottom: 0px;padding: 6px 9px;text-align: center;text-decoration: none;touch-action: manipulation;vertical-align: middle; white-space: nowrap;'
 href='http://venecompu.esy.es/link/$id_titulo' target='_blank'> <b>Ver Enlaces</b> 
</a>
</center>			
						            	</textarea>
						          	</div>
						        </div>					        	
							</form>";		
			}	
			break;									
		}	
		$footer="
			<a href='#!' class='cerrar_modal waves-effect waves-grey btn-flat grey lighten-2' style='margin-left: 10px;'>Cerrar</a> 
			<a href='#!' id='$jp/$id_titulo' disabled class='guardar_formulario waves-effect waves-light btn color_b'><i class='material-icons left'>save</i>Guardar cambios</a>
			

			";				
		echo json_encode(array(	'formulario' => $formulario,
								'titulo' => $titulo,
								'footer' => $footer));
	}
/////////////////////////////////////////////////////////////
	public function postActualizarjp($jp,$id_titulo)
	{   					
		switch ($jp) {
			case 'noticias':
				$titulo=htmlentities($_POST['titulo-form']);	
				$descripcion=$_POST['descripcion-form'];
				$tipo=$_POST['tipo-form'];
				$captura0=$_POST['captura0-form'];
				$link=$_POST['link-form'];

				DB::table('noticias')
				->where('id_titulo', $id_titulo)
				->update
					([		   					
				   	 	'id_titulo'	 =>$id_titulo,
						'titulo'	 =>$titulo,
						'tipo'		 =>$tipo,
						'descripcion'=>$descripcion,
						'captura0'	 =>$captura0,
						'referencia' =>$tipo
				   	]);										 		
			break;
									 	
			default:
				$titulo=htmlentities($_POST['titulo-form']);		
				$link=$_POST['link-form'];
				$link_pagina=$_POST['link-pagina-form'];
				$password=$_POST['password-form'];				
				$I_G=$_POST['I-G-form'];
				$genero=$_POST['genero-form'];		
				$peso=$_POST['peso-form'];
				$descripcion=htmlentities($_POST['descripcion-form']);					
				$descripcion=str_replace("\n","<br>",$descripcion);
				$link=str_replace("\n","<br>",$link);
				$requisitos="";
				 if ($jp=="juegos") {
				 	$requisitos=htmlentities($_POST['requisitos-form']);	
					$requisitos=str_replace("\n","<br>",$requisitos);				 	
				 }	
				
				$captura0=$_POST['captura0-form'];
				$captura0_mini=$_POST['captura0-mini-form'];
				$banner=$_POST['banner-form'];
				$banner_mini=$_POST['banner-mini-form'];
				$captura1=$_POST['captura1-form'];
				$captura2=$_POST['captura2-form'];
				$captura3=$_POST['captura3-form'];
				$captura4=$_POST['captura4-form'];
				
				DB::table('entradas')
				->where('jp', $jp)
				->where('id_titulo', $id_titulo)
	            ->update
	            ([		            	
					'titulo'=>$titulo,
					'captura0_mini'=>$captura0_mini,					
					'peso'=>$peso,
					'genero'=>$genero,
					'I_G'=>$I_G,						
					'descripcion'=>$descripcion,
					'requisitos'=>$requisitos,
				]);	  
				
				DB::table('capturas')				
				->where('id_titulo', $id_titulo)
	            ->update
	            ([				
					'captura0'=>$captura0,					
					'banner'=>$banner,
					'banner_mini'=>$banner_mini,
					'captura1'=>$captura1,
					'captura2'=>$captura2,
					'captura3'=>$captura3,
					'captura4'=>$captura4,
				]);	 
				
				DB::table('link')				
				->where('id_titulo', $id_titulo)
	            ->update
	            ([				
					'linkk'=>$link,
					'link_pagina'=>$link_pagina,
					'password'=>$password			
				
				]);	   										 		# code...
			break;
		}							 					 
		echo json_encode("<span class='glyphicon glyphicon-ok-sign verde'></span> Listo");
	}
/////////////////////////////////////////////////////////////
	public function getPaginajp()
	{   	
		$jp=$_GET['jp'];
		$pagina=$_GET['pagina'];				
		list($jp_item,$pagina_item)=ver($jp,$pagina,"");												 
		echo json_encode(array('jp_item' => $jp_item,
								'pagina_item'=> $pagina_item ));	   	
	}
	public function getBuscarjp()
	{   	
		$jp=$_GET['jp'];
		$input=	$_GET['input'];			
		list($jp_item,$pagina_item)=ver($jp,1,$input);												 
		echo json_encode(array('jp_item' => $jp_item,
								'pagina_item'=> $pagina_item ));	   	
	}
	public function postEliminar($jp,$id)
	{   
		function vacio_imagen($captura){
			$nombre_imagen =$captura;
			if (file_exists($nombre_imagen)) {
			    unlink("$nombre_imagen")or die();
			} 
		}

		switch ($jp) {
		 	case 'noticias':
		 		DB::table("noticias")->where("id_noticias",$id)->delete();		 		
		 	break;
		 			
		 	default:
			 	$entrada = DB::table("entradas")->where("id_entradas",$id)->get();		
				foreach ($entrada as $user) {
		            $id_titulo="$jp/".$user->id_titulo;		            	            
		            $buscar = "blogspot";		           
					$resultado = strpos($user->captura0, $buscar);		 
					if($resultado === FALSE){
					    vacio_imagen("/capturas/miniaturas/".$user->captura0);
					}
					DB::table("entradas")->where("jp",$jp)->where("id_entradas",$id)->delete();	   
									
				}
				$listo="<span class='glyphicon glyphicon-ok-sign verde'></span><br><b>Listo</b><br>";					
		 	break;
		 } 		
		$listo="<span class='glyphicon glyphicon-ok-sign verde'></span><br><b>$id $jp</b><br>";
		
		echo json_encode( array('listo' => $listo,
								'id' => $id ));

			   	
	}


	
}//controller
?>