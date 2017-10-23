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
                        <p><?php echo $read['Descricao'];?></p>

                        <input type="number"><a class="btn btn-warning">Adicionar ao carrinho</a>
                    </div>
                </div>
            </div><!-- fim row-->
        </div>
    </section>
    
    <!-- DESCRIÇÃO DO PRODUTO -->
    <section id="description" class="mt-5">
        <div class="container-fluid">
            <div class="product-desc">
                <div class="col-md-12">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At reprehenderit voluptate molestias sint, blanditiis odio, impedit consectetur amet incidunt velit ipsum quisquam in aut ipsam! Minus nesciunt, ratione nulla? Quo rem quae aut cum adipisci, ipsam alias? Consequuntur inventore optio laborum laboriosam, voluptate repudiandae earum velit odit facilis temporibus ad pariatur quibusdam voluptas veniam minima quo maxime assumenda perspiciatis molestias.
                </div>
            </div>
        </div>
        <?php } ?>
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
                <?php
                    //PEGANDO O CODIGO DA CATEGORIA DO PRODUTO
                    $produtos = mysqli_query($conn, " SELECT CodCategoria FROM Produto WHERE CodProduto = '$id_prod'");
                    $x = mysqli_fetch_assoc($produtos);  $codCat = $x['CodCategoria'];//RECEBENDO VALORES

                    //PEGANDO OS PRODUTOS COM A MESMA CATEGORIA
                    $readCat = mysqli_query($conn, " SELECT * FROM Produto WHERE CodCategoria = '$codCat' LIMIT 4");

                    foreach($readCat as $readCat){
                ?>
                <div class="col-md-3">
                  <div class="cartao">
                        <img class="rounded" src="../res/site/img/products/<?php echo $readCat['ImagemProduto']?>" alt="" >
                            <div class="cartao-hover">
                                <div class="texto-cartao">
                                
                                    <a class="btn btn-primary btn-block">Detalhes</a>
                                    <a class="btn btn-success btn-block">Comprar</a>

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