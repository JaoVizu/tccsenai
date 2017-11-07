<!-- ABRINDO PHP PARA CONSULTA DE NOMES E ETC -->
<?php
  
  session_start();
  include('../Class/Sql.php');

  //tratamento de sessao
  if(!isset($_SESSION['usuario'])){
    //se nao estiver setada a sessao vai para o login
    header("Location: ../site/login.html");
    exit;
  }

  //pegar o CodCliente de quem iniciou a sessao
  $clienteSessao = $_SESSION['usuario']['CodCliente'];
  
  //fazer consulta para pegar o nome do admin logado
  $query = mysqli_query($conn, "SELECT * FROM cliente a INNER JOIN login b USING(CodCliente) WHERE a.CodCliente = '$clienteSessao'");

  $results = mysqli_fetch_assoc($query);
  $nome = $results['NomeCliente'];

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adm CarolinaJoias</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>CJ</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Adm</b>Carolina</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

     
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../res/site/img/menu-icons/admin-icon.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $nome; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../res/site/img/menu-icons/admin-icon.png" class="user-image" alt="User Image">

                <p>
                  <?php echo $nome; ?> - Administrador
                  <small>Member since -Colocar data de cadastro</small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="../validacoes/logout.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nome;?></p>
          <!-- Status -->
          
        </div>
      </div>

      <!-- search form (Optional) -->
      
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU ADMINISTRAÇÃO</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a id="users" a href="users.php"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
        <li><a id="products" href="products.php"><i class="fa fa-product-hunt"></i> <span>Produtos</span></a></li>
        <li><a id="category" a href="categoria.php"><i class="fa fa-tag"></i> <span>Categorias</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-area-chart"></i> <span>Vendas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
            <li><a href="relvendas.php">Relátorio de Vendas</a></li>
            
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-archive"></i> <span>Encomendas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="encomendas.php">Encomendas</a></li>
            
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="conteudo">
  
      <section class="content-header">
  <h1>
    Lista de Usuários
  </h1>
  
</section>

<!-- Main content -->
<section class="content ">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Novo Usuário</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form style="font-size:25px;" role="form" method="post" id="formCliente">
          <div class="box-body">

            <div class="row">

              <div class="form-group col-md-5">
                <label for="desperson">Nome</label>
                <input type="text" class="form-control" id="desperson" name="NomeCliente" placeholder="Digite o nome">
              </div>


              <div class="form-group col-md-4">
                  <label for="despassword">Data Nascimento</label>
                  <input type="date" class="form-control" id="datanasc" name="DataNasc" placeholder="Digite a data de nascimento">
              </div>

              <div class="form-group col-md-3">
                  <label for="despassword">Sexo</label>
                  <select name="SexoCliente" class="form-control" placeholder="Informe o Sexo">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                  </select>
              </div>

            </div><!-- fim linha -->

            <div class="row">
              
              <div class="form-group col-md-3">
                <label for="despassword">Cep</label>
                <input type="text" class="form-control" id="cepcliente" name="CepCliente" placeholder="Digite o CEP">
              </div>

              <div class="form-group col-md-1">
                <label for="">Nº Casa</label>
                <input type="text" class="form-control" id="numerohouse" name="numCasa" placeholder="Nº da Casa">
              </div>

              <div class="form-group col-md-2">
                <label for="">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
              </div>

              <div class="form-group col-md-6">
                <label for="despassword">Endereço</label>
                <input type="text" class="form-control" id="endCliente" name="EndCliente" placeholder="Digite o Endereço">
              </div>

            </div><!-- FIM LINHA -->

            <div class="row">
              <div class="form-group col-md-6">
                <label for="despassword">CPF</label>
                <input type="text" class="form-control" id="cpfcliente" name="CPFCliente" placeholder="Digite o CPF">
              </div>

              <div class="form-group col-md-6">
                <label for="despassword">RG</label>
                <input type="text" class="form-control" id="rgcliente" name="RGCliente" placeholder="Digite o RG">
              </div>
            </div><!-- fim linha -->

            <div class="row">

              <div class="form-group col-md-6">
                <label for="despassword">Telefone</label>
                <input type="text" class="form-control" id="telefonecliente" name="TelefoneCliente" placeholder="Digite o Telefone">
              </div>

              <div class="form-group col-md-6">
                <label for="despassword">Celular</label>
                <input type="text" class="form-control" id="celularcliente" name="CelularCliente" placeholder="Digite o celular">
              </div>

            </div><!-- FIM LINHA -->

            <div class="row">

              <div class="form-group col-md-4">
                <label for="despassword">Cidade</label>
                <input type="text" class="form-control" id="cidadecliente" name="CidadeCliente" placeholder="Digite a cidade">
              </div>

              <div class="form-group col-md-2">
                <label for="despassword">Estado</label>
                <input type="text" class="form-control" id="estadocliente" name="EstadoCliente" placeholder="Digite o estado">
              </div>

              <div class="form-group col-md-6">
                <label for="despassword">Bairro</label>
                <input type="text" class="form-control" id="bairrocliente" name="BairroCliente" placeholder="Digite o bairro">
              </div>
            
            </div><!-- fim linha -->

          <div class="row">  

            <div class="form-group col-md-4">
                <label for="deslogin">Login</label>
                <input type="text" class="form-control" id="deslogin" name="NomeLogin" placeholder="Digite o login">
              </div>

            
              <div class="form-group col-md-4">
                <label for="desemail">E-mail</label>
                <input type="email" class="form-control" id="desemail" name="email" placeholder="Digite o e-mail">
              </div>

            
              <div class="form-group col-md-4">
                <label for="despassword">Senha</label>
                <input type="password" class="form-control" id="despassword" name="Senha" placeholder="Digite a senha">
              </div>
          </div><!-- fim linha -->

            <div class="checkbox">
              <label>
                <input type="checkbox" name="inadmin" value="1"> Acesso de Administrador
              </label>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button id="enviar" type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->   

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">StarSystem</a>.</strong> Todos os direitos reservados.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<script src="dist/js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<script src="dist/js/ajax.js"></script>
<script src="dist/js/cadastroCliente.js"></script>
<script src="dist/js/jquery.mask.js"></script>
<script src="dist/js/funcoesJQ.js"></script>
<script>
    $('#cpfcliente').blur(function(){
        var cpf = $('#cpfcliente').val();

        $.ajax({
          url: '../validacoes/validaCpf.php',
          method: 'get',
          data: "cpf="+cpf,

          success: function(data){
            if(data == "1"){
              alert('O CPF digitado é válido');
            }else{
              alert('Digite um CPF válido!');
             $('#cpfcliente').val("");
          }
          }
        });
    });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
