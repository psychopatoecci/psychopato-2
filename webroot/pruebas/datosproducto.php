<html>
<body>

<?php
$generosBase = array('aventura','rpg','plataformas','conduccion','deportes','shooter','lucha','otros');
$plataformasBase = array('ps4','ps3','one','360','wii','wiiu','pc','vita','3ds','ds');
?>

<?php //Aquí quedan guardados los nuevos datos
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['Categoria'];
$genero = $generosBase[$_POST['Genero']];
$plataforma = $plataformasBase[$_POST['Plataforma']];
?>

<br>ID: <?php echo $id; ?>
<br>Nombre: <?php echo $nombre; ?>
<br>Descripción: <?php echo $descripcion; ?>
<br>Categoría: <?php echo $categoria; ?>
<br>Genero: <?php echo $genero; ?>
<br>Plataforma: <?php echo $plataforma; ?>

</body>
</html>