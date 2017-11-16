

<body>
    
    <section class="loginBox">
        <img src="../Web/res/site/img/shiny-diamond.png" alt="" class="diamond">
        <h2>Faça seu login</h2>
        <form action="../Web/validacoes/validaLogin.php" method="post" id="loginForm">
            
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
            <input type="submit" name="" value="Entrar" id="logar-btn">
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

    <script src="../Web/admin/dist/js/jquery-3.2.1.min.js"></script>
    
    <script>
        $('#logar-btn').click(function(e){
            e.preventDefault();
            
            $.ajax({
                url: 'validacoes/validaLogin.php',
                method:'post',
                data: $('#loginForm').serialize(),

                success: function(data){
                    
                    if(data == '1'){ window.location = "../Web/index.php"}else{window.location ="../Web/site/loadingPage/loading.php"}
                }
            });
        })
    </script>
</body>
