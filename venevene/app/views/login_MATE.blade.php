<!DOCTYPE html>
<html lang="es">
<head>	
<meta property="og:title" content="Venecompu" />
<meta property="og:description" content="Aqui Podras Descargar todo lo que quieras Series,Peliculas,Juegos y Mas" />
<meta property="og:image" content="http://venecompu.esy.es/imagenes/logo-facebook.png" />
<meta property="og:url" content="http://venecompu.esy.es/"/>
<meta property="og:site_name" content="Venecompu"/>
<meta property="fb:admins" content="" />
@include('estilos.head_mate')
<title> Vene | Principal </title>
</head>
<body>
	<div class=" grey darken-3" style="display: table;position: absolute;width: 100%;top: 0px; bottom: 0px; height: 100%;">
		<div class="center-align" style="width: 100%;height: 100%; display: table-cell;	vertical-align: middle;" >
			<div class="z-depth-2" style="display: inline-block; background:white; width: 400px;padding: 20px;text-align: left;">
				<h5 style="border-bottom: 1PX #bdbdbd solid; ">Inicio de Sesion</h5>
				<form action="/login/verificar" method="POST" style="margin-top: 30px;">		
					<div class="input-field col s6">
						<i class="material-icons prefix " style="font-size: 3rem">account_box</i>
				        <input id="usuario"  type="text" name="usuario" required style="background: #f5f5f5;">
				        <label class='active'  for="usuario" style="font-size: 14px;    margin-left: 35px;">Usuario</label>
				    </div>
				    <div class="input-field col s6">
				       	<i class="material-icons prefix " style="font-size: 3rem">lock</i>
				        <input id="password" placeholder="1"  type="password" name="clave" required style="background: #f5f5f5;">
				        <label class='active'  for="password" style="font-size: 14px;    margin-left: 35px;">Contraseña</label>
				    </div>
			        <div class="right-align">
			        	<button type="submit" class="waves-effect waves-light btn color_b" >Iniciar</button>
			        </div>
				</form>
			</div>
		</div>
	</div>
</div>
@include('estilos.scripp_mate')
</body>
</html>
