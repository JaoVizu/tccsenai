//PEGA O ID DO CAMPO QUANTIDADE
var qtd = $('#qtd');
var count = 0;

$('tbody #qtd').on("keyup keydown change", qtd, function(e){
    var quantidade = $(this).val();//valor da quantidade

    var id = $(this).attr('data-id'); //pega id do produto

    var preco = $(this).attr('data-preco'); //pega valor do produto

    if(quantidade == ' ' || quantidade == 0){
        quantidade == 1;
    }

    $.ajax({
        url: 'Carrinho/js/qtdCarrinho.php',
        type: 'post',
        data: 'qtd='+quantidade+"&id="+id+"&preco="+preco,

        success: function(data){
            $(e.currentTarget).closest('tr').children("tbody #subtotal").html(data);
            //console.log(data);
        }
    });
    
});
   
