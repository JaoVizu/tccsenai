

<body>
    
    <section class="loginBox">
        <img src="../res/site/img/shiny-diamond.png" alt="" class="diamond">
        <h2>Faça seu login</h2>
        <form action="../Web/validacoes/validaLogin.php" method="post">
            
            <div class="group">
                <p>Usuário</p>
                <input type="text" name="login" placeholder="Digite seu nome de usuário">
                <span class="bar"></span>
            </div>
            <div class="group">
                <p>Senha</p>
                <input type="password" name="password" placeholder="Digite sua senha">
                <span class="bar"></span>
            </div>
            <input type="submit" name="" value="Entrar">
            <p style="color: red;">
            <?php
                if(isset($_SESSION['loginerror'])){
                    echo $_SESSION['loginerror'];
                    unset($_SESSION['loginerror']);
                }
            ?>
            </p>
            <a href="cadastroCliente.php">Não tenho um cadastro</a><br/>
            <a href="">Esqueci minha senha</a>     

        </form>
    </section>
   
</body>
