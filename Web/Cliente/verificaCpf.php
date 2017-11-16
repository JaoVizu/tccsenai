<?php
	
	include('../Class/Sql.php');
	include('../functions.php');

	$cpf = $_POST['cpf'];

	$cpf = limpaCpf($cpf);

	$queryCpf = mysqli_query($conn, "SELECT cpfcliente FROM Cliente WHERE cpfcliente = $cpf");

	if(mysqli_num_rows($queryCpf) > 0){
		echo "1";
	}else{
		echo "CPF não existe";
	}

?>