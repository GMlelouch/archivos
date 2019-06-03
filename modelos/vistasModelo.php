<?php 
	class vistasModelo{
				protected function obtener_vista_modelo($vistas){

					$listaBlanca =	["adminlist","bookinfo","admin","adminsearch","book","catalog","cliente","clientelist","clientesearch","home","libro","accound","data","search"];
					if(in_array($vistas, $listaBlanca)){
						if (is_file("./vistas/contenidos/".$vistas."-view.php")) {
							$contenido="./vistas/contenidos/".$vistas."-view.php";
						}else{
							$contenido="login";
						}


					}elseif($vistas=="login"){
						$contenido="login";

					}elseif($vistas=="index"){
						$contenido="login";
					}else{
						$contenido="404";
					}
						return  $contenido;
				}

	}

 ?>