<?php

include('Class/Sql.php');
include('functions.php');

//CONSULTA DE PRODUTOS
$query = mysqli_query($conn, "SELECT * FROM produto");

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
    <section id="header-products">
        <div class="container categories" style="margin-bottom: 10px;"> 
            
            <ul class="category-list">
                <a href="produtos.php">Todos</a>
            <?php 
                $read_categoria = mysqli_query($conn, "SELECT * FROM categoria ORDER BY NomeCategoria ASC");
                if(mysqli_num_rows($read_categoria) > 0){
                    foreach ($read_categoria as $read_categoria) {
                        echo '<a href="produtos.php?cat='.$read_categoria['CodCategoria'].'">'.$read_categoria['NomeCategoria'].'&nbsp;</a>';
                    }
                }

            ?>
            </ul>

        </div>
        <div class="container">
            <div class="d-flex justify-content-around flex-wrap">
                <input type="search" id="search" name="search" placeholder="Procurar...">

                <select name="ordenar" id="ordenar">
                    <option value="maiorpreco">Maior Preço</option>
                    <option value="menorpreco">Menor Preço</option>
                    <option value="alfabetico">Ordenar A - Z</option>
                </select>
            </div>
        </div>
        
    </section>
    
    <section id="vitrine-products">
        <div class="container">
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
                <div class="col-md-4">
                    <div class="container-card">
                        <!-- clique geral -->
                        <div class="imagem-produto">
                            <a href=""><img class="box-responsive" src="../res/site/img/products/<?php echo $read_produto['ImagemProduto']?>" alt=""></a>
                        </div>
                        
                        <div class="descricao-produto">
                            <p class="description-t"><?php echo $read_produto['NomeProduto'] ?></p>
                            <p class="description-p"><?php echo $read_produto['Descricao']?></p>
                            <div class="card-price">
                                <span class="price"><strong>R$ &nbsp;<?php echo formatPrice($read_produto["ValorVendaProduto"])?></strong>
                                <br/>
                                <?php echo $read_produto["QntParcelas"].'x'?>&nbsp;&nbsp;&nbsp;<?php echo $read_produto["ValorParcela"]?>
                                </span>
                            </div>
                        </div>
                        <div class="custom-fundo">
                            <a href="">Comprar</a>
                        </div>
                    </div>    
                </div><!-- fim col -->
                <?php
                    }
                }
                ?>
            </div><!-- fim row -->
            
        </div><!-- fim container -->
    </section>
</body>
</html>