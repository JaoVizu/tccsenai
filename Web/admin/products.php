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

   include('../functions.php');

  //SELECIONANDO TODOS OS PRODUTOS DO BANCO
  $query = mysqli_query($conn, "select * from produto");

?>

    <!-- Content Header (Page header) -->
  <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Produtos
  </h1>


<!-- Main content -->

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
            
            <div class="box-header">
              <a href="product-create.php" class="btn btn-success">Cadastrar Produto</a>

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
                    <th>Valor</th>
                    <th>Descrição</th>
                    <th>Status Produto</th>
                    <th style="width: 140px">Detalhes</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_array($query)){?>
                  <!--Pegando codigo da categoria -->
                  <?php
                    //pegando nome da categoria
                    $codCategory = $row['CodCategoria'];
                    
                    $categoryQuery = mysqli_query($conn, " SELECT nomecategoria FROM Categoria WHERE CodCategoria = $codCategory");
                   
                    $catArray = mysqli_fetch_array($categoryQuery);

                    //pegando nome do fornecedor
                    $codForn = $row['CodFornecedor'];

                    $fornecedorQuery = mysqli_query($conn, " SELECT nomefant FROM fornecedor where codfornecedor = $codForn");

                    $fornArray = mysqli_fetch_assoc($fornecedorQuery);
                  
                  ?>
                  <tr>
                    
                    <td><?php echo $row['NomeProduto']?></td>
                    <td style="width: 100px;">R$ &nbsp;<?php echo $row['ValorProduto']?></td>
                    
                    <td><?php echo $row['Descricao']?></td>
                    <td><?php echo $row['StatusProduto']?></td>
                    
                    <td style="width:300px;">
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#<?php echo $row['CodProduto'];?>">Visualizar</button>
                      <a href="product-update.php?codproduto=<?php echo $row['CodProduto']?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="../cadastros/deleteProduto.php?codproduto=<?php echo $row['CodProduto'] ?>" onclick="return confirm('Deseja realmente alterar o status desse produto?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Alt. Status</a>
                    </td>
                  </tr>
                  <!-- modal larga-->
                  <div id="<?php echo $row['CodProduto'];?>" class="modal fade bs-example-modal-lg" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" style="font-size: 30px;">Info. Produto(s)</h4>
                        </div>

                        <div class="modal-content" style="font-size: 25px; padding: 10px;">
                          <?php
                            echo 'Código do Produto: '.$row['CodProduto'] . '<br/>';
                            echo 'Nome do Produto: '. $row['NomeProduto'] . '<br/>';
                            echo 'Valor Produto: R$ ' . formatPrice($row['ValorProduto']) . '<br/>';
                            echo 'Margem Lucro: ' . number_format($row['MargemLucro'],1).'%'.  '<br/>';
                            echo 'Valor de Venda: R$ ' . formatPrice($row['ValorVendaProduto']) . '<br/>';
                            echo 'Estoque: ' . $row['QntProduto'] . '<br/>';
                            echo 'Fornecedor: ' .$fornArray['nomefant'] . '<br/>';
                            echo 'Imagem Produto: ' .$row['ImagemProduto']. '<br/>';
                            echo 'Data de Cadastro: '.$row['DataCadastro']. '<br/>';
                            echo 'Descrição: ' .$row['Descricao']. '<br/>';
                            echo 'Categoria: ' .$catArray['nomecategoria']. '<br/>';
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



