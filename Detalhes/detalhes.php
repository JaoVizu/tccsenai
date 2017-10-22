<?php

include('Class/Sql.php');
include('functions.php');

//CONSULTA DE PRODUTOS
//$query = mysqli_query($conn, "SELECT * FROM produto");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- IMPORTANDO CSS DO BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- IMPORTANDO FONT-AWESOME PARA ICONES -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <title>Detalhes</title>
</head>
<body>

    <!-- JUMBOTRON COM NOME DO PRODUTO -->
    <header>
        <div class="jumbotron text-center">
            <?php
                if(isset($_GET['id_prod'])){

                    $id_prod = addslashes($_GET['id_prod']);

                    $read_produto = mysqli_query($conn, "SELECT NomeProduto FROM produto WHERE codProduto = '$id_prod';");
                    foreach ($read_produto as $key) {
                        echo '<h1 class="jumbo-text">'.$key['NomeProduto'].'</h1>';
                    }
                }
            ?>
        </div>
    </header>
    
    <!-- PARTE DE DETALHES DO PRODUTO -->
    <section id="details-product">
        <div class="container-fluid">
            <div class="row">
                <!-- FOTO DO PRODUTO -->
                <div class="col-md-2">
                    <!-- GAP(GAMBIARRA DO NOT DO IT) -->
                </div>

                <div class="col-md-4">
                    <img src="https://www.elondres.com/wp-content/uploads/2016/06/O_que_ver_em_Londres_n%C3%A3o_perca_as_joias_da_Coroa_Brit%C3%A2nica.jpg.jpeg" alt="" width="500">
                </div>

                
                <div class="col-md-4">
                    <div class="name-prod">
                        <h3>Nome do produto</h3>
                        <h5>55,00</h5>
                    </div>

                    <div class="buy-section">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus doloremque consectetur vero quaerat quod ea iste mollitia iure ad, modi nulla perferendis, labore quia officia.</p>

                        <input type="number"><button class="btn btn-warning">Comprar</button>
                    </div>
                </div>
            </div><!-- fim row-->
        </div>
    </section>
    
    <!-- DESCRIÇÃO DO PRODUTO -->
    <section id="description" class="mt-5">
        <div class="container">
            <div class="product-desc" style="border:1px solid grey;">
                <div class="col-md-12 text-center">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus nobis amet voluptate aliquam debitis! Dolorum placeat inventore, similique a.
                </div>
            </div>
        </div>
    </section>
    
    <!-- RELATED PRODUCTS -->
    <section id="related">
        <div class="container">
            <div class="related-logo">
                <div class="col-md-12 text-center">
                    <h2 class="display-3" id="relprod-title">Produtos Relacionados</h2>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="row text-center">
                <div class="col-md-3">
                  <div class="cartao">
                        <img class="rounded" src="../res/site/img/products/anel.jpg" alt="" >
                            <div class="cartao-hover">
                                <div class="texto-cartao">
                                
                                    <button class="btn btn-primary btn-block">Detalhes</button>
                                    <button class="btn btn-success btn-block">Comprar</button>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>