<?php
function acentos($string){ 
    $string = trim($string); 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä', ' ','  ',':','’','/','"','\'','<','>','‘','’','?','¿','.','(',')','í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A', '-','-','','','-','','','','','','','','','','','','', '', '', '', '', '', '', ''),
        $string
    ); 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    ); 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('', '', '', '', '', '', '', ''),
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
$TITULO=acentos($_POST['titulo']);

function resolu($ANCHO,$LARGO,$DIRECCION,$TITULO,$TIPO){
$p=1; 
$i=1;

    
    $dirint = dir("$DIRECCION/");
    while (($archivo = $dirint->read()) !== false)
    {
        
        if ($archivo!==".." && $archivo!=="." ) {  

          
            $ruta_imagen = "$DIRECCION/$archivo";      
            $info_imagen = getimagesize($ruta_imagen);
            $imagen_ancho = $info_imagen[0];
            $imagen_alto = $info_imagen[1];
            $imagen_tipo = $info_imagen['mime'];
            $lienzo2 = imagecreatetruecolor( $ANCHO, $LARGO );
            switch ( $imagen_tipo ){    
                case "image/jpg":
                case "image/jpeg":
                    $imagen = imagecreatefromjpeg( $ruta_imagen );              
                    break;
                case "image/png":
                    $imagen = imagecreatefrompng( $ruta_imagen );
                    break;
            }           
            imagecopyresampled($lienzo2, $imagen, 0, 0, 0, 0, $ANCHO,$LARGO , $imagen_ancho, $imagen_alto);
            imagejpeg( $lienzo2, "cap_redi/".$TITULO."-".$TIPO."-".$i++.".jpeg",80);
            
            echo $TITULO."-".$TIPO."-"."jpeg"."<br>";
            
        }
    }
    $dirint->close();
}
resolu(400,550,"PORTADA","TITULO","PORTADA");
resolu(164,234,"PORTADA",$TITULO,"PORTADA-MINI");
resolu(700,(700*0.56),"CAPTURAS",$TITULO,"CAPTURAS");//42 //56
resolu(933,524,"PORTADA_ANCHO",$TITULO,"BANNER");
resolu(468,262,"PORTADA_ANCHO",$TITULO,"BANNER-MINI");
  
?>




  


