<?php 
		session_start();
	 //session_start('id_usuario');
	require_once("conexion.php");
	class login_modelo extends conexion{

		public function ingresar($usuario, $password){	

			$consulta = "SELECT * FROM tbl_usuario WHERE usuario = '$usuario' AND password = '$password'";

			$resultado = mysqli_query(conexion::conectar(), $consulta);

			$fila = mysqli_fetch_assoc($resultado);

			$cantidad = mysqli_num_rows($resultado);
			
			//echo $fila['usuario'];

			//echo $ver_datos;

			if ($cantidad > 0) {				
					$_SESSION['usuario'] = $usuario;
					$_SESSION['id_usuario'] = $fila['id_usuario'];
					$_SESSION['tipo_usuario'] = $fila['tipo_usuario'];
					$_SESSION['ingreso_usuario'] = true;
					$_SESSION['start'] = time();
					$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
					?>
				<script type="text/javascript">
						 M.toast({html: 'Ingresando al sistema!'})
						 window.location.href = "home";
					</script>

				<?php 
											
			}
			else{
				?>

				<script type="text/javascript">
					 M.toast({html: 'Verifique los datos!'})
					</script>

				<?php 

												
			}

		}
	}


 ?>