<!DOCTYPE html>
<html>
<html lang="es">
	<head>
	@include('estilos.head')
		<title> Tecni | Tablero </title>
</head>
<body class="tableroo">
@include('estilos.MenuDahsboard')
<br><br><br><br>
<div class="container-fluid">  
<!--/////////////////////////////////////////////////////////////////-->
    <div class="col-xs-12 col-md-10  ">      
        <div class="panel panel-default">
            <div class="panel-heading color_temaa">       
                <b> Comentarios</b>               
            </div>        
            <div class="panel-body"  >
                <form  id='formulario_comentarios'>                       
                    <label  >Entrada</label>                    
                    <select name="jp"  class="select_control">
                        <option value="">Todos</option>
                        <option value="juegos">Juegos</option>
                        <option value="peliculas">Peliculas</option>
                    </select>               
                    <label  >Tipo</label>                   
                    <select name="tipo"  class="select_control">
                        <option value="">Todos</option>
                        <option>Agradecimiento</option>
                        <option>Inconveniente</option>
                        <option>Pregunta</option>                
                    </select>
                    <input type="text" class="buscar_input" name="titulo" placeholder="Titulo">                
                    <button type="button" id="1" class="btn btn-color blanco  buscar_tabla ">
                        <span class='glyphicon glyphicon-search' ></span> Filtrar
                    </button>                    
                </form>
                <ul class="pagination pagination_tabla pagination-sm">
                   <?php echo $pagination; ?>
                </ul>              
                <table class="table table-hover">            
                    <thead>
                        <tr>
                          <th>Comentario</th>
                          <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>            
                        <?php echo $tabla_item; ?>                  
                    </tbody>              
                </table>            
                                      
            </div><!--/panel body-->
        </div><!--/panel-->    
    </div><!--/table-->    
<!--/////////////////////////////////////////////////////////////////-->
       
          <div class=" col-xs-2 ">   
              <div class="panel panel-default">
                  <div class="panel-heading color_temaa"> <b> Comentarios hoy Peliculas </b> </div>  
                     <div class='panel-body'>

                        <div id="canvas-holder dona " class="dona">   
                          <canvas id="barra_ju" width="200" height="200" ></canvas>        
                        </div>
                        <div class=" grafico_leyenda">
                            <span class="glyphicon glyphicon-stop color_amarillo"></span> Pregunta(<?php echo $dona_ju_pre; ?>)<br>
                            <span class="glyphicon glyphicon-stop color_rojo_wa "></span> Inconveniento(<?php echo $dona_ju_inco; ?>)<br>
                            <span class="glyphicon glyphicon-stop color_azul"></span> Agradecimiento(<?php echo $dona_ju_agra; ?>)<br> 
                            <span class="glyphicon glyphicon-stop "></span> Total(<?php echo $dona_ju_total; ?>) 
                        </div>
                      </div>
                </div>             
          </div>
          <div class=" col-xs-2 ">       
              <div class="panel panel-default">
                  <div class="panel-heading color_temaa"><b> Comentarios hoy Peliculas</b> </div>        
                  <div class="panel-body">
                      <div id="canvas-holder dona " class="dona">   
                        <canvas id="barra_pe" width="200" height="200" ></canvas>        
                      </div>
                      <div class=" grafico_leyenda">
                        <span class="glyphicon glyphicon-stop color_amarillo"></span> Pregunta(<?php echo $dona_pe_pre; ?>)<br>
                        <span class="glyphicon glyphicon-stop color_rojo_wa "></span> Inconveniento(<?php echo $dona_pe_inco; ?>)<br>
                        <span class="glyphicon glyphicon-stop color_azul"></span> Agradecimiento(<?php echo $dona_pe_agra; ?>)<br> 
                        <span class="glyphicon glyphicon-stop "></span> Total(<?php echo $dona_pe_total; ?>) 
                      </div>
                  </div>
              </div>
          </div>
    
