<?php 
	require_once("../modelo/datos_acta_archivo.php");
	/**
	 * 
	 */
	class datos_acta_archivo_c
	{
		
		public function todo_acta_archivo_c(){
			$obj_bd = new datos_acta_archivo();
			$datos_bd = $obj_bd->todo_archivo();
			$i = 1;
			?>
				<table id="tabla_acta_archivo" class="display responsive nowrap" style="width:100%">
				<thead>
				   <tr>
				      <th scope="col">#</th>
				      <th scope="col">Gerencia / Sub gerencia</th>
				      <th scope="col">Nombre Documento</th>				      
				      <th scope="col">Folios</th>
				      <th scope="col">Numeracion</th>
				      <th scope="col">Observaciones</th>
				      <th scope="col">Codigo</th>
				      <th scope="col">Anaquel</th>				      
				      <th scope="col">Nivel</th>				      
				      <th scope="col">numero_archivador</th>
				      <th scope="col">Archivo</th>
				      <th scope="col">Editar</th>				       
				      <th scope="col">Eliminar</th>	
				    </tr>
				 </thead>
				 <tbody>
			<?php 

			while ($dato = mysqli_fetch_assoc($datos_bd)) {
				?>
				<tr>
					<td><?php echo $i++; ?></td>
					<td><?php echo $dato['archivo_gerencia']; ?></td>
					<td><?php echo $dato['nombre_documento']; ?></td>
					<td><?php echo $dato['folios']; ?></td>
					<td><?php echo $dato['numeracion']; ?></td>
					<td><?php echo $dato['observaciones']; ?></td>
					<td><?php echo $dato['codigo']; ?></td>
					<td><?php echo $dato['anaquel']; ?></td>
					<td><?php echo $dato['nivel']; ?></td>
					<td><?php echo $dato['numero_archivador']; ?></td> 
					<td><a href="<?php echo $dato['archivo']; ?>" target="_blank"><img src="materialize/img/pdf.png" style="width: 5%;height: 5%;"></a></td>
					<td><a class="waves-effect waves-light btn modal-trigger" href="#modal_editar" onclick="traer_datos_editar_nac(<?php echo $dato['id_archivo']; ?>)">Editar</a></td>				
					<td><button class="waves-effect waves-light btn" onclick="eliminar_archivo(<?php echo $dato['id_archivo']; ?>)">Eliminar</button></td>
				</tr>
				<?php 
			}
			?>
				</tbody>
			</table>
			<?php 
		}


	}

	$obj = new datos_acta_archivo_c();
	$obj->todo_acta_archivo_c();

?>

<script type="text/javascript">
	miDataTable();
 	function  miDataTable(){
    $('#tabla_acta_archivo').DataTable({

      "language": {
      "emptyTable":			"<i>No hay datos disponibles en la tabla.</i>",
      "info":		   		"Del _START_ al _END_ de _TOTAL_ ",
      "infoEmpty":			"Mostrando 0 registros de un total de 0.",
      "infoFiltered":			"(filtrados de un total de _MAX_ registros)",
      "infoPostFix":			"(actualizados)",
      "lengthMenu":			"Mostrar _MENU_ registros",
      "loadingRecords":		"Cargando...",
      "processing":			"Procesando...",
      "search":			"<span style='font-size:15px;'>Buscar:</span>",
      "searchPlaceholder":		"Dato para buscar",
      "zeroRecords":			"No se han encontrado coincidencias.",
      "paginate": {
        "first":			"Primera",
        "last":				"Última",
        "next":				"Siguiente",
        "previous":			"Anterior"
      },
      "aria": {
        "sortAscending":	"Ordenación ascendente",
        "sortDescending":	"Ordenación descendente"
      }
    },

    "lengthMenu":		[[3,5,7, 10, 20, 25, 50, -1], [3,5,7, 10, 20, 25, 50, "Todos"]],
    "iDisplayLength":	3,
    "bDestroy": true




    });
}
</script>