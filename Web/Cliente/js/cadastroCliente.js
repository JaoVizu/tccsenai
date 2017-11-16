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

            $('#nova-senha').hide();
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
                            $('#nova-senha').fadeIn("slow");

                            //confere se os campos estão com os mesmos valores
                            if($('#pass').val() == $('#pass2').val()){
                                
                                $('#enviaSenha').click(function(e){
                                    e.preventDefault();
                                    var formData2 = $('#pass').val();//pegando valor da senha
                                    
                                    //se sim faz uma requisição trocando a senha
                                    $.ajax({
                                        url : 'Cliente/alteraSenha.php' ,
                                        method: 'post',
                                        data: {data_one :formData2, data_two: formData1},

                                        success: function(response){
                                            alert(response);
                                        }
                                    });
                                });

                            }else{
                                alert('As senhas nao correspondem');
                            }
                        } // fim if response server
                    }// fim success function
                }); // fim first ajax function
            });
        });
        
}());
