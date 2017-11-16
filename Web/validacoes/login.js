 $('#logar-btn').click(function(e){
        e.preventDefault();
        
        $.ajax({
        	url: 'validacoes/validaLogin.php',
        	method:'post',
        	data: $('#loginForm').serialize(),

        	success: function(data){
        		
        		if(data == '1'){ window.location = "../Web/checarEnd.php"}
        	}
        });
  })