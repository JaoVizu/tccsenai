$("#search").keyup(function(){
	
	var pesquisa = $(this).val();

	//VERIFICANDO SE ALGO FOI DIGITADO
	if(pesquisa != ''){
		var dados = {
			palavra : pesquisa
		}
	}

	/*$.post('../../../buscar.php', dados, function(retorna){
		alert(dados);
	});*/

	$.ajax({
		url: '../../../Web/buscarProd.php',
		method: 'post',
		data : dados,

		success: function(data){
			$('#corpoTable').html(data);
		}
	});
});