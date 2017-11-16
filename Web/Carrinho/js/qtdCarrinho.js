$('tbody #qtd').on("keyup keydown change", function(){
    //document.getElementById('finaliza').style.display = 'none';
    $('#finaliza').click(function(e){
        e.preventDefault();
        alert('Atualize o carrinho para continuar');
    }) ;
});

//PEGA O ID DO CAMPO QUANTIDADE
/*var qtd = $('#qtd');
var count = 0;
$(document).ready(function(){

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
            $(e.currentTarget).closest('tr').children("tbody .subtotal").html('R$ ' + data);
            $(e.currentTarget).closest('tr').children("tbody .subtotal").attr("valor-sub",data);
            //console.log(data);
            atualiza();
        }
    });
    
    

});

    function atualiza(){
        var teste = [];
        var elemento  = "";
        var total = 0;
        $('.subtotal').each(function(index,element){
            element = parseFloat($(this).attr('valor-sub'));
            
            teste = [element];
            console.log(teste);
            total += element;
            console.log('Se a voz de viado do victor foi viado, o resultado vai dar certo que será: ' + total);
            $('#total').html('R$ ' + total);

            $.ajax({
                url: 'Carrinho/js/teste.php',
                type: 'post',
                data: "teste="+teste+"&total="+total,

                success: function(data){
                    console.log(data);
                }
            });


        
    });
}
atualiza();
})

/*$('#teste').click(function(){

    var teste = [];
    var elemento  = "";
    var total = 0;
    $('.subtotal').each(function(index,element){
    element = parseFloat($(this).attr('valor-sub'));
    
    teste = [element];
    console.log(teste);
        
    
    total += element;
    console.log('Se a voz de viado do victor foi viado, o resultado vai dar certo que será: ' + total);
    $('#total').html('R$ ' + total);
    
   });

   //console.log(teste);

});*/
   
