$(document).ready(function (){

	$('#enviar').click(function(e){
		e.preventDefault();

		var dados = $('#altEncomenda').serialize();

		$.ajax({
			url: "../update/updateEncomenda.php",
			type: "post",
			data: dados,

			success: function(data){
				alert(data);
			}
		});
	});

});