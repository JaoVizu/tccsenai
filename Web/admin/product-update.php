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

  //PEGANDO CODIGO DO PRODUTO
  $codigoProd = isset($_GET['codproduto']) ? $_GET['codproduto'] : 0;

  //query para pegar informacoes do produto selecionado para update
  $queryProd = mysqli_query($conn, " SELECT * FROM produto WHERE CodProduto = '$codigoProd'");


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

          <!-- Notifications Menu -->
      
          <!-- Tasks Menu -->
          
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
        <li><a id="users" a href="index.php#!/users"><i class="fa fa-users"></i> <span>Usuários</span></a></li>
        <li><a id="products" href="index.php#!/products"><i class="fa fa-product-hunt"></i> <span>Produtos</span></a></li>
        <li><a id="category" a href="index.php#!/categoria"><i class="fa fa-tag"></i> <span>Categorias</span></a></li>
        <li><a href="index.php#!/vendas"><i class="fa fa-area-chart"></i>Relátorio de Vendas</a></li>
        
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

     <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Produtos
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Produto</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form style="font-size:25px;" role="form" action="../update/updateProdutos.php" method="post"  enctype="multipart/form-data">
          <div class="box-body">

            <?php while ($linha = mysqli_fetch_array($queryProd)){?>
            <?php $codCategory = $linha['CodCategoria']?>

            <div class="form-group">
              <label for="desproduct">Código do produto</label>
              <input type="text" class="form-control" id="desproduct" name="CodProduto" placeholder="Digite o nome do produto" value="<?php echo $linha['CodProduto']?>" readonly>
            </div>

            <div class="form-group">
              <label for="desproduct">Nome do produto</label>
              <input type="text" class="form-control" id="desproduct" name="NomeProduto" placeholder="Digite o nome do produto" value="<?php echo $linha['NomeProduto']?>">
            </div>
          

          <div class="row">
              <div class="form-group col-md-4">
                  <label for="vlprice">Valor Produto</label>
                  <input type="number" class="form-control" id="valor" name="ValorProduto" step="0.01" placeholder="0.00" value="<?php echo $linha['ValorProduto']?>">
              </div>

            <div class="form-group col-md-4">
              <label for="vlwidth">Margem Lucro</label>
              <input type="number" class="form-control" id="margem" name="MargemLucro" step="0.01" value="<?php echo $linha['MargemLucro']?>" placeholder="0% - 100%">
              <div id="erro"></div>
            </div>

            <div class="form-group col-md-4">
              <label for="vlheight">Valor de Venda</label>
              <input type="number" class="form-control" id="valorVenda" name="ValorVendaProduto" step="0.01" placeholder="0.00" value="<?php echo $linha['ValorVendaProduto']?>" readonly>
            </div>
          </div><!-- fim linha -->

          <div class="row">
            <div class="form-group col-md-3">
                <label for="vlheight">Quantidade</label>
                <input type="number" class="form-control" id="vlheight" name="QntProduto" placeholder="0.00" value="<?php echo $linha['QntProduto']?>">
            </div>
            
            <?php
                //pesquisa para pegar o nome da categoria
                $catName = mysqli_query($conn, " SELECT NomeCategoria FROM Categoria WHERE CodCategoria = $codCategory");
                $catNameArray = mysqli_fetch_assoc($catName);
            ?>
            <div class="form-group col-md-3">
                <label for="categoria">Categoria</label>
                <select name="Categoria" id="categoria" class="form-control">
                  <option value="">Categoria deste produto: <strong><?php echo $catNameArray['NomeCategoria']?></strong></option>
                  <option value="anel">Anel</option>
                  <option value="pulseira">Pulseira</option>
                  <option value="brinco">Brinco</option>
                  <option value="colar">Colar</option>
                  <option value="tornozeleira">Tornozeleira</option>
                </select>
            </div>

          <div class="row">
            <div class="form-group col-md-6">
                <label for="file">Foto</label>
                <input type="file" class="form-control" id="file" name="ImagemProduto">
                <div class="box box-widget">
                  <div class="box-body">
                    <img class="img-responsive" id="image-preview" src="../res/site/img/products/<?php echo $linha['ImagemProduto']?>" alt="Photo">
                  </div>
                </div>
            </div>
          

            <div class="form-group col-md-6">
              <label for="descricao">Descrição</label>
              <textarea class="form-control" name="Descricao" id="descricao" cols="30" placeholder="Descreva o produto"><?php echo $linha['Descricao']?></textarea>
            </div>
          </div><!-- fim linha -->
          </div><!-- fim linha -->
          <?php }?>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
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

<script src="dist/js/funcoesJQ.js"></script>

<script>
  document.querySelector('#file').addEventListener('change', function(){
    
    var file = new FileReader();

    file.onload = function() {
      
      document.querySelector('#image-preview').src = file.result;

    }

    file.readAsDataURL(this.files[0]);

});
</body>
</html>
