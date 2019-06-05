<?php 
	require_once("conexion.php");
	/**
	 * 
	 */
	class traer_datos_acta_archivo_modelo extends conexion
	{
		private $cn;
		function __construct()
		{
			$this->cn = parent::conectar();
		}

		public function datos($id){
			$consulta = "SELECT * FROM tbl_archivo WHERE id_archivo= '$id'";
			$query = mysqli_query($this->cn, $consulta);

			if ($query) {
				return $query;
			}
			else{
				return false;
			}
		}
	}