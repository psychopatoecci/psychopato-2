<?php
	function obtenerPortada($id) {
		$urlCarpeta = "images/productos/".$id."/Portada/";
		if (!file_exists($urlCarpeta)) { //Si no existe la carpeta, la crea
			mkdir($urlCarpeta, 0777, true);
			$urlCompleta = $urlCarpeta;
		} else {
			$archivoPortada = array_diff(scandir($urlCarpeta), array('.', '..'));
			$urlCompleta = $urlCarpeta.$archivoPortada[2];
		}
		
		return $urlCompleta;
	}
?>