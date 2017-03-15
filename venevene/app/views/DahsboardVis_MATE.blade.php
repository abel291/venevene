<!DOCTYPE html>
<html lang="es">
<head>	

@include('estilos.head_mate')
<title> Tablero Admi </title>
 
</head>
</head>
<body >
@include('estilos.MenuDahsboard_MATE')
<br>
<div class="container">
<div class="row">
	<div class="col m12 z-depth-1 white ">
		<ul class="tabs ">
        	<li class="tab col s3"><a class="color_l" style="font-size: 20px;" class="active" href="#test1"><b> <i class="material-icons ">videogame_asset</i> JUEGOS</b></a></li>
        	<li class="tab col s3"><a class="color_l" style="font-size: 20px;"  href="#test2"><b> <i class="material-icons ">movie</i> PELICULAS</b></a></li>
        	<li class="tab col s3"><a class="color_l" style="font-size: 20px;" href="#test3"><b> <i class="material-icons ">local_movies</i> SERIES</b></a></li>
          <li class="tab col s3"><a class="color_l" style="font-size: 20px;" href="#test4"><b> <i class="material-icons"> fiber_new </i> NOTICIAS</b></a></li>        
      	</ul>
	    <div id="test1" class="col s12 " style="padding-bottom: 10px; ">
	    	  <?php echo $juegos;?>
	    </div>
	   
	    <div id="test2" class="col s12 " style="padding-bottom: 10px; ">
	    	  <?php echo $peliculas;?>
	    </div>
	    
	    <div id="test3" class="col s12 " style="padding-bottom: 10px; "> 
			     <?php echo $series;?>
	    </div>
      
      <div id="test4" class="col s12 " style="padding-bottom: 10px; "> 
          <?php echo $noticias;?>
      </div>
	</div>
</div><!-- container -->
</div><!-- Modal Structure -->
  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer ">
    <div class="modal-content">
      <h4></h4>
      <p></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Agree</a>

    </div>
  </div>

@include('estilos.scripp_mate')
<script type="text/javascript">
    $(document).ready(function() {
//////////////////////////////////////////////////////////////////////////////
      $(document).on('click','.cerrar_modal', function(e) {//FORMULARIO
      $('#modal1').modal('close');
      });
//////////////////////////////////////////////////////////////////////////////
    	$(document).on('click','.boton_azul', function(e) {//FORMULARIO
          e.preventDefault();
          $('#modal1').attr('class', 'modal');
          $('.modal-content').html('<center><div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div>      </div><div class="gap-patch">        <div class="circle"></div>      </div><div class="circle-clipper right">        <div class="circle"></div>      </div>    </div>  </div></center>');
          $('.modal-footer').html("<a href='#!' class='cerrar_modal waves-effect waves-grey btn-flat grey lighten-2' style='margin-left: 10px;'>Cerrar</a>");          
          id=$(this).attr('id');           
                        
          $.ajax({
              url: '/dashboard/tableroform/'+id,
              type: 'post',
              dataType: 'json',
          })
          .done(function(fomr) {
          $('#modal1').attr('class', 'modal modal-fixed-footer');
          $('.modal-content').html("<h4>"+fomr.titulo+"<h4>"+"<br>"+fomr.formulario);         
          $('.modal-footer').html(fomr.footer);
          $('select').material_select();
          
          })
          .fail(function() {
              $('.modal-content').text("error");
          })          
      });
//////////////////////////////////////////////////////////////////////////////
    	$(document).on('change','#modifi-form', function() {
          $('.guardar_formulario').removeAttr('disabled');
      	}); 
      	$(document).on('keyup','#modifi-form', function() {
          $('.guardar_formulario').removeAttr('disabled');
      	});
//////////////////////////////////////////////////////////////////////////////
      $(document).on('click','.guardar_formulario', function(f) {
          f.preventDefault();
          var datos =$('#modifi-form').serialize();
          id=$(this).attr('id');  
          $('#modal1').attr('class', 'modal');
          $('.modal-content').html('<center><div class="preloader-wrapper big active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div>      </div><div class="gap-patch">        <div class="circle"></div>      </div><div class="circle-clipper right">        <div class="circle"></div>      </div>    </div>  </div></center>');
          $(this).attr('disabled', 'disabled');                   
                        
          $.ajax({
              url: '/dashboard/actualizarjp/'+id,
              type: 'post',
              dataType: 'json',
              data:datos,
          })
          .done(function(actualizar) {
          $('#modal1').modal('close'); 
          })
          .fail(function() {
               $('.modal-content').html("error");
               $('.modal-footer').html("<a href='#!' class='cerrar_modal waves-effect waves-grey btn-flat grey lighten-2'>Cerrar</a>");
          })          
      });
//////////////////////////////////////////////////////////////////////////////
        $(document).on('click','.eliminar', function(j) {
          id_eliminar = $(this).parent().attr('id');
          var id_titulo = $(this).attr('id');
          $('#modal1').attr('class', 'modal');
          $('.modal-content').html('Seguro que desea eliminar <b>'+id_eliminar+'</b>');  
          $('.modal-footer').html("<a href='#!' class='cerrar_modal waves-effect waves-grey btn-flat grey lighten-2' style='margin-left: 10px;'>Cerrar</a> <a href='#!' id='eliminar/"+id_titulo+"'' class='waves-effect waves-light btn red eliminar_entrada'> <i class=' material-icons left'>delete</i> Eliminar </a>");  
        });
//////////////////////////////////////////////////////////////////////////////        
        $(document).on('click','.eliminar_entrada', function(j) {
          j.preventDefault();
          var id_titulo = $(this).attr('id');
          $('#modal1').attr('class', 'modal');
          $(this).attr('disabled', 'disabled');
          $('.modal-content').html('<center><div class="preloader-wrapper big active"><div class="spinner-layer spinner-red-only"><div class="circle-clipper left"><div class="circle"></div>      </div><div class="gap-patch">        <div class="circle"></div>      </div><div class="circle-clipper right">        <div class="circle"></div>      </div>    </div>  </div></center>');
          
          $.ajax({
            url: '/dashboard/'+id_titulo,
            type: 'post',
            dataType: 'json',            
          })
          .done(function(dataa) {
            $('.'+dataa.id).remove();
            $('#modal1').modal('close');                         
          })
          .fail(function() {
            $('.modal-body').html('error');
          
          });
        });  
});//ready//
</script>
 <style type="text/css">
   
 </style>
</body>
</html>