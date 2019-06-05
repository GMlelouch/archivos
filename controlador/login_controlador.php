<?php 
	require_once("../modelo/login_modelo.php");

	class login_controlador{
		public function ingresar(){
			$usuario = $_POST['usuario'];
			$password = $_POST['password'];			

			$obj = new login_modelo();
			$obj->ingresar($usuario, $password);
		}
	}

	$obj = new login_controlador();
	$obj->ingresar();

 ?>