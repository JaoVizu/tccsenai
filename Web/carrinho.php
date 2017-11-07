<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- IMPORTANDO CSS DO BOOTSTRAP -->
    <link rel="stylesheet" href="res/site/css/bootstrap.min.css">

    <!-- IMPORTANDO FONT-AWESOME PARA ICONES -->
    <link rel="stylesheet" href="res/site/css/font-awesome.min.css">

    <!-- IMPORTANDO SLIDER CSS -->
    <link rel="stylesheet" href="res/site/css/responsiveslides.css">

    <!-- IMPORTADO ANIMATE.CSS -->
    <link rel="stylesheet" href="res/site/css/animate.css">

    <!-- IMPORTANDO MAIN.CSS -->
    <link rel="stylesheet" href="res/site/css/main.css">

    <!-- CSS DOS PRODUTOS -->
    <link rel="stylesheet" href="Detalhes/css/detalhes.css">


	<title>Carrinho</title>
</head>
<body>
	
	<header>
		<?php
			include('site/header.php');
		?>
	</header>

	<section>
		<?php
			include('Carrinho/carrinho.php');
		?>
	</section>

	<footer>
		<?php
			include('site/footer.html');
		?>
	</footer>

</body>
</html>