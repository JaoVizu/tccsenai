<script>
	function redireciona(){
		setTimeout("window.location = '../admin/users.php'");
	}
</script>
<?php
	include('../Class/Sql.php');

	//receber os dados via post
	$codlogin = $_POST['CodLogin'];
	$nome = $_POST['NomeCliente'];
	$login = $_POST['NomeLogin'];
	$telefone = $_POST['TelefoneCliente'];
	$celular = $_POST['CelularCliente'];
	$email = $_POST['email'];
	$inadmin = isset($_POST['inadmin']) ? 1:0;

	//query para fazer update

	
	$query = mysqli_query($conn, "CALL sp_usersupdate_save('$codlogin','$nome','$login','$email','$telefone','$celular','$inadmin')");

	if($query){
		echo "Dados do cliente alterado com sucesso";
		echo "<script>redireciona()</script>";
	}else{
		echo "Ocorreu um erro ao alterar os dados do cliente \n".mysqli_errno($conn);
	}


?>