<!--/////////////////////////////////////////////////////////////////-->
    <div class="col-xs-12 ">    
      <div class="panel panel-default ">              
          <div class="panel-body  ">
              <h3 class="" >  Entradas Reciente </h3>               
              <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active">
                    <a href="#juegos" aria-controls="juegos" role="tab" data-toggle="tab"> 
                      <label class="label_tab color_temaa" > Juegos </label> 
                    </a>
                  </li>
              
                  <li role="presentation"><a href="#peliculas" aria-controls="peliculas" role="tab" data-toggle="tab">  <label class="label_tab color_temaa" > Peliculas </label> </a></li> 

                  <li role="presentation"><a href="#series" aria-controls="series" role="tab" data-toggle="tab">  <label class="label_tab color_temaa" > Series </label> </a></li><li role="presentation"><a href="#noticias" aria-controls="noticias" role="tab" data-toggle="tab">  <label class="label_tab color_temaa" > Noticias </label> </a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                  <!--///////////////////////////////////////////////////////////-->
                  <div role="tabpanel"  class="tab-pane active" id="juegos">
                      <br>
                      <h4>Ultimas entradas <span class="label temaa">Juegos</span></h4>
                      <br>
                      <input type="text" class="input_juegos input_jp"  placeholder="Titulo">              
                      <button type="button" id="juegos" class="btn btn-color blanco  buscar_jp ">
                          <span class='glyphicon glyphicon-search' ></span> Filtrar
                      </button>       
                      <br>
                      <br>
                      <div class="panel_juegos">
                          <?php echo $juegos; ?>   
                      </div>
                      <div class="col-xs-12">                     
                          <ul class="pagination pagination-sm pagination_juegos">
                            <?php echo $pagination_juegos; ?>
                          </ul>
                      </div>  

                  </div>                  
                  <!--///////////////////////////////////////////////////////////-->
                  <div role="tabpanel" class="tab-pane fade" id="peliculas"><br>
                      <h4>Ultimas entradas <span class="label temaa blanco"> Peliculas </span></h4>
                      <br>
                      <input type="text" class="input_peliculas input_jp"  placeholder="Titulo">              
                      <button type="button" id="peliculas" class="btn btn-danger  buscar_jp ">
                          <span class='glyphicon glyphicon-search' ></span> Filtrar
                      </button>
                      <br>
                      <br> 
                      <div class="panel_peliculas">
                        <?php echo $peliculas; ?>
                      </div>

                      <div class="col-xs-12">
                          <ul class="pagination pagination-sm pagination_peliculas">
                            <?php echo $pagination_peliculas; ?>
                          </ul>                    
                      </div>

                  </div>
                  <!--///////////////////////////////////////////////////////////-->
                  <div role="tabpanel" class="tab-pane fade" id="series"><br>
                      <h4>Ultimas entradas <span class="label temaa"> Series </span></h4>
                      <br>
                      <input type="text" class="input_series input_jp"  placeholder="Titulo">              
                      <button type="button" id="series" class="btn btn-color blanco  buscar_jp ">
                          <span class='glyphicon glyphicon-search' ></span> Filtrar
                      </button>
                      <br>
                      <br> 
                      <div class="panel_series">
                        <?php echo $series; ?>
                      </div>

                      <div class="col-xs-12">
                          <ul class="pagination pagination-sm pagination_series">
                            <?php echo $pagination_series; ?>
                          </ul>                    
                      </div>
                  </div>
                  <!--///////////////////////////////////////////////////////////-->               
                  <div role="tabpanel" class="tab-pane fade" id="noticias"><br>
                      <h4>Ultimas entradas <span class="label temaa"> Noticias </span></h4>
                      <br>
                      <input type="text" class="input_series input_jp"  placeholder="Titulo">              
                      <button type="button" id="noticias" class="btn btn-color blanco  buscar_jp ">
                          <span class='icon eart' ></span> Filtrar
                      </button>
                      <br>
                      <br> 
                      <div class="panel_series">
                        <?php echo $noticias; ?>
                      </div>

                      <div class="col-xs-12">
                          <ul class="pagination pagination-sm pagination_noticias">
                            <?php echo $pagination_noticias; ?>
                          </ul>                    
                      </div>
                  </div>
              </div>
          </div>
      </div>       
    </div><!--/col tab--> 
</div> <!--/container--> 
<br><br><br> <a href="" style="text-decoration: none;color: #212121;"></a>
<!--/////////////////////////////////////////////////////////////////-->
<div class="modal fade bs-example-modal-lg  fade" id='modal' tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>               
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body "></div>
            <div class="modal-footer"></div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 
