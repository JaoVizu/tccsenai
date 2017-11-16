<?php
//funçao para valor real
	function formatPrice(float $vlprice){

		return number_format((float)$vlprice, 2, ",", ".");
	}

	function limpaCpf($cpf){
		$cpf = trim($cpf);
		$cpf = str_replace(".", "", $cpf);
		$cpf = str_replace(",", "", $cpf);
		$cpf = str_replace("-", "", $cpf);
		$cpf = str_replace("/", "", $cpf);
		return $cpf;
	}


?>