<?php
//include('Sql.php');

class Carrinho{
	private $id;

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function adicionar(){
		if(!isset($_SESSION['pedido'])):
			$_SESSION['pedido'] = array();
		endif;

		if(empty($_SESSION['pedido'][$this->id])):
			$_SESSION['pedido'][$this->id] = 1;
		else:
			$_SESSION['pedido'][$this->id] += 1;
		endif;
	}

	public function listarPedido(){
		$listar = mysqli_query($conn, "SELECT * FROM produto WHERE CodProduto = '$this->id'");
		$arrayListar = mysqli_fetch_assoc($listar);
		return $arrayListar;
	}

	public function excluirProduto(){
		if(isset($_SESSION['pedido'][$this->id])):
			unset($_SESSION['pedido'][$this->id]);
		endif;
	}
}


?>