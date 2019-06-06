<div class="row">
    <div class="col s12 m5" style="width: 100%;">
      <div class="card-panel teal" style="background: white !important;">
        <center><h3>Acta de Archivo</h3></center>

<!--Modal-->
<div id="avisos">
  
</div>
<div id="avisos_editar">
  
</div>
<!--Modal editar datos-->
  <!--Agregar datos nacimiento-->
  <div id="modal_editar" class="modal">
    <div class="modal-content">
      <center><h4>Agregar Archivo</h4></center>
      <form class="col s12" id="formulario_acta_archivo">
        <div id="datos_editar_acta_archivo">
          

          
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button class="modal-close waves-effect waves-green btn-flat" id="editar_datos_archivo">Guardar</button>
    </div>    
  </div>
<!-- Modal Structure -->
<!---->

<!--Agregar datos nacimiento-->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <center><h4>Agregar Achivo</h4></center>
      <div class="row">
    <form class="col s12" id="formulario_acta_archivo_1" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s6">
          <input id="archivo_gerencia" name="archivo_gerencia" type="text" class="validate">
          <label for="archivo_gerencia">Gerencia/Sub Gerencia</label>
        </div>
        <div class="input-field col s6">
          <input placeholder=" " id="nombre_documento" name="nombre_documento" type="text" class="validate">
          <label for="nombre_documento">Nombre Documento</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="folios" name="folios" type="text" class="validate">
          <label for="folios">Folios</label>
        </div>
        <div class="input-field col s6">
          <input id="numeracion" name="numeracion" type="text" class="validate">
          <label for="numeracion">Numeracion</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s6">
          <input id="observaciones" name="observaciones" type="text" class="validate">
          <label for="observaciones">Observaciones</label>
        </div>
        <div class="input-field col s6">
          <input  id="codigo" name="codigo" type="text" class="validate">
          <label for="codigo">Codigo Ubicacion Archivo</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s6">
          <input id="anaquel" name="anaquel" type="text" class="validate">
          <label for="anaquel">Anaquel Ubicacion Archivo</label>
        </div>
        <div class="input-field col s6">
          <input placeholder=" " id="nivel" name="nivel" type="text" class="validate">
          <label for="nivel">Nivel Ubicacion Archivo</label>
        </div>

        <div class="row">
        <div class="input-field col s12">
          <input id="numero_archivador" name="numero_archivador" type="text" class="validate">
          <label for="numero_archivador">Numero Archivador</label>
        </div>
        <input type="file" name="acta_archivo_file" id="acta_archivo_file">
      </div>
      </div>    
  </div>
    </div>    
    <div class="modal-footer">
      <button class="modal-close waves-effect waves-green btn-flat" id="enviar_datos_archivo">Agregar</button>
      </form>
    </div>    
  </div>
<!-- Modal Structure -->

  <div class="container">
    
    <button style="float:right" data-target="modal1" class="btn modal-trigger btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></button>
      <div id="datos_acta_archivo">
        
      </div>
  </div>
      </div>
    </div>
  </div>



  <script type="text/javascript">  

    $(document).ready(function(){        

       $('#formulario_acta_archivo_1').on('submit', function (e) {
          //prevents reloading of page
          e.preventDefault();
          //get file data
          var data = new FormData($(this)[0]);
          data.append('id', $(this).attr('id'));
          console.log(data);
          //run upload.php script and append result to draggable block
          $.ajax({
             type: 'POST',
            url: "modelo/insertar_archivo.php",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function (data) {
              $( "#avisos").html(data);
              datos_acta_nacimiento();
            }
          });

        });
      });     
    
  
    datos_acta_archivo();
 function datos_acta_archivo(){
  $.ajax({
    method : "GET",
    url : "controlador/datos_acta_archivo_c.php",
    success : function(datos){
      $("#datos_acta_archivo").html(datos);
    }
  })
 }
 
  </script>