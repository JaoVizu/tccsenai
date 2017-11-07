
<!-- ABRINDO PHP PARA CONSULTA DE NOMES E ETC -->
<?php
  
  session_start();
  include('../Class/Sql.php');

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

  //pegando os usuarios do banco de dados
  $query = mysqli_query($conn, "SELECT * FROM Cliente a INNER JOIN login b USING(CodCliente) ORDER BY a.CodCliente");

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
    
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU ADMINISTRAÇÃO</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a id="users" a href=""><i class="fa fa-users"></i> <span>Usuários</span></a></li>
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
   <section class="content-header">
  <h1>
    Lista de Usuários
  </h1>
 
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
            
            <div class="box-header">
              <a href="user-create.php" class="btn btn-success">Cadastrar Usuário</a>

              <form class="pull-right">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Search...">
                      <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </span>
                </div>
              </form>
            </div>

            <div class="box-body no-padding table-responsive">
              <table style="font-size: 18px;" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Celular</th>
                    <th>E-mail</th>                  
                    <th style="width: 60px">Admin</th>
                    <th style="width: 60px">Status</th>
                    <th style="width: 140px">Detalhes</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- INICIANDO LOOP -->
                  <?php while ($row = mysqli_fetch_assoc($query)){?>
                  <tr>
                    <td><?php echo $row['NomeCliente']?></td>
                    <td><?php echo $row['CelularCliente']?></td>
                    <td><?php echo $row['email']?></td>
                    
                    <td>  <?php 
                            if($row['inadmin'] == 1){
                              echo "Sim";
                            }else{
                              echo "Não";
                            }
                          ?>
                      
                    </td>
                    <td><?php echo $row['StatusCliente']?></td>
                    <td style="width: 300px;">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo $row['CodCliente'];?>">Visualizar</button>
                      <a href="user-update.php?codcliente=<?php echo $row['CodCliente']?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="../cadastros/deleteCliente.php?idCliente=<?php echo $row['CodLogin'] ?>" onclick="return confirm('Deseja realmente mudar o status do Cliente?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Alt. Status</a>
                    </td>
                  </tr>
                    <!-- modal larga-->
                  <div id="<?php echo $row['CodCliente'];?>" class="modal fade bs-example-modal-lg" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" style="font-size: 30px;">Info. Cliente(s)</h4>
                        </div>

                        <div class="modal-content" style="font-size: 25px; padding: 10px;">
                          <?php
                            echo 'Código do Cliente: '.$row['CodCliente'] . '<br/>';
                            echo 'Nome : '.$row['NomeCliente'] . '<br/>';
                            echo 'Data Nascimento : '. $row['DataNasc'] . '<br/>';
                            echo 'Endereço : ' . $row['EndCliente'] . '<br/>';
                            echo 'Nº Casa : ' . $row['NCliente'] . '<br/>';
                            echo 'Complemento : ' . $row['ComCliente'] . '<br/>';
                            echo 'CEP : ' . $row['CepCliente'].  '<br/>';
                            echo 'CPF : ' . $row['CPFCliente'] . '<br/>';
                            echo 'RG : ' . $row['RGCliente'] . '<br/>';
                            echo 'Telefone : ' .$row['TelefoneCliente'] . '<br/>';
                            echo 'Celular : ' .$row['CelularCliente']. '<br/>';
                            echo 'Cidade : ' .$row['CidadeCliente'] . '<br/>';
                            echo 'Estado :' .$row['EstadoCliente'] . '<br/>';
                            echo 'Bairro : '.$row['BairroCliente']. '<br/>';
                            echo 'Sexo : ' .$row['SexoCliente']. '<br/>';
                            echo 'E-mail : ' .$row['email']. '<br/>';
                            echo 'Login : ' .$row['NomeLogin']. '<br/>';
                            echo 'Administrador :';
                            if($row['inadmin'] == 1){
                              echo " Sim";
                            }else{
                              echo " Não";
                            }
                          ?>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>

</section>
<!-- /.content -->
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


</script>
</body>
</html>