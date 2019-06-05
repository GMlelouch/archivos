<?php 
	require_once("conexion.php");

	/**
	 * 
	 */
	class eliminar_archivo extends conexion
	{
		private $cn;		
		function __construct()
		{
			$this->cn = parent::conectar();
		}

		public function eliminar(){
			$id = $_POST['id'];
			
			$consulta = "DELETE FROM tbl_archivo WHERE id_archivo = '$id'";
			$query = mysqli_query($this->cn, $consulta);

			if ($query) {
				?>

				  <script type="text/javascript">
							M.toast({html: 'Se elimino correctamente!'});
				  </script>
				<?php	
			}
			else{
				?>
				  <script type="text/javascript">
							M.toast({html: 'No se pudo eliminar!'});
				  </script>
				<?php	
			}
		}
	}

	$obj = new eliminar_archivo();
	$obj->eliminar();

 ?>