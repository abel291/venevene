<nav class="navbar navbar navbar-inverse navbar-fixed-top ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed " data-toggle="collapse" data-target="#collase">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-list blanco"> </span>
            </button>           
            <a href="/" target="blanc">{{ HTML::image('imagenes/logo.png','Brand') }}</a>
        </div>      
        <div class="collapse navbar-collapse" id="collase">
            <ul class="nav navbar-nav">
                <li ><a href="/Dashboard"><span class="glyphicon glyphicon-repeat blanco"></span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-floppy-save blanco"></span> Insertar <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu " role="menu">            
                        <li><a  href="/insertar/juego"><span class="icon-pacman"></span> Nuevo Juego</a></li>
                        <li><a href="/insertar/pelicula"><span class="icon-film"></span> Nueva Pelicula</a></li>
                        <li><a href="/insertar/serie"><span class="icon-file-video"></span> Nueva Serie</a></li> 
                        <li><a href="/insertar/noticia"><span class="icon-file-video"></span> Nueva Noticia</a></li>            
                  </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav  navbar-right">       
                <li class="dropdown">
                  <a href="#"  class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user "> </span> Abel Morales <span class="caret"></span> </a>
                  <ul class="dropdown-menu blanco dropdown-menu-right" >
                    <li><a href="#"><span class="glyphicon glyphicon-cog "></span>  Mi Cuenta</a></li>
                    <li><a href="/Salir" > <span class="glyphicon glyphicon-log-out"></span> Salir</a></li>                                     
                  </ul>
                </li>
            </ul>                   
        </div>
    </div>
</nav>

