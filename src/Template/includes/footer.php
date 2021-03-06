<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tienda de videojuegos ficticia">
    <meta name="author" content="PsychoPato">
    <title>PsychoPatoShop</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet"> <!--Fuentes-->
    <link href="../css/prettyPhoto.css" rel="stylesheet"> <!--Galerias-->
    <link href="../css/price-range.css" rel="stylesheet"> <!--Slider-->
    <link href="../css/animate.css" rel="stylesheet"> <!--Animaciones-->
	<link href="../css/responsive.css" rel="stylesheet"> <!--Para móviles-->
	<link href="../css/main.css" rel="stylesheet"> 

    <!--[if lt IE 9]> 
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/home/favicon.ico">

</head>

<div class="footer-widget">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<div class="single-widget">
					<?php if($this->request->session()->read('Auth.User.username') == "admin"){?>
					<h2>Administración</h2>
					<ul class="nav nav-pills nav-stacked">
						<li><a href="../adminProductos">Administración de productos</a></li>
						<li><a href="../adminUsuarios">Administración de usuarios</a></li>
					</ul>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="footer-bottom">
	<div class="container">
		<div class="row">
			<p class="pull-left">Corporación PsychoPato S.A. Todos los derechos reservados</p>
			<p style= 'margin-right: 50px;' class="pull-right">UCR - 2016</p>
		</div>
	</div>
</div>
