<?php 

function acentos($string){ 
    $string = trim($string); 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä', ' ',':',';','&'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', '-','','','-'),
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

$con=mysqli_connect('localhost','root','')or die($conexion="conexion");	
	mysqli_select_db($con,'u809105094_tecni')or die($conexion="tabla");
	
	$result = mysqli_query($con,"SELECT * FROM  peliculas  " );	
	while($row = mysqli_fetch_array($result))
			{
			
			$id_titulo=$row['id_titulo'];
			$titulo=$row['titulo'];			

			
				$calidad=$row['calidad'];
				$idioma=$row['idioma'];
				$formato=$row['formato'];
				$duracion=$row['duracion'];
			
			
			
			$genero=$row['genero'];
			$fecha_estreno=$row['fecha_estreno'];
			$fecha_subida=$row['fecha_subida'];
			$peso=$row['peso'];
			$descripcion=$row['descripcion'];
			$requisitos=$row['requisitos'];
			$captura0_file=$row['captura0_file'];
			$captura0_ancho=$row['captura0_ancho'];
			$captura0=$row['captura0'];
			$captura1=$row['captura1'];
			$captura2=$row['captura2'];
			$captura3=$row['captura3'];
			$captura4=$row['captura4'];
			$link=$row['link'];
			$jp="peliculas";	
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
			

			mysqli_query($con,"INSERT INTO 	entradas 
				(	
					id_titulo,
					titulo,
					peso,
					genero,
					I_G,
					descripcion,
					requisitos,
					captura0_file,
					captura0_ancho,
					captura0,
					captura1,
					captura2,
					captura3,
					captura4,
					link,
					jp
				) 
				VALUES 
				(	
					'$id_titulo',
					'$titulo',
					'$peso',
					'$genero',
					'$I_G',
					'$descripcion',
					'$requisitos',
					'$captura0_file',
					'$captura0_ancho',
					'$captura0',
					'$captura1',
					'$captura2',
					'$captura3',
					'$captura4',
					'$link',
					'$jp'
				)")or die($conexion=mysqli_error($con));
			
			echo "$titulo<br>";
			}

	

/*$result = mysqli_query($con,"SELECT * FROM  juegos");	
	while($row = mysqli_fetch_array($result))
		{	$jp=$row['jp'];
			$id_titulo=$row['id_titulo'];
			$titulo=$row['titulo'];
			$nombre=rand(100,10000);
			$correo="$nombre@gmail.com";
			$comentario="Para todas las personas que siguen teniendo errores al jugar ono pueden avanzar el tutorial, es importante realizar los pasos que indican con otros cracks.
				<br>
				<br>&ndash; Ejecutar el CPUID.Patch.bat para crear el ejecutable
				<br>&ndash; Crear el acceso directo al juego desde el ejecutable XCom2.exe y a&ntilde;adir -noRedScreens -review al destino del mismo.
				<br>&ndash; Ejecutar el juego DESDE ESE ACCESO DIRECTO.
				<br>&ndash; SI el CPUID patch no les sirve, en la configuracion regional y de idioma, then
				<br>pesta&ntilde;a administrativa y colocar el idioma English (US) y reiniciar la PC.
				<br>
				<br>Lo hice y me fue de maravilla el juego."	
				}
				

			
			//$origi=addslashes($origi);		
			}
			//


										
			
		echo $titulo."---".$id_titulo."<br>";


$result = mysqli_query($con,"SELECT * FROM  principal " );	
	while($row = mysqli_fetch_array($result))
		{			
			$rr="si";
			$id=$row['id_principal'];
			$origi=$row['captura0'];
			$origi="/capturas/miniaturas/$origi";
			//$origi=str_replace("capturas/miniaturas/","",$origi);
			//if ($origi==!"") {
				//$origi=str_replace("<img src='../capturas/juegos/","",$origi);
			
			//$origi="miniaturas".$origi;
			//$origi=str_replace("miniaturas/","",$origi);
			//$origi=addslashes($origi);		
			//}
			//
			mysqli_query($con,"UPDATE principal SET captura0='$origi'  WHERE id_principal='$id' ")or die($rr="no");								
			echo ("$origi <br>");
		}*/

			
 ?>