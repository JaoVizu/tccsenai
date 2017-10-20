<?php
	
	include('../Class/Sql.php');

	$cod = $_POST['codEnco'];
	$end = $_POST['endEncomenda'];
	$status = $_POST['status'];

	

	$query = mysqli_query($conn, "UPDATE Encomenda SET EndEncomenda = '$end', StatusPedido = '$status' WHERE CodEncomenda = '$cod';");

	if($query){
		//echo 'Encomenda Atualizada com sucesso';
		header('Location: ../admin/encomendas.php');
	}else{
		echo 'Ocorreu um erro, consulte o desenvolvedor';
	}

?>