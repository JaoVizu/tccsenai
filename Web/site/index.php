    <?php
        include('Class/Sql.php');
        include('functions.php');
        //CONSULTA DE PRODUTOS ->TRAZ PRODUTOS ALEATORIOS
        $products = mysqli_query($conn, "SELECT * FROM produto ORDER BY RAND() LIMIT 4");
    ?>
    <!-- SLIDER -->
    <ul class="rslides" id="slider"> 
        <li><img src="res/site/img/imagemSlideUm.png" alt=""></li>
        <li><img src="res/site/img/imagemSlideDois.png" alt=""></li>
        <li><img src="res/site/img/imagemSlideTres.png" alt=""></li>
    </ul>

    <!-- TITULO DA SEÇÃO -->
    <h2 class="titulo">Carolina <br/> Joias</h2>
    <!-- SECAO DE COLECAO -->
    <section id="produtos" class="anime">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 align-self-center">
                    <div class="row justify-content-center">
                        <h2 class="sub-titles">Nossos <br/> Melhores <br/>Produtos</h2>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row align-items-center">
                        <div class="col align-self-center">
                            <div class="efeito">
                                <figure>
                                    <div class="box-black"></div>
                                        <a href="produtos.php?cat=1"><img class="img-fluid" src="res/site/img/img-produtos/produto1.png" alt="pulseira"></a>

                                    <figcaption>
                                        <p>Anéis</p>
                                        <a class="button" href="produtos.php?cat=1">comprar</a>
                                    </figcaption>
                                </figure>
                            </div><!-- fim div efeito-->
                            <a href="produtos.php?cat=1"><span>Coleção Anéis</span></a>
                        </div>

                        <div class="col align-self-center">
                            <div class="efeito">
                                <figure>
                                    <div class="box-black"></div>
                                        <a href="produtos.php?cat=4"><img class="img-fluid" src="res/site/img/img-produtos/produto2.png" alt="pulseira"></a>

                                    <figcaption>
                                        <p>Colares</p>
                                        <a class="button" href="produtos.php?cat=4">comprar</a>
                                    </figcaption>
                                </figure>
                            </div><!-- fim div efeito-->
                            <a href="produtos.php?cat=4"><span>Coleção Colares</span></a>
                        </div>

                        <div class="col align-self-center">
                            <div class="efeito">
                                <figure>
                                    <div class="box-black"></div>
                                        <a href="produtos.php?cat=5"><img class="img-fluid" src="res/site/img/img-produtos/produto3.png" alt="pulseira"></a>

                                    <figcaption>
                                        <p>Pulseiras</p>
                                        <a class="button" href="produtos.php?cat=5">comprar</a>
                                    </figcaption>
                                </figure>
                            </div><!-- fim div efeito-->
                            <a href="produtos.php?cat=5"><span>Coleção Pulseiras</span></a>
                        </div>
                    </div>
                </div>
               
            </div><!-- fim row -->
        </div><!-- fim container -->
    </section>

    <!-- SECAO DE PRODUTOS -->
    <section id="section-one">
        <div class="container-fluid">
           <div class="row">
               <div class="col-md-6 col-sm-12">
                    <div class="row justify-content-center">
                        <img class="img-responsive" src="res/site/img/img-produtos/img-pag-5.png" alt="">
                    </div>
               </div>

               <div class="col-md-6 col-sm-12 quebra">

                    <div class="border-baixo row justify-content-center">
                        <h2 class="sub-titles">Desperte sua beleza</h2>
                    </div>

                    <div class="texto">
                        <p>“Uma joia tem o poder de ser essa coisa pequena que pode lhe fazer sentir única” - <em>Jennie Kwon</em></p>
                        <p>Seja única! Conheça nossos produtos</p>
                    </div>
                    
               </div>
           </div>
        </div>
    </section>


    <!-- TITULO DA SEÇÃO -->
    <h2 class="titulo-two">Nossos Produtos</h2>

    <!-- secao two -->
    <section id="section-two" class="anime">
        <div class="container">
            <div class="row">
                 <?php while($rows = mysqli_fetch_assoc($products)){ ?>
                <div class="col-md-3 col-sm-6">
                    <div class="card text-center">
                        <img class="card-img-top" src="res/site/img/products/<?php echo $rows['ImagemProduto']?>" alt="<?php echo $rows['ImagemProduto']?>">
                        <div class="card-body">
                            <p style="white-space: nowrap;overflow:hidden; text-overflow:ellipsis;" class="card-content"><?php echo $rows["NomeProduto"];?></p>
                            <p><strong><?php echo "R$ &nbsp;" . formatPrice($rows["ValorVendaProduto"]);?></strong></p>
                            <a class="button" href="detalhes.php?id_prod=<?php echo $rows["CodProduto"]; ?>">comprar</a>
                        </div><!-- fim card body-->
                    </div><!-- fim cartao-->
                </div><!-- fim coluna -->
                <?php } ?>
            </div><!-- fim linha -->
        </div><!-- fim container -->
    </section>

    <!-- MINI ANUNCIO -->
    <section id="anuncio">
        <div class="container">
            <div class="py-3">
                <div class="row">
                    <div class="col-md-4">
                        <img src="res/site/img/menu-icons/encomenda.svg" alt="" style="width:70px;"><span class="span-anuncio">Faça sua encomenda</span>
                    </div>

                    <div class="col-md-4">
                        <img src="res/site/img/menu-icons/store.svg" alt="" style="width:70px;"><span class="span-anuncio">Retire seu produto na loja</span>
                    </div>

                    <div class="col-md-4">
                        <img src="res/site/img/menu-icons/boleto.svg" alt="" style="width:70px;"><span class="span-anuncio">Ganhe desconto no boleto</span>
                    </div>
                </div>
            </div>
        </div>
    </section>