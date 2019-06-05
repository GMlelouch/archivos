<?php 
	/**
	 * 
	 */
	class conexion
	{
		private $host = "localhost";
		private $user = "root";
		private $pass = "";
		private $bd = "sistema_archivos";

		public function conectar(){
			$con = mysqli_connect("localhost","root","","sistema_archivos");
			if (!$con) {
				echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		    exit;
			}
			else{
				return $con;
			}
		}
		
	}