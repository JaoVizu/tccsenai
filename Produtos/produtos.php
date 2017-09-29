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
        <div class="container">
            <div class="d-flex justify-content-around flex-wrap">
                <input type="search" id="search" name="search" placeholder="Procurar...">

                <select name="ordenar" id="ordenar">
                    <option value="">Maior Preço</option>
                    <option value="">Menor Preço</option>
                    <option value="">Ordenar A - Z</option>
                </select>
            </div>
        </div>
        
    </section>
    
    <section id="vitrine-products">
        <div class="container">
            <div class="row">
                <?php while($rowProd = mysqli_fetch_assoc($query)){?>
                <div class="col-md-4">
                    <div class="container-card">
                        <!-- clique geral -->
                        <div class="imagem-produto">
                            <a href=""><img class="box-responsive" src="https://ambercreative.co/experiments/apple-store/img/product-4.jpg" alt=""></a>
                        </div>
                        
                        <div class="descricao-produto">
                            <p class="description-t"><?php echo $rowProd['NomeProduto'] ?></p>
                            <p class="description-p"><?php echo $rowProd['Descricao']?></p>
                            <div class="card-price">
                                <span class="price"><strong>R$ &nbsp;<?php echo formatPrice($rowProd["ValorVendaProduto"])?></strong>
                                <br/>
                                <?php echo $rowProd["QntParcelas"].'x'?>&nbsp;&nbsp;&nbsp;<?php echo $rowProd["ValorParcela"]?>
                                </span>
                            </div>
                        </div>
                        <div class="custom-fundo">
                            <a href="">Comprar</a>
                        </div>
                    </div>    
                </div><!-- fim col -->
                <?php } ?>
            </div><!-- fim row -->
            
        </div><!-- fim container -->
    </section>
</body>
</html>