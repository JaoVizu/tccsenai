<?php
	
	include('../Class/Sql.php');

	$cod = $_POST['codEnco'];
	$end = $_POST['endEncomenda'];

	$query = mysqli_query($conn, "UPDATE Encomenda SET EndEncomenda = '$end' WHERE CodEncomenda = '$cod';");

	if($query){
		//echo 'Encomenda Atualizada com sucesso';
		header('Location: ../admin/encomendas.php');
	}else{
		echo "<script>alert('Ocorreu um erro, consulte o desenvolvedor');</script>";
		header('Location: ../admin/encomendas.php');
	}

?>