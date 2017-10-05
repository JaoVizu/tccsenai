<?php

	include('../Class/Sql.php');

	$procurar = $_POST['procurar'];
	$buscar = $_POST['buscar'];
	$consulta = NULL;

	if($buscar == 'produto'){
		
		$consulta = mysqli_query($conn, "SELECT * FROM produto WHERE nomeproduto LIKE '%".$procurar."%'");
		$x = mysqli_fetch_array($consulta);
		echo $x['NomeProduto'];

		
	}else if($buscar == 'cliente'){

		$consulta = mysqli_query($conn, "SELECT * FROM cliente WHERE nomecliente LIKE '%".$procurar."%'");
		$x = mysqli_fetch_array($consulta);
		echo $x['NomeCliente'];
	}
?>