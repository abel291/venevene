<?php
class SubidaConNO extends BaseController
{	
	public function __construct()
	{
		$this->beforeFilter('auth');
	}
	public function getIndex()
	{			
		return View:: make('InsertarNotiVis');
	}	
	public function postGuardar()
	{	
		$titulo=$_POST['titulo-form'];
		$id_titulo=acentos($titulo);
		$titulo=htmlentities($titulo);
		$captura0=$_POST['captura-form'];
		$descripcion=$_POST['descripcion-form'];
		
		$referencia=$_POST['link-form'];
		$tipo=$_POST['categoria-form'];

		$repetido = DB::table('noticias')->where('id_titulo', $id_titulo)->count();
		if ($repetido>0) {
			echo "<span class='glyphicon glyphicon-remove-sign color_rojo_wa'></span> Al parecer esta noticia ya esta en la base de datos <br>";
		}else{
			DB::table('noticias')->insert
							([		   					
			   				 	'id_titulo'	 =>$id_titulo,
								'titulo'	 =>$titulo,
								'tipo'		 =>$tipo,
								'descripcion'=>$descripcion,
								'captura0'	 =>$captura0,
								'referencia' =>$referencia
			   				]);
		echo "<span class='glyphicon glyphicon-ok-sign verde'></span>Listo<br><br><a href='/menu/noticias' class='btn btn-default'> Ir al menu </a>";
		}
	}//guardar
}//controller
?>