<?php

	include('../Class/Sql.php');

	$codCat = $_GET['codcat'];

	$queryDel = mysqli_query($conn, " DELETE FROM categoria WHERE CodCategoria = '$codCat'");

	if($queryDel){
		header('Location: ../admin/index.php#!/categoria');
	}else{
		echo 'Nao deu'.mysqli_error($conn);
		exit;
	}

?>