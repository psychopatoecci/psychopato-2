<html>
<body>

<?php
$provinciasBase = array('San Jose','Alajuela','Cartago','Heredia','Guanacaste','Puntarenas','Limon','');
?>

<?php //Aquí quedan guardados los nuevos datos
$provincia1 = $provinciasBase[$_POST['Provincia1']];
$canton1 = $_POST['canton1'];
$distrito1 = $_POST['distrito1'];
$exacta1 = $_POST['exacta1'];
$provincia2 = $provinciasBase[$_POST['Provincia2']];
$canton2 = $_POST['canton2'];
$distrito2 = $_POST['distrito2'];
$exacta2 = $_POST['exacta2'];
$provincia3 = $provinciasBase[$_POST['Provincia3']];
$canton3 = $_POST['canton3'];
$distrito3 = $_POST['distrito3'];
$exacta3 = $_POST['exacta3'];
?>

<br>Provincia 1: <?php echo $provincia1; ?>
<br>Cantón 1: <?php echo $canton1; ?>
<br>Distrito 1: <?php echo $distrito1; ?>
<br>Dirección exacta 1: <?php echo $exacta1; ?>
<br>Provincia 2: <?php echo $provincia2; ?>
<br>Cantón 2: <?php echo $canton2; ?>
<br>Distrito 2: <?php echo $distrito2; ?>
<br>Dirección exacta 2: <?php echo $exacta2; ?>
<br>Provincia 3: <?php echo $provincia3; ?>
<br>Cantón 3: <?php echo $canton3; ?>
<br>Distrito 3: <?php echo $distrito3; ?>
<br>Dirección exacta 3: <?php echo $exacta3; ?>
</body>
</html>