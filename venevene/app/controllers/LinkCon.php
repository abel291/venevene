<?php 
class LinkCon extends BaseController
{	
	public function link_capcha($id_titulo){

		$entrada = DB::table('link')		
        ->join('capturas', 'link.id_titulo', '=', 'capturas.id_titulo')
        ->select('link.*', 'capturas.banner')
		->where('link.id_titulo','like',"%$id_titulo%")		         
		->get();		
		foreach ($entrada as $user)
		{
			$id_titulo 	=$user->id_titulo;
			$banner 	=$user->banner;					
		}
		 return View::make('Link_capcha',array(	'id_titulo'	=>$id_titulo,
												'banner'	=>$banner));	
	}		
	public function link_verificar(){				
			$params = array();  // Array donde almacenar los parámetros de la petición
			$params['response'] = urlencode($_POST['g-recaptcha-response']);
    		$params['secret'] = "6LekhxgUAAAAANQpX7fDBKFPj2YLtegtdo-MOUUA"; // Clave privada
    		$params['remoteip'] = $_SERVER['REMOTE_ADDR'];
    		// Generar una cadena de consulta codificada estilo URL
    		$params_string = http_build_query($params);
    		$result = file_get_contents('https://www.google.com/recaptcha/api/siteverify?' . $params_string);    		
    		$array=json_encode($result);
    		if (strstr($result,'"success": true')) {
    			$id_titulo=$_POST['id_titulo'];
    			$entrada = DB::table('link')		        
				->where('id_titulo','like',"%$id_titulo%")		         
				->get();		
				foreach ($entrada as $user)
				{
					$id_titulo 	=$user->id_titulo;
					$linkk 	=$user->linkk;				
				}				
    			echo json_encode($linkk);
    		}else{
    			echo "capcha invalido ,recargue la pagina";	
			}
	}
}
?>