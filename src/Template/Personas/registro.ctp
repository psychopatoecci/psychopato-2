<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop - Wishlist</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet"> <!--Galerias-->
    <link href="css/price-range.css" rel="stylesheet"> <!--Slider-->
    <link href="css/animate.css" rel="stylesheet"> <!--Animaciones-->
	<link href="css/responsive.css" rel="stylesheet"> <!--Para móviles-->
	<link href="css/main.css" rel="stylesheet"> 

    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/home/favicon.ico">

</head>

<body>
	
	<!--Header-->
	<header id="header">
		<?php include(dirname(__FILE__)."/../includes/header.php");?>
	</header>

		<div class="container">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="signup-form">
					<h2>Registro de nuevo usuario</h2>
					<?= $this->Form->create(null,['url'=>['controller' => 'Personas', 'action' => 'registro']]) ?>
                                        <?= $this->Form->input('reg', array('type' => 'hidden', 'value' => true)) ?>
					<?= $this->Form->input('username', ['class' => 'col-sm-2 col-sm-offset-1', 'placeholder' => 'Nombre de usuario', 'label' => false, 'required' ]) ?>
					<?= $this->Form->input('correo',   ['class' => 'col-sm-2 col-sm-offset-1', 'placeholder' => 'Correo', 'label' => false, 'required', 'type' => 'email' ]) ?>
					<?= $this->Form->input('password', ['class' => 'col-sm-2 col-sm-offset-1', 'placeholder' => 'Contraseña', 'label' => false, 'required', 'type' => 'password' ]) ?>
					<?= $this->Form->button('Registrarse', ['class' => 'btn btn-default']) ?>
				
					<?= $this->Form->end() ?>

				</div>
			</div>
			<div class="col-sm-3 col-sm-offset-1">
				<div class="signup-form">
					<center>
						<h2>¿Ya tienes una cuenta?</h2>
                                                <?= $this->Form->create(null,['url'=>['controller' => 'Users', 'action' => 'login']]) ?>

                                                <?= $this->Form->button('Iniciar sesión', ['class' => 'btn btn-default']) ?>
                                                <?= $this->Form->end() ?>
						<!--<button type='button' onClick="parent.location='../users/login'" class='btn btn-default'
								title = 'Iniciar sesión con una cuenta ya creada'>¡Inicia sesión aquí!</button>-->
					</center>
				</div>
			</div>
		</div>
		<br><br><br>
	
	<!--/Footer-->
	<footer id="footer">
		<?php include(dirname(__FILE__)."/../includes/footer.php");?>
	</footer>

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/price-range.js"></script> <!-- Para Slider-->
    <script src="js/jquery.prettyPhoto.js"></script> <!--Para Galerias-->
    <script src="js/main.js"></script>
</body>
</html>
