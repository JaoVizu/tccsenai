<?php

include('../Class/Sql.php');

	//VARIAVEIS PARA PEGAR INFORMACOES VINDO DO POST
	$nome = $_POST['NomeCliente'];
	$datanasc = $_POST['DataNasc'];
	$sexo = $_POST['SexoCliente'];
	$endereco = $_POST['EndCliente'];
	$cep = $_POST['CepCliente'];
	$cpf = $_POST['CPFCliente'];
	$rg = $_POST['RGCliente'];
	$telefone = preg_replace('#[a-z]#', '',$_POST['TelefoneCliente']);
	$celular = $_POST['CelularCliente'];
	$cidade = $_POST['CidadeCliente'];
	$estado = $_POST['EstadoCliente'];
	$bairro = $_POST['BairroCliente'];
	$login = $_POST['NomeLogin'];
	$email = $_POST['email'];
	$senha = md5($_POST['Senha']);
	$complemento = $_POST['complemento'];
	$numeroC = $_POST['numCasa'];
	$inadmin = isset($_POST['inadmin']) ? $_POST['inadmin'] : 0;
	$status = 'ATIVO';


	//INSERINDO NO BANCO DE DADOS
	$query = mysqli_query($conn, "CALL sp_users_save('$nome',
	'$datanasc','$endereco','$cep',
	'$cpf','$rg','$telefone',
	'$celular','$cidade',
	'$estado','$bairro','$sexo','$login','$senha','$email','$numeroC','$complemento','$inadmin','$status')");

	if($query){
		echo "Sucesso ao cadastrar usuário";
		
	}else{
		echo "Erro ao cadastrar usuário". mysqli_error($conn);
	}


?>