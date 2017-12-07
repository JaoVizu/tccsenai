<?php

include('../Class/Sql.php');

	//VARIAVEIS PARA PEGAR INFORMACOES VINDO DO POST
	$nome = $_POST['NomeProduto'];
	$margem = $_POST['MargemLucro'];
	$valor = $_POST['ValorProduto'];
	$valorvenda = $_POST['ValorVendaProduto'];
	$estoque = $_POST['QntProduto'];
	$fornecedor = $_POST['CodFornecedor'];
	$descricao = $_POST['Descricao'];
	$categoria = $_POST['Categoria'];
	$status = 'ATIVO';
	$data = date('d-m-Y');


	if(!empty($_FILES['ImagemProduto']['name'])){ //verificando se a imagem nao esta vazia
		$extension = explode('.', $_FILES['ImagemProduto']['name']);
		$extension = end($extension);

		// pega o nome da imagem			
		$nomeimg = substr($_FILES['ImagemProduto']['name'], 0, -4);

		//novo nome da imagem
		$novo_nome = $nomeimg . ".".$extension;

		//diretorio para onde a imagem deve ser mandada
		$diretorio = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
		"Web" . DIRECTORY_SEPARATOR .
		"res" . DIRECTORY_SEPARATOR . 
		"site" . DIRECTORY_SEPARATOR .
		"img" . DIRECTORY_SEPARATOR .
		"products" . DIRECTORY_SEPARATOR;

		//move a imagem para o diretorio 
		move_uploaded_file($_FILES['ImagemProduto']['tmp_name'], $diretorio.$novo_nome);

		$query = mysqli_query($conn, "CALL sp_products_save('$nome',
    	'$valor','$margem','$valorvenda','$estoque','$fornecedor','$novo_nome',
    	'$descricao','$categoria','$status')");	
		
		header('Location: ../admin/index.php#!/products');
		
		
	}else{

		$novo_nome = "padrao.jpg";

		//diretorio para onde a imagem deve ser mandada
		$diretorio = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
		"res" . DIRECTORY_SEPARATOR . 
		"site" . DIRECTORY_SEPARATOR .
		"img" . DIRECTORY_SEPARATOR .
		"products" . DIRECTORY_SEPARATOR;

		//move a imagem para o diretorio 
		move_uploaded_file($_FILES['ImagemProduto']['tmp_name'], $diretorio.$novo_nome);

		$query = mysqli_query($conn, "CALL sp_products_save('$nome',
    	'$valor','$margem','$valorvenda','$estoque','$fornecedor','$novo_nome',
    	'$descricao','$categoria','$status')");
		

		header('Location: ../admin/index.php#!/products');
		
	}


?>