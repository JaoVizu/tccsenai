<?php
	
	include('../Class/Sql.php');

	//receber os dados via post
	$codproduto = $_POST['CodProduto'];
	$nome = $_POST['NomeProduto'];
	$margem = $_POST['MargemLucro'];
	$valor = $_POST['ValorProduto'];
	$valorvenda = $_POST['ValorVendaProduto'];
	$estoque = $_POST['QntProduto'];
	$qntparcelas = $_POST['QntParcelas'];
	$valorparcela = $_POST['ValorParcela'];
	$descricao = $_POST['Descricao'];
	$categoria = $_POST['Categoria'];

	//query para fazer update

	
	$query = mysqli_query($conn, "CALL sp_products_update('$codproduto','$nome','$valor','$margem','$valorvenda','$estoque','$qntparcelas','$valorparcela','$descricao','$categoria')");

	if($query){
		echo "Dados do cliente alterado com sucesso";
		header("Location: ../admin/index.php");
	}else{
		echo "Ocorreu um erro ao alterar os dados do cliente \n".mysqli_errno($conn);
	}


?>