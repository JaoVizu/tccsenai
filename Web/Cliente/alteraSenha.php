<?php
	
	include('../Class/Sql.php');
	include('../functions.php');

	$cpf = $_POST['data_two'];
	
	$senha = $_POST['data_one'];

	$cpf = limpaCpf($cpf);//retirando mascara do cpf
	$cpf = str_replace("cpf","", $cpf);//retirando cpf da frente 
	$cpf = str_replace("=","", $cpf);//retirando sinal de igual

	$queryCod = mysqli_query($conn, "SELECT codcliente FROM cliente WHERE cpfcliente = $cpf ");
	
	foreach($queryCod as $cod)://foreach para pegar o codigo do cliente
		// query para fazer update na senha do cliente
		$codigo = $cod['codcliente'];	
	endforeach;//final foreach cod cliente

	$queryLogin = mysqli_query($conn, " UPDATE login SET Senha = '$senha' WHERE codcliente = '$codigo'");

	if($queryLogin){ //condição para ver se a query retornou algum resultado
		echo 'Senha alterada com sucesso';
	}
	
	

?>