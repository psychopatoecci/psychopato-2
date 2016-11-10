<html>
<body>

<?php //Aquí quedan guardados los nuevos datos
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$telcasa = $_POST['telcasa'];
$teltrabajo = $_POST['teltrabajo'];
$telcelular = $_POST['telcelular'];
$telotro = $_POST['telotro'];
$fecha = $_POST['fecha'];
?>

<br>Identificación: <?php echo $id; ?>
<br>Nombre: <?php echo $nombre; ?>
<br>Primer apellido: <?php echo $apellido1; ?>
<br>Segundo apellido: <?php echo $apellido2; ?>
<br>Telefono de casa: <?php echo $telcasa; ?>
<br>Telefono de trabajo: <?php echo $teltrabajo; ?>
<br>Telefono del celular: <?php echo $telcelular; ?>
<br>Telefono (otro): <?php echo $telotro; ?>
<br>Fecha de nacimiento: <?php echo $fecha; ?>
</body>
</html>