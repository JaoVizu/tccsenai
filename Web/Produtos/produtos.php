<?php

include('Class/Sql.php');
include('functions.php');
//include('Class/Carrinho.php');

//iniciando a sessao
//session_start();

//CONSULTA DE PRODUTOS
$query = mysqli_query($conn, "SELECT * FROM produto");

/*if(isset($_GET['add'])):
    if($_GET['add'] == 'ok'):
        $produto = new Carrinho;
        $produto->setId((int)$_GET['id_prod']);
        $produto->adicionar();
        header('Location:produtos.php');
    endif;
endif;*/
//print_r($_SESSION['pedido']);

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

    <!-- IMPORTANDO MAIN.CSS -->
    <link rel="stylesheet" href="css/produtos.css">
    
    <title>Produtos</title>
</head>
<body>

    <div class="jumbotron text-center">
        <?php 

            $read_categoria = mysqli_query($conn, "SELECT * FROM categoria ORDER BY NomeCategoria ASC");
            //verificando se a variavel do $_GET esta setada -  se sim- se não
            if(isset($_GET['cat'])){
                if(mysqli_num_rows($read_categoria) > 0){
                        foreach ($read_categoria as $read_categoria) {
                            if($read_categoria['CodCategoria'] == $_GET['cat']){
                                echo '<h1 class="jumbo-text">'.$read_categoria['NomeCategoria']. '</h1>';
                            }
                    }
                }

            }else{
                echo '<h1 class="jumbo-text">Todos os produtos</h1>';
            }

        ?>
    </div>
    <div class="row">
        <div class="col-md-3">
            <section id="header-products">
                <div class="container categories" style="margin-bottom: 10px;">                
                    
                    <div class="d-flex flex-column justify-content-around flex-wrap mb-5" id="search-ord">
                        <input type="search" id="search" name="search" placeholder="Procurar...">

                        <select name="ordenar" id="ordenar">
                            <option value="0">Ordenar por...</option>
                            <option value="1">Maior Preço</option>
                            <option value="2">Menor Preço</option>
                            <option value="3">Ordenar A - Z</option>
                        </select>
                    </div>
                    
                    <h2>Categorias</h2>
                    <ul class="d-flex flex-column mt-2" id="lista-cat">
                        <a class="" href="produtos.php">Todos</a>
                    <?php 

                        $read_categoria = mysqli_query($conn, "SELECT * FROM categoria ORDER BY NomeCategoria ASC");
                        if(mysqli_num_rows($read_categoria) > 0){
                            foreach ($read_categoria as $read_categoria) {
                                echo '<a class=""  href="produtos.php?cat='.$read_categoria['CodCategoria'].'">'.$read_categoria['NomeCategoria'].'&nbsp;</a>';
                            }
                        }

                    ?>
                    </ul>
                </div>
                
            </section>
        </div>
    
        <div class="col-md-7 ml-3">
            <section id="vitrine-products">
                <div class="row">
                    
                <?php
                    if(isset($_GET['cat']) && $_GET['cat'] != ''){
                                $id_cat = addslashes($_GET['cat']);
                                $sql_categoria = "AND codcategoria = '".$id_cat."'";
                            }else{
                                $sql_categoria = "";
                            }
                            $read_produto = mysqli_query($conn, "SELECT * FROM produto WHERE codproduto != '' {$sql_categoria}");
                            if(mysqli_num_rows($read_produto) > 0){
                                foreach ($read_produto as $read_produto) {
                ?>
                <div class="card mt-2 ml-2" style="width: 20rem;">
                    <img class="card-img-top" src="../Web/res/site/img/products/<?php echo $read_produto['ImagemProduto']?>" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $read_produto['NomeProduto'];?></h4>
                        <p><strong>R$ &nbsp;<?php echo formatPrice($read_produto["ValorVendaProduto"])?></strong></p>
                        <a href="detalhes.php?id_prod=<?php echo $read_produto['CodProduto'];?>" class="btn btn-secondary">Detalhes</a>
                        <a href="../Web/carrinho.php?acao=add&id_prod=<?php echo $read_produto['CodProduto'];?>" class="btn btn-primary">Comprar</a>
                    </div>
                </div>
                <?php
                    }
                } ?>
                
                </div>
            </section>
        </div> <!-- fim col-md-9 -->
    </div><!--fim linha-->

    <!-- Scripts -->

    
</body>
</html>