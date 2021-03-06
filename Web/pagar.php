<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<!-- IMPORTANDO CSS DO BOOTSTRAP -->
<link rel="stylesheet" href="res/site/css/bootstrap.min.css">

<!-- IMPORTANDO FONT-AWESOME PARA ICONES -->
<link rel="stylesheet" href="res/site/css/font-awesome.min.css">

<!-- IMPORTANDO SLIDER CSS -->
<link rel="stylesheet" href="res/site/css/responsiveslides.css">

<!-- IMPORTADO ANIMATE.CSS -->
<link rel="stylesheet" href="res/site/css/animate.css">

<!-- IMPORTANDO MAIN.CSS -->
<link rel="stylesheet" href="res/site/css/main.css">
<link rel="stylesheet" href="Cliente/css/cliente.css">
<header>
		<?php
			include('site/header.php');
		?>
</header>
<?php
//session_start();
include('Class/Sql.php');
require_once "pagseguro-php-sdk-master/vendor/autoload.php";

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("Nome")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("Nome")->setRelease("1.0.0");

try {
    //CRIA A SESSAO DE PAGAMENTO
    $sessionCode = \PagSeguro\Services\Session::create(
        \PagSeguro\Configuration\Configure::getAccountCredentials()
    );

    //INICIA A REQUISIÇÃO DE PAGAMENTO
    $payment = new \PagSeguro\Domains\Requests\Payment();

    //ADD O PRODUTO
    $id_pedido = $_GET['id'];

    $read_pedido = mysqli_query($conn, "SELECT * FROM Venda Where CodVenda = '$id_pedido'");

    if(mysqli_num_rows($read_pedido) > 0){
        foreach($read_pedido as $read_pedido_view);
        $read_itens_venda = mysqli_query($conn, "SELECT itemvenda.coditem,itemvenda.codproduto,itemvenda.codvenda, itemvenda.qntitem, itemvenda.valoritem, produto.codproduto, produto.descricao FROM itemvenda INNER JOIN produto ON produto.codproduto = itemvenda.codproduto WHERE CodVenda = '$id_pedido'");
        if(mysqli_num_rows($read_itens_venda) > 0){
            foreach($read_itens_venda as $read_itens_venda_view){
                $count_prod = 0;
                $count_prod++;
                    $payment->addItems()->withParameters(
                        $count_prod,
                        $read_itens_venda_view['descricao'],
                        $read_itens_venda_view['qntitem'],
                        $read_itens_venda_view['valoritem']
                    );
            }
        }
    }

    //$updateStatus = mysqli_query($conn, "UPDATE venda SET StatusPedido = 'Pago' WHERE CodVenda = '$id_pedido'");
    //moeda
    $payment->setCurrency("BRL");
    //referencia para fazer a baixa automatica
    $payment->setReference($id_pedido);
    //url para retorno dps de finalizar a venda
    $payment->setRedirectUrl("http://www.lojamodelo.com.br");

    // Set your customer information.
    $payment->setSender()->setName('João Vizu');
    $payment->setSender()->setEmail('joaovizu2015@gmail.com');

    //info frete
    $payment->setShipping()->setCost()->withParameters(0.00);
    $payment->setShipping()->setType()->withParameters(\PagSeguro\Enum\Shipping\Type::SEDEX);

    //url para notficacao
    $payment->addParameter()->withArray(['notificationURL', 'http://www.lojamodelo.com.br/nofitication']);

    $payment->setRedirectUrl("http://www.lojamodelo.com.br");
    $payment->setNotificationUrl("http://www.lojamodelo.com.br/nofitication");


    try {
        $result = $payment->register(
            \PagSeguro\Configuration\Configure::getAccountCredentials()
        );



        echo '  <div class="jumbotron text-center">
                    <h1 class="jumbo-text">Realizar pagamento...</h1>
                </div>'.
            "<div style='margin:0 auto; width:10%;'><a class='btn btn-primary btn-lg' title=\"URL do pagamento\" href=\"$result\" target=\_blank\">Ir ao PagSeguro</a></div>";

            unset($_SESSION['pedido']);

    } catch (Exception $e) {
        die($e->getMessage());
    }

} catch (Exception $e) {
    die($e->getMessage());
}

?>

<footer style="margin-top: 100px;">
    <?php
	    include('site/footer.html');
	?>
</footer>