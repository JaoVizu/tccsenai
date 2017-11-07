(function(){

	$(document).ready(function(){
		$('#enviar').click(function(e){
			e.preventDefault();

			$.ajax({
				url: "../update/updateCategoria.php",
				method: "post",
				data: $('#formCat').serialize(),

				success: function(data){
					alert(data);
				}
			});
		});
	
	});

}());

