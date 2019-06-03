<?php 
if($peticionAjax){
 		require_once  "../core/mainModel.php";
 	}else{
 		require_once  "./core/mainModel.php";
 	}
 	
 	class administradorModelo extends mainModel{
 		protected function agregar_administrador_modelo($datos){
 				$sql=mainModel::conectar()->prepare("INSERT INTO admin(AdminDNI,AdminNombre,AdminApellido,AdminTelefono,AdminDireccion,CuentaCodigo) VALUES (:DNI,:Nombre,:Apellido,:Telefono,:Direccion,:Codigo)");	

 				$sql->bindparam(":DNI",$datos['DNI']);
 				$sql->bindparam(":Nombre",$datos['Nombre']);
 				$sql->bindparam(":Apellido",$datos['Apellido']);
 				$sql->bindparam(":Telefono",$datos['Telefono']);
 				$sql->bindparam(":Direccion",$datos['Direccion']);
 				$sql->bindparam(":Codigo",$datos['Codigo']);
 				$sql->execute();
 	 	return $sql;
 		}

 	}

