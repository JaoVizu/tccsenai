<?php
	
	include('../Class/Sql.php');

	//variaveis para receber os valores do post
	$codCat = $_POST['codCat'];
	$nomeCat = $_POST['nomeCat'];

	$query = mysqli_query($conn, "UPDATE Categoria SET nomecategoria = '$nomeCat' WHERE codcategoria = '$codCat'");

	if($query){
		header('Location: ../admin/index.php#!/categoria');
	}else{
		echo "Deu ruim";
	}

?>