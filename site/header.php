    <?php
        session_start();
        
    ?>
    <!-- NAVBAR FIXED TOP -->
    <nav class="navbar  navbar-expand-md navbar-light bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

            <a class="navbar-brand" href="/">Carolina Joias</a>
            
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <div class="container">
                    <div class="px-3">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 px-4">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Joias
                                </a>
                                <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                                    <div class="area">
                                    <ul>
                                        <li><a class="dropdown-item" href="#"><img src="res/site/img/menu-icons/aneis.svg" alt="aneis">Anéis</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="res/site/img/menu-icons/brincos.svg" alt="brincos">Brincos</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="res/site/img/menu-icons/colares.svg" alt="colares">Colares</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="res/site/img/menu-icons/pulseiras.svg" alt="pulseiras">Pulseiras</a></li>
                                        <li><a class="dropdown-item" href="#"><img src="res/site/img/menu-icons/pulseiras.svg" alt="tornozeleiras">Tornozeleiras</a></li>
                                    </ul>
                                </div>
                                </div>
                            </li>

                            <li class="nav-item ">
                                <a href="#rodape" class="nav-link">Redes Sociais</a>
                            </li>

                            <li class="nav-item">
                                <a href="#section-two" class="nav-link">Nossos Produtos</a>
                            </li>

                        </ul>
                    </div>
                </div><!-- FIM CONTAINER-->

                <li class="entrar nav-item">
                    <a href="../login.php" class="nav-link">Entrar</a>
                </li>
                <div class="content-carrinho d-flex">
                    <a href=""><span data-qtd=0 class="fa fa-shopping-bag" aria-hidden="true"></span></a>
                </div>
            </div>
    </nav>