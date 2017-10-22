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

    <div class="jumbotron text-center">
        <?php 

            $read_categoria = mysqli_query($conn, "SELECT * FROM categoria ORDER BY NomeCategoria ASC");
            //verificando se a variavel do $_GET esta setada -  se sim- se não
            if(isset($_GET['cat'])){
                if(mysqli_num_rows($read_categoria) > 0){
                        foreach ($read_categoria as $read_categoria) {
                            if($read_categoria['CodCategoria'] == $_GET['cat']){
                                echo '<h1 class="jumbo-text">'.$read_categoria['NomeCategoria'].'</h1>';
                            }
                    }
                }

            }else{
                echo '<h1 class="jumbo-text">Todos os produtos</h1>';
            }

        ?>
    </div>
    <div class="row">
        <div class="col-md-3 ml-3">
            <section id="header-products">
                <div class="container categories" style="margin-bottom: 10px;">                
                    
                    <div class="d-flex flex-column justify-content-around flex-wrap">
                        <input type="search" id="search" name="search" placeholder="Procurar...">

                        <select name="ordenar" id="ordenar">
                            <option value="maiorpreco">Maior Preço</option>
                            <option value="menorpreco">Menor Preço</option>
                            <option value="alfabetico">Ordenar A - Z</option>
                        </select>
                    </div>
                    
                    <ul class="list-group mt-2" id="lista-cat">
                        <a class="list-group-item" href="produtos.php">Todos</a>
                    <?php 

                        $read_categoria = mysqli_query($conn, "SELECT * FROM categoria ORDER BY NomeCategoria ASC");
                        if(mysqli_num_rows($read_categoria) > 0){
                            foreach ($read_categoria as $read_categoria) {
                                echo '<a class="list-group-item" href="produtos.php?cat='.$read_categoria['CodCategoria'].'">'.$read_categoria['NomeCategoria'].'&nbsp;</a>';
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
                        <div class="col-md-4">
                            <div class="cartao">
                                <img class="rounded" src="../res/site/img/products/<?php echo $read_produto['ImagemProduto']?>" alt="" >
                                <!-- <div class="cartao-hover">
                                    <div class="texto-cartao">
                            
                                    <button class="btn btn-primary btn-block">Detalhes</button>
                                    <button class="btn btn-success btn-block">Comprar</button>

                                    </div>
                                </div> -->
                            </div>

                            <div class="legenda-prod text-center">
                                <p class="description-t"><?php echo $read_produto['NomeProduto'] ?></p>
                                <!-- <p class="description-p"><?php //echo $read_produto['Descricao']?></p> -->
                                <div class="card-price">
                                    <span class="price"><strong>R$ &nbsp;<?php echo formatPrice($read_produto["ValorVendaProduto"])?></strong>
                                    <br/>
                                    <?php echo $read_produto["QntParcelas"].'x'?>&nbsp;&nbsp;&nbsp;<?php echo $read_produto["ValorParcela"]?>
                                    </span>
                                </div>
                                <span class="separador"><img src="Produtos/img/diamond.svg" alt="Separador" width="15" id="separador"></span>
                                <a href="detalhes.php?id_prod=<?php echo $read_produto['CodProduto'];?>" class="btn btn-primary btn-block">Detalhes</a>
                                <a class="btn btn-success btn-block">Comprar</a>
                            </div>
                        </div> <!-- fim coluna -->
                         <?php
                                }
                            }
                        ?>
                    </div>
                

                
            </section>
        </div> <!-- fim col-md-9 -->
    </div><!--fim linha-->

    <!-- Scripts -->

    
</body>
</html>