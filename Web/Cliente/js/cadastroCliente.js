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

(function(){
    $(document).ready(function(){

            $('#enviaCpf').click(function(e){
                e.preventDefault();


                var formData1 = $('#formCpf').serialize();
                
                $.ajax({
                    url:'Cliente/verificaCpf.php',
                    method:'post',
                    data: formData1,

                    success:function(data){
                        //se a resposta for verdadeira
                        if(data == '1'){
                            $('#form-cpf').fadeOut("fast");
                            //esperando um tempo para fazer a animação
                            setTimeout(function(){
                                $('#nova-senha').fadeIn("fast");
                            }, 100);
                            
                                
                                $('#enviaSenha').click(function(e){
                                    e.preventDefault();
                                      //confere se os campos estão com os mesmos valores
                                    if($('#pass').val() == $('#pass2').val()){

                                        var formData2 = $('#pass').val();//pegando valor da senha
                                        
                                        //se sim faz uma requisição trocando a senha
                                        $.ajax({
                                            url : 'Cliente/alteraSenha.php' ,
                                            method: 'post',
                                            data: {data_one :formData2, data_two: formData1},

                                            success: function(response){
                                                alert(response);
                                                window.location = '../../Web/login.php';
                                            }
                                        });
                                    }else{
                                        alert('As senhas não correspondem!');
                                        document.getElementById('pass').value = "";
                                        document.getElementById('pass2').value = "";
                                    }
                                });


                        } // fim if response server
                    }// fim success function
                }); // fim first ajax function
            });
        });
        
}());
