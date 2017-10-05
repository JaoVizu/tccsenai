//FUNCAO PARA  CALCULAR MARGEM DE LUCRO
(function(){
    var margemLucro = $('#margem'),
        valorProduto = $('#vlprice');
    
        
    $('#margem').focusout(function(){
        margemConv = parseFloat(margemLucro.val());
        valorConv = parseFloat(valorProduto.val());
        total = valorConv + (valorConv *margemConv/100);

        var totalPrize = parseFloat(total).toFixed(2);

        $('#valorVenda').val(totalPrize);
        
    });

}());

//FUNCAO DE CEP
(function(){
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
}());

//FUNCAO DE MASCARAS
(function(){
    $(document).ready(function(){
        $('#cepcliente').mask('99999-999');
        $('#cpfcliente').mask('000.000.000.00');
        $('#rgcliente').mask('00.000.000-0')
        $('#celularcliente').mask('(00) 00000-0000');
        $('#telefonecliente').mask('(00) 0000-0000');
      });

}());

//FUNÇAO PARA CALCULAR PARCELAS
(function(){

    $(document).ready(function(){
        
        var tamanhoLucro = $('#margem');
        tamanhoLucro.val().length;

        var maxParcelas = $('#maxparcelas'),
            valorProduto = $('#valorVenda');

        $('#maxparcelas').focusout(function(){
            
            if( $('#maxparcelas').val() == ''){

                $('#maxparcelas').css("border","1px solid red");

            }else{
                parcelaConv = parseInt(maxParcelas.val());
                valorConv = parseFloat(valorProduto.val());
                total = valorConv / parcelaConv;
                var totalPrice = parseFloat(total).toFixed(2);
                $('#valorParcela').val(totalPrice);
                
            }

        });
        
    });
}());