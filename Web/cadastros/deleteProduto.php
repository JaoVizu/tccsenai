<?php
	include('../Class/Sql.php');

	$codproduto = $_GET['codproduto'];
	$status = NULL;

	$sqlpegaStats = mysqli_query($conn, "SELECT StatusProduto FROM  Produto WHERE CodProduto = '$codproduto'");

	//pegar o campo e armazenar na variavel
	foreach($sqlpegaStats as $q){ $status = $q['StatusProduto'];}

	try{
		
		//condição para ver o status do pedido
		if(strtoupper($status) === 'ATIVO'){
			//fazendo update
			$sqlStatus = mysqli_query($conn, " UPDATE Produto SET StatusProduto = 'INATIVO' WHERE CodProduto = '$codproduto'");

			//verificar se a query trouxe true
			if($sqlStatus){header('Location:../admin/products.php');}else{ echo "Ocorreu um erro, consulte o desenvolvedor";}

		}else{
			//fazendo update
			$sqlStatus = mysqli_query($conn, " UPDATE Produto SET StatusProduto = 'ATIVO' WHERE CodProduto = '$codproduto'");

			//verificar se a query trouxe true
			if($sqlStatus){header('Location:../admin/products.php');}else{ echo "Ocorreu um erro, consulte o desenvolvedor";}

		}
	

	}catch(Exception $e){
		print('Ocorreu um erro, consulte o desenvolvedor' . $e->getMessage());
	}

	if($sqldel){
		header('Location:../admin/products.php');
	}else{
		echo "Deu merada";
	}
?>