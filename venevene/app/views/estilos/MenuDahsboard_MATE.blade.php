<div class="navbar-fixed ">
    <nav>
        <div class="nav-wrapper color_b" style="padding-left: 30px;">
            <a href="/dashboard"  class="brand-logo"> <i class="material-icons">dashboard</i> Tablero </a>

            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="small material-icons">menu</i></a>         
            <div class="container"> 
                <ul class="right hide-on-med-and-down">                                  
                    <li><a class="dropdown-button" href="#!" data-activates="insertar">Insertar Nueva entrada<i class="material-icons right">arrow_drop_down</i></a></li>
                    <ul id="insertar" class="dropdown-content">
                        <li><a  href="/insertar/juego"><span class="icon-pacman"></span> Juego</a></li>
                        <li><a href="/insertar/pelicula"><span class="icon-film"></span> Pelicula</a></li>
                        <li><a href="/insertar/serie"><span class="icon-file-video"></span> Serie</a></li> 
                        <li><a href="/insertar/noticia"><span class="icon-file-video"></span> Noticia</a></li>   
                    </ul>
                    <li ><a href="/Dashboard"><span class="icon-loop2"></span></a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="admin"><b>ADMIN</b><i class="material-icons right">arrow_drop_down</i></a></li>
                    <ul id="admin" class="dropdown-content">   
                        <li><a href="/Salir" > <span class="icon-user-minus"></span> Salir</a></li>                   
                    </ul>
                 </ul>
            </div>
        </div>
     </nav>
</div> 

<ul class="side-nav" id="mobile-demo">
    <li ><a href="/Dashboard"><span class="icon-loop2"></span></a></li>
    <li><a class="dropdown-button" href="#!" data-activates="admin_mobile"><b>ADMIN</b><i class="material-icons right">arrow_drop_down</i></a></li>
    <ul id="admin_mobile" class="dropdown-content">                  
                        
        <li><a href="/Salir" > <span class="icon-user-minus"></span> Salir</a></li>                   
    </ul>

    
</ul>