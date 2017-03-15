<?php
function acentos($string){ 
    $string = trim($string); 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä', ' ',':','’','/','"','\'','<','>','‘','’','?','¿','.'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', '-','','','-','','','','','','','','',''),
        $string
    ); 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    ); 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    ); 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    ); 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    ); 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
    $titulo_bd=strtolower($string);
   
	return $titulo_bd;
}
function vista($imagen_form){
   /*if (isset($_FILES[$imagen_form."-form"]['name'])){
		$imagen_temp=$_FILES[$imagen_form."-form"]['name'];
		$direccion=$_FILES[$imagen_form."-form"]['tmp_name'];		
		$titulo_bd=$imagen_temp;
		move_uploaded_file($direccion,"temp/$titulo_bd");			
		$captura="<img src='/temp/$titulo_bd' $dimensiones class='img-responsive'>";

		$captura="<img src='imagen_form' class='img-responsive'>";
	}else
	{	
		$captura="";								
	}*/
	if (isset($_POST[$imagen_form."-form"])){		
		$captura=$_POST[$imagen_form."-form"];
		$captura="<img src='$captura' class='responsive-img z-depth-1'>";		
	}else
	{	
		$captura="";								
	}		
	return $captura;
}
function resolucion_portada($imagen_form,$titulo_bd,$jp){	
	
	if (isset($_FILES[$imagen_form."-form"]['name'])){
		$imagen_temp=$_FILES[$imagen_form."-form"]['name'];	
		$direccion0=$_FILES[$imagen_form."-form"]['tmp_name'];
		$tipo0=$_FILES[$imagen_form."-form"]['type'];
		$tipo0=str_replace("image/", "", $tipo0);
		$titulo_bd="$titulo_bd-$imagen_form.$tipo0";
		move_uploaded_file($direccion0,"temp/$titulo_bd");		
		//$captura_port="capturas/$jp/".$titulo_bd;
		$captura_mini="capturas/miniaturas/".$titulo_bd;
			
		$ruta_imagen  = "temp/$titulo_bd";
		$info_imagen  = getimagesize($ruta_imagen);
		$imagen_ancho = $info_imagen[0];
		$imagen_alto  = $info_imagen[1];
		$imagen_tipo  = $info_imagen['mime'];
		//$lienzo_port = imagecreatetruecolor( 400,550  );
		$lienzo_mini = imagecreatetruecolor( 273,390  );

		switch ( $imagen_tipo ){	
			case "image/jpg":
			case "image/jpeg":
				$imagen = imagecreatefromjpeg( $ruta_imagen );
				break;
			case "image/png":
				$imagen = imagecreatefrompng( $ruta_imagen );
				break;
		}		
		//imagecopyresampled($lienzo_port, $imagen, 0, 0, 0, 0, 400,550 , $imagen_ancho, $imagen_alto);
		imagecopyresampled($lienzo_mini, $imagen, 0, 0, 0, 0, 273,390 , $imagen_ancho, $imagen_alto);
		imagejpeg( $lienzo_mini,$captura_mini, 80 );
		//imagejpeg( $lienzo_port,$captura_port, 100 );			
	}else{	
		$titulo_bd="";				
	}	
	return $titulo_bd;
}
function resolucion_capturas($imagen_form,$titulo_bd,$jp){	
	
	/*if (isset($_FILES[$imagen_form."-form"]['name'])){
		$imagen_temp=$_FILES[$imagen_form."-form"]['name'];	
		$direccion=$_FILES[$imagen_form."-form"]['tmp_name'];
		$tipo0=$_FILES[$imagen_form."-form"]['type'];
		$tipo0=str_replace("image/", "", $tipo0);
		$titulo_bd="$titulo_bd-$imagen_form.$tipo0";
		move_uploaded_file($direccion,"temp/$titulo_bd");		
		$captura="capturas/$jp/".$titulo_bd;
			
		$ruta_imagen  = "temp/$titulo_bd";
		$info_imagen  = getimagesize($ruta_imagen);
		$imagen_ancho = $info_imagen[0];
		$imagen_alto  = $info_imagen[1];
		$imagen_tipo  = $info_imagen['mime'];
		$lienzo = imagecreatetruecolor(700,400);
		switch ($imagen_tipo){	
			case "image/jpg":
			case "image/jpeg":
				$imagen = imagecreatefromjpeg($ruta_imagen);
			break;
			case "image/png":
				$imagen = imagecreatefrompng($ruta_imagen);
			break;
		}		
		imagecopyresampled($lienzo,$imagen,0, 0, 0, 0,700,400,$imagen_ancho,$imagen_alto);
		imagejpeg($lienzo,$captura,90);						
	}else{
		$captura="";				
	}	*/
	if (isset($_FILES[$imagen_form."-form"]['name'])){
		$imagen_temp=$_FILES[$imagen_form."-form"]['name'];	
		$direccion=$_FILES[$imagen_form."-form"]['tmp_name'];
		$tipo0=$_FILES[$imagen_form."-form"]['type'];
		$tipo0=str_replace("image/", "", $tipo0);
		$titulo_bd="$titulo_bd-mini.$tipo0";
		move_uploaded_file($direccion,"temp/$titulo_bd");		
		$captura="capturas/$jp/".$titulo_bd;
			
		$ruta_imagen  = "temp/$titulo_bd";
		$info_imagen  = getimagesize($ruta_imagen);
		$imagen_ancho = $info_imagen[0];
		$imagen_alto  = $info_imagen[1];
		$imagen_tipo  = $info_imagen['mime'];
		$lienzo = imagecreatetruecolor(700,400);
		switch ($imagen_tipo){	
			case "image/jpg":
			case "image/jpeg":
				$imagen = imagecreatefromjpeg($ruta_imagen);
			break;
			case "image/png":
				$imagen = imagecreatefrompng($ruta_imagen);
			break;
		}		
		imagecopyresampled($lienzo,$imagen,0, 0, 0, 0,700,400,$imagen_ancho,$imagen_alto);
		imagejpeg($lienzo,$captura,90);						
	}else{
		$captura="";				
	}	
	return $captura;
}
class SubidaCon extends BaseController
{	
	public function __construct(){
		$this->beforeFilter('auth');
	}
	public function getIndex($jp)
	{ 	
		$fecha=date("d-m-Y");		
		switch ($jp) {
			case 'juego':
				$link_vista="$('#formuploadajax').attr('action', '/insertar/juegos/vista');";
				$link_guardar="$('#formuploadajax').attr('action', '/insertar/juegos/guardar');";
				$titulo="<i class='material-icons left'>videogame_asset</i> Insertar Juego";
				$formulario='
					<div class="input-field col s12 m6">											
						<select name="voces-v-form" class="voces-v-form">
							<option disabled selected></option>
							<option> Multilenguaje </option>
							<option> Español  </option>
							<option> Ingles </option>
							<option> Ingles Subtitulado </option>											
						</select>
						<label>Idioma voces </label>
					</div>
						
					<div class="input-field col s12 m6">						
						<select name="voces-t-form" class="voces-t-form">
								<option disabled selected></option>
								<option> Multilenguaje </option>
								<option> Español </option>
								<option> Ingles </option>														
						</select>
						<label>Idioma Texto </label>
					</div>					
					
					<div class="input-field col s6">
												
						<select name="genero-form" class="genero-form">
							<option disabled selected></option>
							<option value="arcade"> Arcade </option>
							<option value="aventura"> Aventura </option>
							<option value="accion"> Accion </option>
							<option value="estrategia"> Estrategia </option>
							<option value="coche"> Coche </option>
							<option value="simulador"> Simulador </option>
							<option value="deportes"> Deportes </option>
							<option value="pelea"> Pelea </option>
							<option value="misterio"> Misterio </option>
							<option value="terror"> Terror </option>
						</select>	
						<label>Genero</label>					
					</div>

					<div class="input-field col s12">
						<label class="active" for="requisitos" style="top:8px;font-size: 14px;" >Requisitos</label>					
						<textarea id="requisitos" class="requisitos-form" name="requisitos-form" placeholder="c" ></textarea>						
					</div>'				
				;				
			break;

			case 'pelicula':
				$link_vista="$('#formuploadajax').attr('action', '/insertar/peliculas/vista');";
				$link_guardar="$('#formuploadajax').attr('action', '/insertar/peliculas/guardar');";
				$titulo="<i class='material-icons left'>movie</i> Insertar Juego";
				$formulario=
					'
					<div class="input-field col s12 m10">
						<select name="idioma-form" class=" idioma-form">
							<option disabled selected></option>
							<option> Español </option>
							<option> Ingles </option>
							<option> Ingles Subtitulado </option>
							<option> Japones Subtitulado </option>							
						</select>
						<label>Idioma</label>							
					</div>				

					<div class="input-field col s12 m6">
						<select name="calidad-form" class=" calidad-form">
							<option disabled selected></option>
							<option> DVDrip  </option>
							<option> 1080p </option>							
						</select>
						<label >Calidad</label>
					</div>								
					
					<div class="input-field col s12 m6">
						<select name="duracion-form" class=" duracion-form">
							<option disabled selected></option>
							<option > 30 min </option>	<option > 40 min </option>
							<option > 50 min </option>	<option > 60 min </option>
							<option > 70 min </option>	<option > 80 min </option>	
							<option > 90 min </option>	<option > 100 min</option>
							<option > 130 min</option>	<option > 140 min</option>
							<option > 150 min</option>	<option > 160 min</option>
							<option > 170 min</option>	<option > 180 min</option>	
							<option > 190 min</option>
						</select>
						<label > Duracion </label>
					</div>

					<div class="input-field col s12 m6">					
						<select name="formato-form">
							<option disabled selected></option>
							<option > MKV </option>
							<option > AVI </option>
							<option > MP4 </option>												
						</select>
						<label> Formato </label>
					</div>					

					<div class="input-field col s12 m6 ">
						<label >Genero</label>						
						<input class="genero-form " type="text" name=" genero-form" " >
					</div>						
					';	
			break;

			case 'serie':
				$link_vista="$('#formuploadajax').attr('action', '/insertar/series/vista');";
				$link_guardar="$('#formuploadajax').attr('action', '/insertar/series/guardar');";
				$titulo='<h3 class="page-header"><span class="icon-file-video color_temaa"></span> <b>Insertar Serie</b> </h3>';
				$formulario='
					
					
					<div class="input-field col s12 ">
						<label for="formGroup" class="col-xs-12 col-sm-2   control-label "> Idioma </label>
							<div class="col-xs-12  col-sm-3">
								<select name="idioma-form" class=" idioma-form">					
									<option ></option>
									<option> Japones Subtitulado </option>	
									<option> Español   </option>								
									<option> Ingles Subtitulado </option>													
								</select>
							</div>
					</div>				

					<div class="input-field col s12">
						<label for="formGroup" class="col-xs-12 col-sm-2   control-label"> Formato </label>
							<div class="col-xs-12 col-sm-3 ">
								<select name="formato-form" class=" formato-form">
									<option ></option>
									<option > MP4 </option>	
									<option > MKV </option>
									<option > AVI </option>										
								</select>
							</div>
					
						<label for="formGroup" class="col-xs-12 col-sm-2 control-label"> Duracion </label>
							<div class="col-xs-12 col-sm-3">
								<select name="duracion-form" class=" duracion-form">
									<option ></option>
									<option > 10 min </option>
									<option > 25 min </option>
									<option > 30 min </option>	
									<option > 40 min </option>				
								</select>
							</div>		
					</div>

					<div class="input-field col s12">
						<label for="formGroup" class="col-xs-12 col-sm-2 control-label">Genero</label>
						
						<div class="col-xs-12 col-sm-3">
							<select name="genero-form" class=" genero-form">
								<option ></option>
								<optgroup label="TV">
								<option >Accion</option>
								<option >Aventura</option>
								<option >Drama</option>
								<option >Comedia</option>
								<option >Terror</option>								
								<option >Infantiles</option>
								<option >Ciencia Ficcion</option>
								<option >Animacion</option>
								<option >Animacion(Cartoon Netword)</option>
								</optgroup>	

								<optgroup label="Anime">
								<option >Ecchi</option>
								<option >Deporte</option>
								<option >Sobrenatural</option>
								<option >Vida Cotidiana</option>
								<option >Romance</option>								
								<option >Colegial</option>
								<option >Romance Colegial</option>
								<option >Recuentro </option>
								</optgroup>								
							</select>
						</div>			

						<label for="formGroup" class="col-xs-12 col-sm-2 control-label">Tipo</label>
						<div class="col-xs-12 col-sm-3">
							<select name="tipo-form" class=" tipo-form">
								<option ></option>
								<option > Anime</option>
								<option > TV</option>													
							</select>
						</div>	
					</div>';
			break;

			case 'noticia':
				$link_vista="$('#formuploadajax').attr('action', '/insertar/noticias/vista');";
				$link_guardar="$('#formuploadajax').attr('action', '/insertar/noticias/guardar');";			
				
			break;
			
			default:
				
				break;
		}
		return View::make('InsertVis_MATE',array(
												'titulo'	=>$titulo,
												'formulario'	=>$formulario,
												'link_guardar'	=>$link_guardar,
												'link_vista'	=>$link_vista										
											));		
	}
	public function postVista($jp)
	{	
		$mask = "temp/*";
		array_map( "unlink", glob( $mask ) );
		$titulo=$_POST['titulo-form'];
		$id_titulo=acentos($titulo);
		$id_titulo="$jp/$id_titulo";			
		$titulo=htmlentities($titulo);
		$descripcion=$_POST['descripcion-form'];	
		$descripcion=str_replace("\n", "<br>", $descripcion);
		$fecha_estreno=htmlentities($_POST['Lansamiento-form']);
		$fecha_subida=$_POST['fecha-form'];
		$genero=$_POST['genero-form'];		
		$peso=$_POST['peso-form'].$_POST['pesoo-form'];
		
		$captura0 		=vista("captura0");
		$captura0_mini	=vista("captura0-mini");
		$banner 		=vista("banner");
		$banner_mini	=vista("banne-mini");
		$captura1		=vista("captura1");
		$captura2		=vista("captura2");
		$captura3		=vista("captura3");
		$captura4		=vista("captura4");				
		$link_pagina=$_POST['link-pagina-form'];			
		$link=$_POST['link-form'];
		$password=$_POST['password-form'];
		switch ($jp) {
			case 'juegos':
				
				$requisitos=$_POST['requisitos-form'];
				$requisitos=htmlentities($requisitos);
				$requisitos=
				"<fieldset><legend class='color_b'> <i class='material-icons left '>settings</i> Requisitos</legend>$requisitos</fieldset>";
				$requisitos=str_replace("\n", "<br>", $requisitos);				
				$idioma_v=htmlentities($_POST['voces-v-form']);		
				$idioma_t=htmlentities($_POST['voces-t-form']);	
				$I_G=
				   "<tr>
						<td><b>Fecha de Estreno: </b></td>
						<td>$fecha_estreno</td>
					</tr>
					<tr>
						<td><b>Peso: </b></td>
						<td>$peso</td>
					</tr>
					<tr>
						<td><b>Idioma Texto: </b></td>
						<td>$idioma_t</td>
					</tr>
					<tr>
						<td><b>Idioma Voces: </b></td>
						<td>$idioma_v </td>
					</tr>
					<tr>
						<td><b>Genero: </b></td>
						<td>$genero</td>
					</tr>
					<tr>
						<td><b>Fecha de subida: </b></td>
						<td>$fecha_subida</td>
					</tr>";		
								
			break;
			case 'peliculas':
				$duracion=$_POST['duracion-form'];						
				$idioma=htmlentities($_POST['idioma-form']);				
				$calidad=$_POST['calidad-form'];
				$formato=$_POST['formato-form'];				
				$requisitos="";			
				$I_G="
					<tr>
								<td><b>Fecha de Estreno: </b></td>
								<td>$fecha_estreno</td>
							</tr>
							<tr>
								<td><b>Calidad:</b></td>
								<td>$calidad</td>
							</tr>
							<tr>
								<td><b>Idioma : </b></td>
								<td>$idioma</td>
							</tr>
							<tr>
								<td><b>Formato: </b></td>
								<td>$formato </td>
							</tr>
							<tr>
								<td><b>Peso: </b></td>
								<td>$peso</td>
							</tr>
							<tr>
								<td><b>Genero: </b></td>
								<td>$genero</td>
							</tr>
							<tr>
								<td><b>Duracion: </b></td>
								<td>$duracion</td>
							</tr>
							<tr>
								<td><b>Fecha de subida: </b></td>
								<td>$fecha_subida</td>
							</tr>							";
			break;
			case 'series':
				$idioma=htmlentities($_POST['idioma-form']);		
				$formato=$_POST['formato-form'];
				$duracion=$_POST['duracion-form'];								
				$tipo=$_POST['tipo-form'];
				$requisitos="";					
				$I_G=
					"			<tr>
									<td><b>Fecha de estreno: </b></td>
									<td>$fecha_estreno</td>
								</tr>
								<tr>
									<td><b>Idioma</b></td>
									<td>$idioma</td>
								</tr>
								<tr>
									<td><b>Peso : </b></td>
									<td>$peso</td>
								</tr>
								<tr>
									<td><b>Duracion: </b></td>
									<td>$duracion </td>
								</tr>
								<tr>
									<td><b>Formato: </b></td>
									<td>$formato</td>
								</tr>
								<tr>
									<td><b>Genero: </b></td>
									<td>$genero</td>
								</tr>
								<tr>
									<td><b>Tipo: </b></td>
									<td>$tipo</td>
								</tr>
								<tr>
									<td><b>Fecha de subida: </b></td>
									<td>$fecha_subida</td>
								</tr>								
							";
			break;
			case 'noticias':
				$descripcion=$_POST['descripcion-form'];
				//$descripcion=htmlentities($descripcion);
				$descripcion=str_replace("\n", "<br>", $descripcion);
				$fecha_subida=$_POST['fecha-form'];
				$tipo=ucwords($_POST['categoria-form']);
				$dimensiones=""	;
				if (isset($_FILES["captura0-form"]['name'])){
					$titulo_bd=$_FILES["captura0-form"]['name'];
					$direccion=$_FILES["captura0-form"]['tmp_name'];					
					move_uploaded_file($direccion,"temp/$titulo_bd");
					$info_imagen = getimagesize("temp/$titulo_bd");
					$ancho = $info_imagen[0];
					$alto = $info_imagen[1];
					if ($alto>$ancho) {
						$dimensiones ="ins_portada";
					}else{
						$dimensiones ="capturass";
					}
					$captura="<img src='/temp/$titulo_bd' class='img-responsive'>";	
				}else
				{	
					$captura="";								
				}
				$item="
					<label class='titulo-vista color_temaa'> $titulo </label>
					<br>
					<div class='$dimensiones center'>
						$captura
					</div>						
					<br>					
					<div class='I-G'>					
						<table class='table table-striped table-bordered table-condensed'>
							<tbody>
								<tr>
									<td><b>Fecha de estreno: </b></td>
									<td>$fecha_subida</td>
								</tr>
								<tr>
									<td><b>Tipo de noticia</b></td>
									<td>$tipo</td>
								</tr>						
							</tbody>
						</table>						
					</div>			
					<fieldset><legend class='temaa' ><span class='icon-file-text'></span> Noticia </legend>	
					$descripcion<b>aa</b>
					</fieldset>					
					<a class='link' target='_blank' href='$referencia'> Ver noticia completa </a><br><br>";
			break;
			default:				
			break;
		}	
		$item= 
				"<h5 class=' id='/$id_titulo' style='margin-bottom: 20px;'>$titulo</h5>    			 			
  				$captura0
  				<br>					 
				<table class='i_G striped' style='display: inline-table; width: auto; margin: 20px;'>
			    	<tbody>							
						$I_G									
					</tbody>
				</table>			
  			<br>  			
				       	
  			<fieldset><legend class='color_b'><i class='material-icons left'>description</i>Descripcion</legend>$descripcion</fieldset>  			
  			$requisitos
  			<div class='center-align img_vista'>
				$banner<br>
				$captura1<br>
				$captura2<br>
				$captura3<br>
				$captura4				
			</div>
			<table style='display: inline-table;width: auto;margin-top:20px;'>        		
        		<tbody>
          			<tr>            
            			<td>Pagina</td>
            			<td class='center-align'><a class='waves-effect waves-light btn color_b' href='$link' target='_blank'><span class='icon-arrow-down'></span> ENLACE</a></td>
          			</tr> 
          			<tr>            
            			<td>Link Directos sin publicidad</td>
            			<td class='center-align'><a class='waves-effect waves-light btn color_b' href='$link_pagina' target='_blank'><span class='icon-arrow-down'></span> ENLACE</a></td>
          			</tr> 
          			<tr>            
            			<td>Password rar</td>
            			<td>$password</td>
            			
          			</tr>          
        		</tbody>
      		</table>	


				"/*
				<br>
				<label class='titulo-vista color_temaa' id='/$id_titulo'> $titulo </label>			
				<br><br>
				<div class='ins_portada'>
					$captura0
				</div>				
				<br><br>				
				<div class='I-G'>					
					<table class='  table  table-striped table-bordered table-condensed'>
						<tbody>
							$I_G							
						</tbody>
					</table>						
				</div>
				<br>
				<fieldset ><legend class='temaa' ><span class='icon-file-text'></span> Descricion </legend>	
					$descripcion
				</fieldset>									
				
				$requisitos
									
				<div class='capturass center'>
					$banner<br><br>
					$captura1<br><br>
					$captura2<br><br>
					$captura3<br><br>
					$captura4
				</div>
				<br>				
				<a type='button' href='$link' target='_blank' class='btn btn-color blanco link'><span class='icon-arrow-down'></span> Ver Enlaces</a>				
				</div><br><br>*/;	
		echo $item ;
	}//vista
	public function postGuardar($jp)
	{
		$mask = "temp/*";
		array_map( "unlink", glob( $mask ) );
		$titulo=$_POST['titulo-form'];
		$id_titulo=acentos($titulo);		
		
		$repetido = DB::table("entradas")->where('id_titulo', $id_titulo)->count(); 
		if ($repetido>0) {
			echo "<h5>Al parecer este Juego ya esta en la base de datos</h5><br>";
		}else
		{	
			$id_titulo=acentos($titulo);
			$id_titulo="$id_titulo";			
			$titulo=htmlentities($titulo);
			$descripcion=$_POST['descripcion-form'];	
			$descripcion=str_replace("\n", "<br>", $descripcion);
			$fecha_estreno=htmlentities($_POST['Lansamiento-form']);
			$fecha_subida=$_POST['fecha-form'];
			$genero=$_POST['genero-form'];		
			$peso=$_POST['peso-form'].$_POST['pesoo-form'];
			$captura0 		=$_POST["captura0-form"];
			$captura0_mini	=$_POST["captura0-mini-form"];
			$banner 		=$_POST["banner-form"];
			$banner_mini	=$_POST["banner-mini-form"];
			$captura1		=$_POST["captura1-form"];
			$captura2		=$_POST["captura2-form"];
			$captura3		=$_POST["captura3-form"];
			$captura4		=$_POST["captura4-form"];									
			$link=$_POST['link-form'];
			$link_pagina=$_POST['link-pagina-form'];
			$password=$_POST['password-form'];			


			switch ($jp) {
				case 'juegos':
					$requisitos=$_POST['requisitos-form'];
					$requisitos=htmlentities($requisitos);
					$requisitos=str_replace("\n", "<br>", $requisitos);				
					$idioma_v=htmlentities($_POST['voces-v-form']);		
					$idioma_t=htmlentities($_POST['voces-t-form']);					
					$I_G=
					   "<tr>
							<td><b>Fecha de Estreno: </b></td>
							<td>$fecha_estreno</td>
						</tr>
						<tr>
							<td><b>Peso: </b></td>
							<td>$peso</td>
						</tr>
						<tr>
							<td><b>Idioma Texto: </b></td>
							<td>$idioma_t</td>
						</tr>
						<tr>
							<td><b>Idioma Voces: </b></td>
							<td>$idioma_v </td>
						</tr>
						<tr>
							<td><b>Genero: </b></td>
							<td>$genero</td>
						</tr>
						<tr>
							<td><b>Fecha de subida: </b></td>
							<td>$fecha_subida</td>
						</tr>";									
				break;		
				case 'peliculas':
					$duracion=$_POST['duracion-form'];						
					$idioma=htmlentities($_POST['idioma-form']);				
					$calidad=$_POST['calidad-form'];
					$formato=$_POST['formato-form'];				
					$requisitos="";			
					$I_G="
						<tr>
								<td><b>Fecha de Estreno: </b></td>
								<td>$fecha_estreno</td>
							</tr>
							<tr>
								<td><b>Calidad:</b></td>
								<td>$calidad</td>
							</tr>
							<tr>
								<td><b>Idioma : </b></td>
								<td>$idioma</td>
							</tr>
							<tr>
								<td><b>Formato: </b></td>
								<td>$formato </td>
							</tr>
							<tr>
								<td><b>Peso: </b></td>
								<td>$peso</td>
							</tr>
							<tr>
								<td><b>Genero: </b></td>
								<td>$genero</td>
							</tr>
							<tr>
								<td><b>Duracion: </b></td>
								<td>$duracion</td>
							</tr>
							<tr>
								<td><b>Fecha de subida: </b></td>
								<td>$fecha_subida</td>
							</tr>							";
				break;
				case 'series':
					$idioma=htmlentities($_POST['idioma-form']);		
					$formato=$_POST['formato-form'];
					$duracion=$_POST['duracion-form'];								
					$tipo=$_POST['tipo-form'];
					$requisitos="";					
					$I_G=
						"		<tr>
									<td><b>Fecha de estreno: </b></td>
									<td>$fecha_estreno</td>
								</tr>
								<tr>
									<td><b>Idioma</b></td>
									<td>$idioma</td>
								</tr>
								<tr>
									<td><b>Peso : </b></td>
									<td>$peso por cap</td>
								</tr>
								<tr>
									<td><b>Duracion: </b></td>
									<td>$duracion </td>
								</tr>
								<tr>
									<td><b>Formato: </b></td>
									<td>$formato</td>
								</tr>
								<tr>
									<td><b>Genero: </b></td>
									<td>$genero</td>
								</tr>
								<tr>
									<td><b>Tipo: </b></td>
									<td>$tipo</td>
								</tr>
								<tr>
									<td><b>Fecha de subida: </b></td>
									<td>$fecha_subida</td>
								</tr>								
							";														 
				break;
				case 'noticias':
					$fecha_subida=$_POST['fecha-form'];
					$tipo=ucwords($_POST['categoria-form']);
					if (isset($_FILES["captura0-form"]['name'])){
						$direccion0=$_FILES["captura0-form"]['tmp_name'];
						$tipo0=$_FILES["captura0-form"]['type'];
						$tipo0=str_replace("image/", "", $tipo0);
						$id_titulo="$id_titulo-captura0.$tipo0";
						move_uploaded_file($direccion0,"temp/$id_titulo");		
						$captura_port="capturas/noticias/".$id_titulo;
						$captura_mini="capturas/miniaturas/".$id_titulo;
						$captura0=$id_titulo;	
						$ruta_imagen  = "temp/$id_titulo";
						$info_imagen  = getimagesize($ruta_imagen);
						$imagen_ancho = $info_imagen[0];
						$imagen_alto  = $info_imagen[1];
						$imagen_tipo  = $info_imagen['mime'];
						switch ( $imagen_tipo ){	
							case "image/jpg":
							case "image/jpeg":
								$imagen = imagecreatefromjpeg( $ruta_imagen );
								break;
							case "image/png":
								$imagen = imagecreatefrompng( $ruta_imagen );
								break;
						}
						if ($imagen_alto>$imagen_ancho) {
							$ancho_port=400;$alto_port=550;
							$ancho_mini=160;$alto_mini=220;		
						}else{
							$ancho_port=700;$alto_port=400;
							$ancho_mini=330;$alto_mini=190;			
						}
						$lienzo_port = imagecreatetruecolor( $ancho_port,$alto_port  );
						$lienzo_mini = imagecreatetruecolor( $ancho_mini,$alto_mini  );		
						imagecopyresampled($lienzo_port, $imagen, 0, 0, 0, 0, $ancho_port,$alto_port , $imagen_ancho, $imagen_alto);
						imagecopyresampled($lienzo_mini, $imagen, 0, 0, 0, 0, $ancho_mini,$alto_mini , $imagen_ancho, $imagen_alto);
						imagejpeg( $lienzo_mini,$captura_mini, 90 );
						imagejpeg( $lienzo_port,$captura_port, 90 );				
					}else{	
						$captura0="";					
					}
					$referencia=$_POST['referencia-form'];	
					if($jp=="noticias")	{
					DB::table('noticias')->insert
								([		   					
				   				 	'id_titulo'		=>$id_titulo,
									'titulo'		=>$titulo,
									'tipo'			=>$tipo,
									'fecha_subida'	=>$fecha_subida,
									'descripcion'	=>$descripcion,	
									'captura0'		=>$captura0,
									'referencia'	=>$referencia									
				   				]);	
					}		
					echo '<h5>Listo</h5>
		<a href="/dashboard" class="waves-effect waves-light btn color_b"><i class="material-icons left">dashboard</i>Volver al tablero</a>';					
				break;			
				default:					
				break;
			}

			DB::table('entradas')->insert
										([		   					
						   				 	'id_titulo'=>$id_titulo,
											'titulo'=>$titulo,					
											'peso'=>$peso,
											'genero'=>$genero,
											'I_G'=>$I_G,						
											'descripcion'=>$descripcion,
											'requisitos'=>$requisitos,
											'captura0_mini'=>$captura0_mini,											
											'jp'=>$jp									
						   				]);	
			DB::table('capturas')->insert
										([		   					
						   				 	'id_titulo'=>$id_titulo,
											'titulo'=>$titulo,											
											'captura0'=>$captura0,												
											'banner'=>$banner,	
											'banner_mini'=>$banner_mini,											
											'captura1'=>$captura1,
											'captura2'=>$captura2,
											'captura3'=>$captura3,
											'captura4'=>$captura4,											
											'jp'=>$jp									
						   				]);	
			DB::table('link')->insert
										([		   					
						   				 	'id_titulo'=>$id_titulo,																					
											'linkk'=>$link,
											'link_pagina'=>$link_pagina,
											'password'=>$password

						   				]);	


		echo '<h5>Listo</h5>
		<a href="/dashboard" class="waves-effect waves-light btn color_b"><i class="material-icons left">dashboard</i>Volver al tablero</a>';
		}	

		
	}//guardar
}//controller
 ?>