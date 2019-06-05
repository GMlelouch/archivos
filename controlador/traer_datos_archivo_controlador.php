<?php 
  require_once("../modelo/traer_datos_acta_archivo_modelo.php");
  /**
   * 
   */
  class traer_datos_acta_archivo
  {
    
    public function datos_acta_archivo(){
      $id = $_POST['id'];
      $datos_m = new traer_datos_acta_archivo_modelo();
      $datos_bd = $datos_m->datos($id);

      $datos = mysqli_fetch_assoc($datos_bd);

      ?>
        <div class="row">
        <input type="text" hidden name="id_archivo" id="id_archivo" value="<?php echo $datos['id_archivo']; ?>">
      <div class="row">
        <div class="input-field col s6">
          <input value="<?php echo $datos['archivo_gerencia']; ?>" id="archivo_gerencia" name="archivo_gerencia" type="text" class="validate">
          <label class="active" for="archivo_gerencia">Gerencia / Sub Gerencia </label>
        </div>
        <div class="input-field col s6">
          <input value="<?php echo $datos['nombre_documento']; ?>" id="nombre_documento" name="nombre_documento" type="text" class="validate">
          <label class="active" for="nombre_documento">Nombre Documento</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input value="<?php echo $datos['folios']; ?>" id="folios" name="folios" type="text" class="validate">
          <label class="active" for="folios">folios</label>
        </div>
        <div class="input-field col s6">
          <input value="<?php echo $datos['numeracion']; ?>" id="numeracion" name="numeracion" type="text" class="validate">
          <label class="active" for="numeracion">Numeracion</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s6">
          <input value="<?php echo $datos['numero_libro']; ?>" id="numero_libro" name="numero_libro" type="text" class="validate">
          <label class="active" for="numero_libro">Numero Libro</label>
        </div>
        <div class="input-field col s6">
          <input value="<?php echo $datos['numero_folio']; ?>" id="numero_folio" name="numero_folio" type="text" class="validate">
          <label class="active" for="numero_folio">Numero Folio</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s6">
          <input value="<?php echo $datos['observaciones']; ?>" id="observaciones" name="observaciones" type="text" class="validate">
          <label class="active" for="observaciones">Observaciones</label>
        </div>
        <div class="input-field col s6">
          <input value="<?php echo $datos['codigo']; ?>" id="codigo" name="codigo" type="date" class="validate">
          <label class="active" for="codigo">Codigo</label>
        </div>
        <div class="row">
        <div class="input-field col s12">
          <input value="<?php echo $datos['anaquel']; ?>" id="anaquel" name="anaquel" type="text" class="validate">
          <label class="active" for="anaquel">Anaquel</label>
        </div>
      </div>
      </div>    
      </div>
      <?php 
    }

  }

  $obj = new traer_datos_acta_archivo();
  $obj->datos_acta_archivo();
 ?>