<?php
	include('../Class/Sql.php');

	$codproduto = $_GET['codproduto'];

	$sqldel = mysqli_query($conn, "CALL sp_products_delete($codproduto)");

	if($sqldel){
		header('Location:../admin/products.php');
	}else{
		echo "Deu merada";
	}
?>