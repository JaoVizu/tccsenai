<?php

	include('../Class/Sql.php');

	

	$login = $_POST['login'];
	$pass = md5($_POST['password']);

	$query = mysqli_query($conn,"SELECT * FROM Login WHERE NomeLogin = '$login' OR email = '$login' AND Senha = '$pass'");

	$results = mysqli_fetch_array($query);//resultados da query no banco
	$inadmin = $results["inadmin"]; //pegando o valor do campo inadmin

	$row = mysqli_num_rows($query); //numero de linhas retornados da query

	if($row > 0){
		
		if($inadmin == 1){

			session_start(); //iniciando a sessao

			$_SESSION['usuario'] = $results;//sessao com todos os dados do usuario

			header("Location: ../site/loadingPage/loading.php");
		}else{
			session_start();
			$_SESSION['usuario'] = $results;
			echo "1";
			//header("Location: ../index.php");
		}

	}else{
		echo "2";
		/*session_start();
		$_SESSION['loginerror'] = "Usuário ou senha inválidos";
		header("Location:login.php");*/
		
	}

	
?>