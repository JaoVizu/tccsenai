<?php
	include('../Class/Sql.php');

	$codproduto = $_GET['codproduto'];

	$sqldel = mysqli_query($conn, "DELETE FROM produto WHERE CodProduto = '$codproduto'");

	if($sqldel){
		header('Location:../admin/index.php');
	}else{
		echo "Deu merada";
	}
?>