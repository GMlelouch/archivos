<?php 
	require_once("conexion.php");
	/**
	 * 
	 */
	class datos_acta_archivo extends conexion
	{
		private $cn;
		function __construct()
		{
			$this->cn = parent::conectar();
		}

		public function todo_archivo(){
			$consulta = "SELECT * FROM tbl_archivo";
			$query = mysqli_query($this->cn,$consulta);

			if ($query) {
				return $query;
			}
			else{
				return false;
			}
		}
	}