<!-- ABRINDO PHP PARA CONSULTA DE NOMES E ETC -->
<?php
  
  session_start();
  include('../Class/Sql.php');
  include('../functions.php');

  //tratamento de sessao
  if(!isset($_SESSION['usuario'])){
    //se nao estiver setada a sessao vai para o login
    header("Location: ../login.php");
    exit;
  }

  //pegar o CodCliente de quem iniciou a sessao
  $clienteSessao = $_SESSION['usuario']['CodCliente'];
  
  //fazer consulta para pegar o nome do admin logado
  $query = mysqli_query($conn, "SELECT * FROM cliente a INNER JOIN login b USING(CodCliente) WHERE a.CodCliente = '$clienteSessao'");

  $results = mysqli_fetch_assoc($query);
  $nome = $results['NomeCliente'];

  //TRAZER AS VENDAS
  $query = mysqli_query($conn, "SELECT * FROM Encomenda a INNER JOIN Cliente b ON a.codcliente = b.codcliente;");
  
  //Vendo o total de vendas
  $totalEncomenda = mysqli_query($conn, " SELECT COUNT(*) AS total FROM Encomenda");
  $rowTotal = mysqli_fetch_assoc($totalEncomenda); 

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
                <img src="../res/site/img/menu-icons/admin-icon.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $nome; ?> - Administrador
                  
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
          <li>
            
          </li>
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

    <div class="content-header">
        <h1>Relatório de Encomendas</h1>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Relátorio de Encomendas</h3>
                        <h4 class="pull-right">Encomendas Totais:&nbsp; <strong style="font-size:40px;"><?php echo $rowTotal['total']; ?></strong></h4>
                    </div>
                    
                    <!-- tabela do relatorio -->
                    <table class="table table-striped" style="font-size: 18px;">
                        <thead>
                            <th>Código de Encomenda</th>
                            <th>Cliente</th>
                            <th>Data de Encomenda</th>
                            <th>Forma Pagamento</th>
                            <th>Status Pedido</th>
                            <th>Detalhes Item Encomenda</th>
                        </thead>
                        
                        <tbody>
                            <?php foreach($query as $row){?>
                            <tr>
                                <td><?php echo $row['CodEncomenda'];?></td>
                                <td><?php echo $row['NomeCliente']?></td>
                                <td><?php echo $row['DataEncomenda'];?></td>
                                <td><?php echo $row['FormaPagamento'];?></td>
                                <td><?php echo $row['StatusPedido'];?></td>
                                <td> 
                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['CodEncomenda'];?>">Visualizar Item</button>
                                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#modalAlt<?php echo $row['CodEncomenda'];?>"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                            <!-- Modal -->
                                <div id="myModal<?php echo $row['CodEncomenda']; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" style="font-size: 30px;">Item(s)</h4>
                                        </div>
                                        <div class="modal-body" style="font-size: 25px;">
                                          <?php
                                          //PESQUISAR O ITEM ENCOMENDA
                                          $codEnco = $row['CodEncomenda'];

                                          //pegar item da encomenda e produto
                                          $queryItemEnco = mysqli_query($conn, "SELECT * FROM itemencomenda where codencomenda = '$codEnco';");
                                          
                                          $arrayItem = mysqli_fetch_assoc($queryItemEnco);
                                          $codProduto = $arrayItem['CodProduto'];

                                          $queryPegaProd = mysqli_query($conn,"SELECT * FROM produto WHERE codproduto = '$codProduto'; ");
                                          $pegaProd = mysqli_fetch_assoc($queryPegaProd);

                                          echo "Nome do produto: ".'<strong>' . $pegaProd['NomeProduto']. '</strong><br/>';
                                          echo "Quantidade: ".' <strong>' . $pegaProd['QntProduto']. '</strong><br/>';
                                          echo "Valor do produto: ".'<strong>R$ ' . formatPrice($arrayItem['ValorItemEncomenda']). '</strong><br/>';

                                          //calculando total
                                          $total = (float)$pegaProd['ValorVendaProduto'] * (float)$arrayItem['QntItemEncomenda'];

                                          echo "Valor total: " . '<strong>R$ '. formatPrice($total).'</strong>';
                                          ?>
                                          
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- outra modal -->
                                <!-- Modal -->
                                <div id="modalAlt<?php echo $row['CodEncomenda']; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" style="font-size: 30px;">Item(s)</h4>
                                        </div>
                                        <div class="modal-body" style="font-size: 25px;">
                                          <form action="../update/updateEncomenda.php" method="post" id="altEncomenda">
                                            <div class="form-group">

                                              <label>Código Encomenda</label>
                                              <input type="text" class="form-control" name="codEnco" value="<?php echo $row['CodEncomenda']?>" readonly/>

                                              <label>Endereço Encomenda</label>
                                              <input type="text" class="form-control" name="endEncomenda" value="<?php echo $row['EndEncomenda']?>"/>
                                              
                                              <br/>

                                              <input type="submit" id="enviar" value="Alterar Dados" class="btn btn-lg btn-warning"/>
                                            </div>
                                          </form>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                        </div>
                                        </div>

                                    </div>
                                </div>
                            <?php }?>
                        </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
    </section>

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
<!-- <script src="dist/js/updateEncomendas.js"></script> -->



</script>
</body>
</html>