<img src="/imagenes/482.gif" class="GIFF">
@include('estilos.scripp')
<script type="text/javascript">
    $(document).ready(function() {
    $('.GIFF').hide()      
      $(document).on('keypress','.buscar_input', function (e) {       
        if(e.which == 13){       
          return false;       
        }
      });  
//////////////////////////////////////////////////////////////////     
      $(document).on('click ','.buscar_tabla', function (a) {
          a.preventDefault();
          var data =$('#formulario_comentarios').serialize();
          var pagina =$(this).attr('id');
          $('tbody').text('cargandoo...');
          $.ajax({
            url: '/Dashboard/filtrarcomentarios/'+pagina,
            type: 'get',
            dataType: 'json',
            data: data,
          })
          .done(function(filtrar){
            $('tbody').html(filtrar.tabla_item);
            $('.pagination_tabla').html(filtrar.pagination);
          })
          .fail(function() {
            $('tbody').text("error");
          })
        
      });      
//////////////////////////////////////////////////////////////////
      $(document).on('click','.ver_comentario', function(b) {
            b.preventDefault();
            $('.modal-title').html('Cargandoo..');
            $('.modal-body').html('Cargandoo..');
            var id= $(this).attr('id');         
            $.ajax({
                url: '/Dashboard/mostrarcomentario/',
                type: 'get',
                dataType: 'json',
                data: {id:id},
            })
            .done(function(mostrar) {
                $('.modal-title').html(mostrar.titulo);
                $('.modal-body').html(mostrar.comentario);
                $('.modal-footer').html(mostrar.responder);
            })
            .fail(function() {
                $('.modal-title').text("error");
            })                       
      }); 
//////////////////////////////////////////////////////////////////
      $(document).on('click','.eliminar_comentario', function(z) {
          z.preventDefault();         
          var id_titulo = $(this).attr('id');
          $('.modal-title').html('Seguro que desea eliminar este comentario');
          $('.modal-body').html("");          
          $('.modal-footer').html(" <button id='"+id_titulo+"' type='button' class='btn blanco temaa eliminar_comentario_accept '><span class='glyphicon glyphicon-trash'></span> Eliminar </button><button type='button' class='btn btn-default ' data-dismiss='modal'>No</button>");       
                                
      }); 
//////////////////////////////////////////////////////////////////
      $(document).on('click','.eliminar_comentario_accept', function(zz) {
          zz.preventDefault();         
          var id = $(this).attr('id');          
          $('.modal-title').html('Eliminando Comentarios...');
          $('.modal-body').addClass('center').html('<img src="/imagenes/482.gif"><br><h4><br><small>Si algo falla te diremos</small></h4>');
          $('.modal-footer').text('');   
            $.ajax({
                url: '/Dashboard/eliminarcomentario/',
                type: 'get',
                dataType: 'json',
                data: {id:id},
            })
            .done(function(dataa) {
              $('.modal-title').html('');
                $('.modal-body').html(dataa.listo);
                $('.modal-footer').html("<button type='button' class='btn  ' data-dismiss='modal'><b>Salir</b></button>");
                $( "."+id ).remove();
            })
            .fail(function() {
              $('.modal-title').html('Error');
                $('.modal-title').text("error");
                $('.modal-footer').html("Error");
            })                       
      }); 

//////////////////////////////////////////////////////////////////
      $(document).on('keyup','.respuesta', function(c) {
          var texto= $(this).val().length;
          if (texto==0) {
            $('.responder').attr('disabled','disabled'); 
          }else{
            $('.responder').removeAttr('disabled');  
          };                      
      }); 
//////////////////////////////////////////////////////////////////
      $(document).on('click','.responder', function(d) {
          d.preventDefault();          
          $(this).text('Cargandoo').attr('disabled','disabled');         
          var id= $(this).attr('id');          
          var respuesta= $('.respuesta').val();
          var respondido=                 
          $.ajax({
              url: '/Dashboard/respondercomentario',
              type: 'post',
              dataType: 'json',
              data: {id:id,respuesta:respuesta},
          })
          .done(function() {                    
              $('.cerrar').html('Listo');
              $('.responder').remove();              
              if (!$('.'+id+' .glyphicon-ok').length  ){//si no tiene icon ok se lo ponemos            
              $('.'+id+'  div').append("<span  class='label label-default'><span  class='glyphicon glyphicon-ok'></span></span>");
              }           
          })
          .fail(function() {
              $('.responder').text("error");
          })          
      });  
//////////////////////////////////////////////////////////////////
      $(document).on('click','.boton_azul', function(e) {//FORMULARIO
          e.preventDefault();
          $('.modal-title').html('Cargandoo..');
          $('.modal-body').html('Cargandoo..');
           id=$(this).attr('id');           
                        
          $.ajax({
              url: '/Dashboard/tableroform/'+id,
              type: 'post',
              dataType: 'json',
          })
          .done(function(fomr) {
          $('.modal-title').html(fomr.titulo);                    
          $('.modal-body').html(fomr.formulario);
          $('.modal-footer').html(fomr.footer);    
          })
          .fail(function() {
              $('.modal-title').text("error");
          })          
      });
//////////////////////////////////////////////////////////////////
      $(document).on('change','#modifi-form', function() {
          $('.guardar_formulario').removeAttr('disabled');
      }); 
      $(document).on('keyup','#modifi-form', function() {
          $('.guardar_formulario').removeAttr('disabled');
      });     
//////////////////////////////////////////////////////////////////
      $(document).on('click','.guardar_formulario', function(f) {
          f.preventDefault();
          var datos =$('#modifi-form').serialize();
          $(this).text('Cargandoo..').attr('disabled','disabled');
          
           id=$(this).attr('id');           
                        
          $.ajax({
              url: '/Dashboard/actualizarjp/'+id,
              type: 'post',
              dataType: 'json',
              data:datos,
          })
          .done(function(actualizar) {
          $('.cerrar').html(actualizar);
          $('.guardar_formulario').remove();    
          })
          .fail(function() {
              $('.guardar_formulario').text("error");
          })          
      });
///////////////////////////////////////////////////////////////////
      $(document).on('click','.juegos,.peliculas ', function(g) {
          g.preventDefault();
          
          var jp = $(this).attr('class'); 
          var pagina =  $(this).attr('id');
          var contenido_jp='.panel_'+jp;
          var pagina_jp='.pagination_'+jp;
            
          $.ajax({
            url: '/Dashboard/paginajp',
            type: 'get',
            dataType: 'json',
            data: {jp: jp,pagina:pagina},
          })
          .done(function(jp) {
            $(contenido_jp).html(jp.jp_item);
            $(pagina_jp).html(jp.pagina_item);              
          })
          .fail(function() {
             $(contenido_jp).text('error');
          });        
      });
///////////////////////////////////////////////////////////////////
      $(document).on('click','.buscar_jp', function(h) {
          h.preventDefault();
          var jp = $(this).attr('id');
          var input = $('.input_' +jp).val();
          
          var contenido_jp='.panel_'+jp;
          var pagina_jp='.pagination_'+jp;

          $(contenido_jp).text('Cargandoo...');
            $(pagina_jp).text('Cargandoo...');           
          
          $.ajax({
            url: '/Dashboard/buscarjp',
            type: 'get',
            dataType: 'json',
            data: {jp: jp,input:input},
          })
          .done(function(buscar__jp) {
            $(contenido_jp).html(buscar__jp.jp_item);
            $(pagina_jp).html(buscar__jp.pagina_item);              
          })
          .fail(function() {
             $(contenido_jp).text('error');
          });   
      });
///////////////////////////////////////////////////////////////////
      $(document).on('click','.eliminar', function(i) {
          i.preventDefault();
          id_eliminar = $(this).parent().attr('id');
         var id_titulo = $(this).attr('id');
          $('.modal-title').html('Seguro que desea eliminar <b class="color_rojo_wa">'+id_eliminar+'</b>');
          $('.modal-body').html("");          
          $('.modal-footer').html(" <button id='eliminar/"+id_titulo+"'' type='button'class='btn btn-danger eliminar_entrada '><span class='glyphicon glyphicon-trash'></span> Borrar </button><button type='button' class='btn btn-default ' data-dismiss='modal'>No</button>");
      });
      $(document).on('click','.eliminar_entrada', function(j) {
          j.preventDefault();
          
          var id_titulo = $(this).attr('id');
          $('.modal-title').html('Eliminando <b class="color_rojo_wa">'+id_eliminar+'</b>');
          $('.modal-body').addClass('center').html('<img src="/imagenes/482.gif"><br><h4>Borrando Entrada<br><small>Si algo falla te diremos</small></h4>');
          $('.modal-footer').text('');

          $.ajax({
            url: '/Dashboard/'+id_titulo,
            type: 'post',
            dataType: 'json',            
          })
          .done(function(dataa) {
            $('.modal-title').html("");
            $('.modal-body').html(dataa.listo);
            $('.'+dataa.id).remove();
             $('.modal-footer').html("<button type='button' class='btn btn-default ' data-dismiss='modal'>Salir</button>");
          })
          .fail(function() {
            $('.modal-body').html('error');
          
          });
          
      });
});//ready//
</script>
</body>
</html>