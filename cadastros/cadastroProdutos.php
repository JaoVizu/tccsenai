<?php

include('../Class/Sql.php');
	
	//metodo para checar foto
	function checkPhoto($nome){
		if (file_exists(
		$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
		"res" . DIRECTORY_SEPARATOR . 
		"site" . DIRECTORY_SEPARATOR .
		"img" . DIRECTORY_SEPARATOR .
		"products" . DIRECTORY_SEPARATOR .
		$nome
		)){
			$url = "res/site/img/products/" . $nome;
		}else{
			$url = "res/site/img/products/padrao.jpg";
		}

		return $nome = $url;
	}

	//VARIAVEIS PARA PEGAR INFORMACOES VINDO DO POST
	$nome = $_POST['NomeProduto'];
	$margem = $_POST['MargemLucro'];
	$valor = $_POST['ValorProduto'];
	$valorvenda = $_POST['ValorVendaProduto'];
	$estoque = $_POST['QntProduto'];
	$fornecedor = $_POST['CodFornecedor'];
	$qntparcelas = $_POST['QntParcelas'];
	$valorparcela = $_POST['ValorParcela'];
	$descricao = $_POST['Descricao'];
	$categoria = $_POST['Categoria'];

	

	if(isset($_FILES['ImagemProduto'])){
		$extension = explode('.', $_FILES['ImagemProduto']['name']);
		$extension = end($extension);

		//nome da imagem
		$novo_nome = md5(time()) . ".".$extension;

		$diretorio = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
		"res" . DIRECTORY_SEPARATOR . 
		"site" . DIRECTORY_SEPARATOR .
		"img" . DIRECTORY_SEPARATOR .
		"products" . DIRECTORY_SEPARATOR;

		move_uploaded_file($_FILES['ImagemProduto']['tmp_name'], $diretorio.$novo_nome);

		$query = mysqli_query($conn, "CALL sp_products_save('$nome',
    	'$valor','$margem','$valorvenda','$estoque','$fornecedor',
    	'$qntparcelas','$valorparcela','$descricao','$categoria','$novo_nome')");
		
	}



?>