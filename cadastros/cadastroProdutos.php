<?php

include('../Class/Sql.php');

	//VARIAVEIS PARA PEGAR INFORMACOES VINDO DO POST
	$nome = $_POST['NomeProduto'];
	$margem = $_POST['MargemLucro'];
	$valor = $_POST['ValorProduto'];
	$valorvenda = $_POST['ValorVendaProduto'];
	$estoque = $_POST['QntProduto'];
	$fornecedor = $_POST['CodFornecedor'];
	$img = $_POST['ImagemProduto'];
	$qntparcelas = $_POST['QntParcelas'];
	$valorparcela = $_POST['ValorParcela'];
	$descricao = $_POST['Descricao'];
	$categoria = $_POST['Categoria'];

	//INSERIR NO BANCO DE DADOS

	$query = mysqli_query($conn, "CALL sp_products_save('$nome',
    '$valor','$margem','$valorvenda','$estoque','$fornecedor',
    '$qntparcelas','$valorparcela','$descricao','$categoria')");

	if($query){
		echo "Sucesso ao cadastrar produto";
	}else{
		echo "Erro ao cadastrar produto".mysqli_connect_errno($query);
	}


?>