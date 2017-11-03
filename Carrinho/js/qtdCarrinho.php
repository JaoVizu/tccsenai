<?php
	session_start();
	$id = $_POST['id'];
	$preco = $_POST['preco'];
	$qtd = $_POST['qtd'];
	
	if(isset($_SESSION['pedido'][$id])){
		$_SESSION['pedido'][$id] = $qtd;
		echo "R$ " . (number_format($preco*$qtd,2,",","."));	
	}

	

	
?>