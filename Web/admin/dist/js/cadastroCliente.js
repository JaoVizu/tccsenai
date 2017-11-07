(function(){

	$(document).ready(function(){
		$('#enviar').click(function(e){
			e.preventDefault();

			$.ajax({
				url: "../cadastros/cadastroCliente.php",
				method: "post",
				data: $('#formCliente').serialize(),

				success: function(data){
					alert(data);
				}
			});

			//LIMPAR FORMULARIO APOS CADASTRO
			document.getElementById('formCliente').reset();
		});
	
	});

}());

