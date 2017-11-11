//FUNCAO DE CEP
    $(document).ready(function() {
        
                    function limpa_formulário_cep() {
                        // Limpa valores do formulário de cep.
                        $("#endCliente").val("");
                        $("#bairrocliente").val("");
                        $("#cidadecliente").val("");
                        $("#estadocliente").val("");
                        
                    }
                    
                    //Quando o campo cep perde o foco.
                    $("#cepcliente").blur(function() {
                        
                        //Nova variável "cep" somente com dígitos.
                        var cep = $(this).val().replace(/\D/g, '');
                        
                        //Verifica se campo cep possui valor informado.
                        if (cep != "") {
        
                            //Expressão regular para validar o CEP.
                            var validacep = /^[0-9]{8}$/;
        
                            //Valida o formato do CEP.
                            if(validacep.test(cep)) {
        
                                //Preenche os campos com "..." enquanto consulta webservice.
                                $("#endCliente").val("...");
                                $("#bairrocliente").val("...");
                                $("#cidadecliente").val("...");
                                $("#estadocliente").val("...");
                                
        
                                //Consulta o webservice viacep.com.br/
                                $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
        
                                    if (!("erro" in dados)) {
                                        //Atualiza os campos com os valores da consulta.
                                        $("#endCliente").val(dados.logradouro);
                                        $("#bairrocliente").val(dados.bairro);
                                        $("#cidadecliente").val(dados.localidade);
                                        $("#estadocliente").val(dados.uf);
                                        
                                    } //end if.
                                    else {
                                        //CEP pesquisado não foi encontrado.
                                        limpa_formulário_cep();
                                        alert("CEP não encontrado.");
                                    }
                                });
                            } //end if.
                            else {
                                //cep é inválido.
                                limpa_formulário_cep();
                                alert("Formato de CEP inválido.");
                            }
                        } //end if.
                        else {
                            //cep sem valor, limpa formulário.
                            limpa_formulário_cep();
                        }
                    });
                });

                (function(){
                    $(document).ready(function($){
                        $('#cepcliente').mask('99999-999');
                        $('#cpfcliente').mask('000.000.000-00');
                   
                    });
                }());
