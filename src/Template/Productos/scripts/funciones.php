<?php
	function obtenerPortada($id) {
		$urlCarpeta = "images/productos/".$id."/Portada/";
		if (!file_exists($urlCarpeta)) { //Si no existe la carpeta, la crea
			mkdir($urlCarpeta, 0777, true);
			$urlCompleta = "images/sinportada.png";
		} else {
			$archivoPortada = array_diff(scandir($urlCarpeta), array('.', '..'));
			if (count($archivoPortada) < 1) { //No hay portada asignada
				$urlCompleta = "/../images/sinportada.png";
			} else {
				$urlCompleta = $urlCarpeta.$archivoPortada[2];
			}
			
		}
		
		return $urlCompleta;
	}
	
	function obtenerPlataformas() {
        $con = $this -> Productos -> find ('all', array(
            'fields' => array('Productos.idProducto','Productos.nombreProducto','Productos.precio')));
            
        $plataformas = [];
        foreach ($plataformas as $con) {
          array_push($plataformas, $con);
        }
	}
?>