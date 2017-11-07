<?php
  
  session_start();
  include('../../Class/Sql.php');

  //tratamento de sessao
  if(!isset($_SESSION['usuario'])){
    //se nao estiver setada a sessao vai para o login
    header("Location: ../site/login.html");
    exit;
  }

  //pegar o CodCliente de quem iniciou a sessao
  $clienteSessao = $_SESSION['usuario']['CodCliente'];
  
  //fazer consulta para pegar o nome do admin logado
  $query = mysqli_query($conn, "SELECT * FROM cliente a INNER JOIN login b USING(CodCliente) WHERE a.CodCliente = '$clienteSessao'");

  $results = mysqli_fetch_assoc($query);
  $nome = $results['NomeCliente'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="loading.css">
	<title>Carregando...</title>
</head>
<body>
	
	<div class="preload">
		<div class="logo">
			Bem-Vindo <br/><span><?php echo $nome;?></span>
		</div>
		<div class="loader-frame">
			<div class="loader1" id="loader1"></div>
			<div class="loader2" id="loader2"></div>
		</div>
	</div>

<script src="loading.js"></script>
</body>
</html>