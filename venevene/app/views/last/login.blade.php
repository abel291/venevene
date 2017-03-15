<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">		
		<link rel="shortcut icon" href="/imagenes/favicon.ico">
		{{ HTML::style('estilos/css/bootstrap.css'); }}
		{{ HTML::style('estilos/css/estilo.css'); }}
		{{ HTML::style('estilos/style.css'); }}
		<title> Compu | Login </title>
	</head>	
<body class="temaa" >


<div class="container ">
	<div class="row  ">
	
		<div class=" col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 ">
		<center><a href="/" class="titulo_fuera">Venecompu</a></center>
			<form class="form login-div" action="/login/verificar" method="POST">				
			<label class="titulo" >Introdusca Usuario y Contraseña</label>
			  	<div class="input-group">
		    		<span class="input-group-addon "><span class="glyphicon glyphicon-user"></span></span>
		    		<input type="text" name="usuario" class="form-control" required >
		  		</div>
		  		<br>
			  	<div class="input-group">
		    		<span class="input-group-addon "><span class="glyphicon glyphicon-lock"></span></span>
		    		<input type="password" name="clave" class="form-control" required >
		  		</div>		  							
						
				<div class="checkbox">
				    <label>
				    	<input class="recordame" type="checkbox" name="recordar"> Recordar 
				    </label>
				</div>	  					  			    	
			    <button type="submit" class="btn btn-default">Entrar</button>		  		  	
			</form>
		</div>
		<div class=" col-xs-12 col-sm-4 col-sm-offset-4   ">
		<br>		
		<center><b class="Copy"> © Copyright 2010 - 2016 </b></center>
		</div>
	</div>
</div>

<style type="text/css">
body{
	background-color: #212121;
}
a:hover{
	text-decoration: none;
	color: white;
}

.titulo{	
	padding: 10px;
	margin-bottom: 10px;	
}
.titulo_fuera{
	font-family: 'Berlin Sans FB', sans-serif;
	font-size: 38px;
	margin-left: 12px;
	color: white;
	text-decoration: none;
	text-shadow: 1px 2px 1px #424242;
}	
.Copy{
	color: white;
	margin-bottom: 10px;
}
.row{
margin-top: 20%;	
}
.login-div{	
	color: black;
	background-color: white;
	border-radius: 2px;		
	padding: 20px;
	border-radius: 5px;
	box-shadow: 0px 0px 3px 0px #ccc;
}
</style>
</body>
</html>