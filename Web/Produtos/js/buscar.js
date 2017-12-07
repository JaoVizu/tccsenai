$("#search").keyup(function(){
	
	var pesquisa = $(this).val();

	//VERIFICANDO SE ALGO FOI DIGITADO
	if(pesquisa != ''){
		var dados = {
			palavra : pesquisa
		}
	}

	$.ajax({
		url: 'Produtos/pesqProdutos.php',
		method: 'post',
		data : dados,

		success: function(data){
            
			$('.busca').html(data);
		}
	});
});