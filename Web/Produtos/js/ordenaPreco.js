$(document).ready(function(){

	$('#ordenar').change(function(){
		var texto  = $('#ordenar option:selected').val();
		
		$.ajax({
			url: 'Produtos/ordena.php',
			method: 'get',
			data: "tipo=" + texto,

			success: function(data){
				$('#vitrine-products').html(data);
			}
		});
	});


});