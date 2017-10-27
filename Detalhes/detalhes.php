<?php

include('Class/Sql.php');
include('functions.php');

//CONSULTA DE PRODUTOS
//$query = mysqli_query($conn, "SELECT * FROM produto");

?>


<body>

    <!-- JUMBOTRON COM NOME DO PRODUTO -->
    <header>
        <div class="jumbotron text-center">
            <?php
                if(isset($_GET['id_prod'])){

                    $id_prod = addslashes($_GET['id_prod']);

                    $read_produto = mysqli_query($conn, "SELECT * FROM produto WHERE codProduto = '$id_prod';");
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
                <?php foreach($read_produto as $read){ ?>
                <div class="col-md-4">
                    <img src="../res/site/img/products/<?php echo $read['ImagemProduto'];?>" alt="" width="500">
                </div>

                
                <div class="col-md-4">
                    <div class="name-prod">
                        <h3 class="mb-3"><?php echo $read['NomeProduto'];?></h3>
                        <h5 class="mb-2"><sup>&#36;</sup><?php echo formatPrice($read['ValorVendaProduto']);?></h5>
                    </div>

                    <div class="buy-section mt-3">

                        <div class="quantity">
                            <input type="number" min="1" max="<?php echo $read['QntProduto']; ?>" step="1" value="1">
                        </div>
                        
                        <a class="btn btn-warning btn-carrinho ml-3">

                            <i class="fa fa-cart-plus"></i><span class="text-center">Adicionar ao carrinho</span>
                        
                        </a>

                    </div>

                    <div class="product-desc mt-3">
                       
                        <p class="mt-3"><?php echo $read['Descricao'];?></p>
                        
                    </div>
                </div>
            </div><!-- fim row-->
        </div>
    </section>
    
    <!-- DESCRIÇÃO DO PRODUTO -->
    <!--<section id="description" class="mt-5">
        <div class="container-fluid">
            <div class="product-desc">
                <div class="col-md-12">
                    
                </div>
            </div>
        </div>
        
    </section>-->
    <?php } ?>
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
                <?php
                    //PEGANDO O CODIGO DA CATEGORIA DO PRODUTO
                    $produtos = mysqli_query($conn, " SELECT CodCategoria FROM Produto WHERE CodProduto = '$id_prod'");
                    $x = mysqli_fetch_assoc($produtos);  $codCat = $x['CodCategoria'];//RECEBENDO VALORES

                    //PEGANDO OS PRODUTOS COM A MESMA CATEGORIA
                    $readCat = mysqli_query($conn, " SELECT * FROM Produto WHERE CodCategoria = '$codCat' AND CodProduto != '$id_prod' ORDER BY RAND() LIMIT 4");

                    foreach($readCat as $readCat){
                ?>
                <div class="col-md-3">
                  <div class="cartao">
                        <img class="rounded" src="../res/site/img/products/<?php echo $readCat['ImagemProduto']?>" alt="" >
                            <div class="cartao-hover">
                                <div class="texto-cartao">

                                    <p style="color: white;"><?php echo $readCat['NomeProduto'];?></p>
                                    <a href="detalhes.php?id_prod=<?php echo $readCat['CodProduto']?>" class="btn btn-primary btn-block">Detalhes</a>
                                    <a href="" class="btn btn-success btn-block">Comprar</a>

                                </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>    
        </div>
    </section>

</body>
</html>