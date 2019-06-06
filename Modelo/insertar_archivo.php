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

			if (!empty($_POST['archivo_gerencia']) && !empty($_POST['nombre_documento'])) {
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

			        $ruta = "archivos/".$img_file;
			        
			     
			            //¿Tenemos permisos para subir la imágen?
			            
			          $res_archivo = move_uploaded_file($tmp_name, $ruta);
			          
			          
			          		$consulta = "INSERT INTO `tbl_archivo` (`id_archivo`, `archivo_gerencia`, `nombre_documento`, `folios`, `numeracion`, `observaciones`, `codigo`, `anaquel`, `nivel`, `numero_archivador`, `archivo`, `id_usuario`) VALUES (NULL, '$archivo_gerencia	', '$nombre_documento', '$folios', '$numeracion', '$observaciones', '$codigoanaquel', '$anaquel', '$nivel', '$numero_archivador', '$ruta', '1');";
			          		$query = mysqli_query($this->cn, $consulta);

			          		if ($query) {
								echo "Se realizo la consulta correctamente";
							}
							else{
								echo "No se guardo los datos";
							}

			          
			          
				
			}
			else{
				echo "Completar los datos";
			}

		}

 }

	$obj = new insertar_acta_archivo();
	$obj->insertar_acta();
 