		   <?php  
 	if($peticionAjax){
 		require_once  "../core/configAPP.php";
 	}else{
 		require_once  "./core/configAPP.php";
 	}


 class mainModel{
 	protected function conectar(){
 		$enlace = new PDO(SGBD,USER,PASS);
 		return $enlace;

 	}
 	 protected function ejecutar_consulta_simple($consulta){
 	 	$respuesta=self::conectar()->prepare($consulta);
 	 	$respuesta->execute();
 	 	return $respuesta;
   }

 	 protected function agregar_cuenta($datos){
 	 	$sql=self::conectar()->prepare("INSERT INTO cuenta(CuentaCodigo,CuentaPrivilegio,CuentaUsuario,CuentaClave,CuentaEmail,CuentaEstado,CuentaTipo,CuentaGenero	,CuentaFoto) VALUES(:Codigo,:Privilegio,:Usuario,:Clave,:Email,:Estado,:Tipo,:Genero,:Foto)");
 	 	$sql->bindparam(":Codigo",$datos['Codigo']);
 	 	$sql->bindparam(":Privilegio",$datos['Privilegio']);
 	 	$sql->bindparam(":Usuario",$datos['Usuario']);
 	 	$sql->bindparam(":Clave",$datos['Clave']);
 	 	$sql->bindparam(":Email",$datos['Email']);
 	 	$sql->bindparam(":Estado",$datos['Estado']);
 	 	$sql->bindparam(":Tipo",$datos['Tipo']);
 	 	$sql->bindparam(":Genero",$datos['Genero']);
 	 	$sql->bindparam(":Foto",$datos['Foto']);
 	 	$sql->execute();
 	 	return $sql;
 	 }
 	 protected function eliminar_cuenta($codigo){
 	 	$sql=self::conectar()->prepare("DELETE FROM  cuenta WHERE CuentaCodigo =:codigo");
 	 	$sql->bindparam(":codigo",$codigo);
 	 	$sql->execute();
 	 	return $sql;
}
 	 
		public static function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}
		public static function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}
		protected function generar_codigo_aleatorio($letra,$longitud,$num){
		for ($i=1; $i <=$longitud ; $i++){ 
			$numero = rand(0,9);
			$letra = $numero ;
		}
 	 return $letra.$num;
 	}
 		
 	protected function limpiar_cadena($cadena){ 

 		$cadena=trim($cadena);
 		$cadena=stripslashes($cadena);
 		$cadena=str_ireplace("<script>", "", $cadena);
 		$cadena=str_ireplace("<script  src>", "", $cadena);
 		$cadena=str_ireplace("<script  type>", "", $cadena);
 		$cadena=str_ireplace("SELECT * FROM ", "", $cadena);
 		$cadena=str_ireplace("DELETE * FROM ", "", $cadena);
 		$cadena=str_ireplace("INSERT * FROM ", "", $cadena);
 		$cadena=str_ireplace("--", "", $cadena);
 		$cadena=str_ireplace("[", "", $cadena);
 		$cadena=str_ireplace("]", "", $cadena);
 		$cadena=str_ireplace("==", "", $cadena);
 		return $cadena;
 	}
 	protected function sweet_alert($datos){
 		if($datos['Alerta']=="simple"){
 			$alerta="
 			<script>
 				swall(
 					'".$datos['Titulo']."',
 					'".$datos['Texto']."',
 					'You clicked the button!',
 					'succes'
 			</script>
 			";
 		}elseif($datos['Alerta']=="recargar"){
 			$alerta="
 	<script>
	swal({
		title:'".$datos['Titulo']."',
		text:'".$datos['Texto']."' ,
		type:'".$datos['Tipo']."',
		confirmButtonText:'aceptar'
		}).then(function();{
			location.reload();
		});
 	</script>
 			"; 
 		}elseif($datos['Alerta']=="limpiar"){
 		 			$alerta="
 	<script>
	swal({
		title:'".$datos['Titulo']."',
		text:'".$datos['Texto']."' ,
		type:'".$datos['Tipo']."',
		confirmButtonText:'aceptar'
		}).then(function();{
			$('.FormularioAjax'[0].reset();
		});
 	</script>";
 			
 	}
 	return $alerta;

  }
}
?>