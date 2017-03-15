<?php 

class LoginCon extends BaseController
{	
	public function getIndex()
	{
		return View::make('login_MATE');	
	}
	public function postVerificar()
	{	
		$usuario=$_POST['usuario'];
		$clave=$_POST['clave'];
		
		$userdata = array( 
			'username' => $usuario,
			'password'=> $clave
		);  
		//si los datos son correctos y existe un usuario con los mismos se inicia sesión
		//y redirigimos a la home
		if(Auth::attempt($userdata))
		{ 
			return Redirect::to('/dashboard'); 
		}else{
			//en caso contrario mostramos un error
			return Redirect::to('/login'); 
		}
	}
}
?>