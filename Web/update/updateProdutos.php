<?php
	
	include('../Class/Sql.php');

	

	//receber os dados via post
	$codproduto = $_POST['CodProduto'];
	$nome = $_POST['NomeProduto'];
	$margem = $_POST['MargemLucro'];
	$valor = $_POST['ValorProduto'];
	$valorvenda = $_POST['ValorVendaProduto'];
	$estoque = $_POST['QntProduto'];
	$descricao = $_POST['Descricao'];
	$categoria = $_POST['Categoria'];

	$queryImg = mysqli_query($conn, "SELECT ImagemProduto FROM produto WHERE CodProduto = '$codproduto'");
	$y = mysqli_fetch_array($queryImg);
	$nomeImg = $y['ImagemProduto'];

	
	if(!empty($_FILES['ImagemProduto']['name'])){ //verificando se a imagem nao esta vazia
		$extension = explode('.', $_FILES['ImagemProduto']['name']);
		$extension = end($extension);

		// pega o nome da imagem			
		$nomeimg = substr($_FILES['ImagemProduto']['name'], 0, -4);

		//novo nome da imagem
		$novo_nome = $nomeimg . ".".$extension;

		//diretorio para onde a imagem deve ser mandada
		$diretorio = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
		"res" . DIRECTORY_SEPARATOR . 
		"site" . DIRECTORY_SEPARATOR .
		"img" . DIRECTORY_SEPARATOR .
		"products" . DIRECTORY_SEPARATOR;

		//move a imagem para o diretorio 
		move_uploaded_file($_FILES['ImagemProduto']['tmp_name'], $diretorio.$novo_nome);

		$query = mysqli_query($conn, "UPDATE produto SET
		NomeProduto = '$nome',
		ValorProduto = '$valor',
		MargemLucro = '$margem',
		ValorVendaProduto = '$valorvenda',
		QntProduto = '$estoque',
		ImagemProduto = '$novo_nome',
		DataCadastro = NOW(),
		Descricao = '$descricao' WHERE CodProduto = '$codproduto'
		");

		header('Location: ../admin/products.php');

		
	}else{

		$novo_nome = $nomeImg;

		//diretorio para onde a imagem deve ser mandada
		$diretorio = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
		"res" . DIRECTORY_SEPARATOR . 
		"site" . DIRECTORY_SEPARATOR .
		"img" . DIRECTORY_SEPARATOR .
		"products" . DIRECTORY_SEPARATOR;

		//move a imagem para o diretorio 
		move_uploaded_file($_FILES['ImagemProduto']['tmp_name'], $diretorio.$novo_nome);
		
		$query = mysqli_query($conn, "UPDATE produto SET
		NomeProduto = '$nome',
		ValorProduto = '$valor',
		MargemLucro = '$margem',
		ValorVendaProduto = '$valorvenda',
		QntProduto = '$estoque',
		ImagemProduto = '$novo_nome',
		DataCadastro = NOW(),
		Descricao = '$descricao' WHERE CodProduto = '$codproduto'
		");

		header('Location: ../admin/products.php');
	}

?>