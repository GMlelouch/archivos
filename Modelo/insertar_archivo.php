<?php 
	require_once("conexion.php");
	session_start();
	/**
	 * 
	 */
	class insertar_acta_archivo extends conexion
	{
		private $cn;
		function __construct()
		{
			$this->cn = parent::conectar();
		}
		public function insertar_acta(){
			if (!empty($_POST['archivo_gerencia']) and !empty($_POST['nombre_documento']) and 
				!empty($_POST['folios']) and !empty($_POST['numeracion']) and
				!empty($_POST['observaciones']) and !empty($_POST['codigo'])and
				!empty($_POST['anaquel'])and !empty($_POST['nivel'] and !empty($_POST['numero_archivador']) ) {

				$archivo_gerencia = $_POST['archivo_gerencia'];
				$nombre_documento = $_POST['nombre_documento'];
				$folios = $_POST['folios'];
				$numeracion = $_POST['numeracion'];
				$observaciones = $_POST['observaciones'];
				$codigoanaquel = $_POST['codigoanaquel'];
				$anaquel = $_POST['anaquel'];
				$nivel = $_POST['nivel'];
				$numero_archivador = $_POST['numero_archivador'];
				$id_usuario = $_SESSION['id_usuario'];

				//Guardar documento
				$tmp_name = $_FILES['acta_archivo_file']['tmp_name'];
			    //si hemos enviado un directorio que existe realmente y hemos subido el archivo    
			     $img_file = $_FILES['acta_archivo_file']['name'];

			        $img_type = $_FILES['acta_archivo_file']['type'];

			        $ruta = "carpeta_acta_archivos/".$img_file;
			        
			     
			            //¿Tenemos permisos para subir la imágen?
			            
			          $res_archivo = move_uploaded_file($tmp_name, $ruta);

			          $ruta_enviar = "modelo/".$ruta;

			          if ($res_archivo == true ) {
			          		$consulta = "INSERT INTO `tbl_archivo` (`id_archivo`, `archivo_gerencia`, `nombre_documento`, `folios`, `numeracion`, `observaciones`, `codigo`, `anaquel`, `nivel`, `numero_archivador`, id_usuario, archivo) VALUES (NULL, '$archivo_gerencia', '$nombre_documento', '$folios', '$numeracion', '$observaciones', '$codigo', '$anaquel', '$nivel', '$numero_archivador', '$id_usuario', '$ruta_enviar')";
			          }
			          else{
			          	echo "Error!. Comunicar con el desarrollador";
			          }


				

				$query = mysqli_query($this->cn, $consulta);

				if ($query) {
					?>

				  <script type="text/javascript">
							M.toast({html: 'Se guardo correctamente!'});
							window.location.href = "actaArchivo";
						</script>
					<?php
				}
				else{
					?>

				  <script type="text/javascript">
							M.toast({html: 'No se pudo guardar!'});
							//window.location.href = "actaNacimiento";
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

	$obj = new insertar_acta_archivo();
	$obj->insertar_acta();
 ?>