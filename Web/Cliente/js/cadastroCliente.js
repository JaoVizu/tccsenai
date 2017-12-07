$('#enviar').click(function(e){
    e.preventDefault();
    //pegando valor dos campos para passar via json
    var login = $('#deslogin').val(),
        senha = $('#despassword').val();

    $.ajax({
        url: "../Web/cadastros/cadastroCliente.php",
	    method: "post",
		data: $('#formCliente').serialize(),
        
        success: function(data){
			alert(data);

            console.log(login,senha);
            $.ajax({

                url: "../Web/validacoes/validaLogin.php",
                method: "post",
                data : {'login':login, 'password':senha},
                
                success: function(data){
                    console.log('teste de dados ' + data);
                    if(data == "1"){
                        window.location = "../../Web/checarEnd.php";
                    }
                }
            });
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


                        }else{
                            alert('O CPF não é válido, tente novamente!');
                            document.getElementById('cpf').value = "";
                        } // fim if response server
                    }// fim success function
                }); // fim first ajax function
            });
        });
        
}());
