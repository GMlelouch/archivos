<?php 
	require_once("conexion.php");
	/**
	 * 
	 */
	class editar_acta_archivo extends conexion
	{
		private $cn;
		function __construct()
		{
			$this->cn = parent::conectar();
		}
		public function editar(){
			if (!empty($_POST['archivo_gerencia']) and 
				!empty($_POST['nombre_documento']) and !empty($_POST['folios']) and
				!empty($_POST['numeracion']) and !empty($_POST['observaciones'])and
				!empty($_POST['codigo']) and !empty($_POST['anaquel']) and !empty($_POST['nivel']) and !empty($_POST['numero_archivador'])  ) {


				$archivo_gerencia = $_POST['archivo_gerencia'];
				$nombre_documento = $_POST['nombre_documento'];
				$folios = $_POST['folios'];
				$numeracion = $_POST['numeracion'];
				$observaciones = $_POST['observaciones'];
				$codigo = $_POST['codigo'];
				$anaquel = $_POST['anaquel'];
				$nivel = $_POST['nivel'];
				$numero_archivador = $_POST['numero_archivador'];
				$id_archivo = $_POST['id_archivo'];
				

				$consulta = "UPDATE tbl_archivo
							SET archivo_gerencia = '$archivo_gerencia', nombre_documento = '$nombre_documento',
							folios = '$folios', numeracion = '$numeracion',
							fecha_registro = '$fecha_registro', observaciones = '$observaciones',
							codigo = '$codigo', anaquel = '$anaquel', nivel = '$nivel' , numero_archivador = '$numero_archivador'
							WHERE id_acta_nacimiento = '$id_acta_nacimiento'";



				$query = mysqli_query($this->cn, $consulta);

				if ($query) {
					?>
						<script type="text/javascript">
							M.toast({html: 'Se actualizo correctamente!'});
						</script>
				  
					<?php
				}
				else{
					?>

				  <script type="text/javascript">
							M.toast({html: 'No se pudo actualizar!'});
						</script>
					<?php
				}
			}
			else{
				?>

				  <script type="text/javascript">
							M.toast({html: 'Completar todos los campos!'});
						</script>
					<?php
			}
		}
	}

	$obj = new editar_acta_archivo();
	$obj->editar();
 ?>
<?php
   if (move_uploaded_file($_FILES['userfile']['tmp_name'], "/documents/new/")) {
      print "Uploaded successfully!";
   } else {
      print "Upload failed!";
   }
?>