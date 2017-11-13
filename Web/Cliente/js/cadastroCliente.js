
$('#enviar').click(function(e){
    e.preventDefault();
    $.ajax({
        url: "../Web/cadastros/cadastroCliente.php",
	    method: "post",
		data: $('#formCliente').serialize(),
        
        success: function(data){
			alert(data);
            window.location = "../../Web/checarEnd.php";
		}
    });
    
    //LIMPAR FORMULARIO APOS CADASTRO
	document.getElementById('formCliente').reset();
});
