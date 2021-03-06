<?php
$target_dir = $_POST['val1'];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$uploadOk = 1;

if(isset($_POST["submit"])) {
	//$target_dir = "images/productos/PROD101406/Portada/";
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.\r\n";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Este archivo ya existe. ";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Solo se permiten los formatos JPG, JPEG, PNG y GIF";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "La imagen no se ha subido.";
// if everything is ok, try to upload file
} else {
	
	//Borrar todas las portadas, solo debe haber una
	if (preg_match('/Portada/', $target_dir)) {
		$files = glob($target_dir.'*'); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file)) {
			  unlink($file); // delete file
		  }
		}
	}

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "La imagen ". basename( $_FILES["fileToUpload"]["name"]). " ha subido subida como portada de este producto. Cierre esta ventana.";
    } else {
        echo "Ha ocurrido un error con la subida de la imagen";
    }
}
?>