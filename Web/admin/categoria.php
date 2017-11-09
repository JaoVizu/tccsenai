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

  //PEGANDO CATEGORIAS CADASTRADAS
  $queryCategory = mysqli_query($conn, "SELECT * FROM categoria");

  //Query para pegar o ultimo id de venda para mostrar o mais recente
  $queryVendaR = mysqli_query($conn, "SELECT * FROM Venda a INNER JOIN Cliente b ON a.codcliente = b.CodCliente ORDER BY codVenda DESC LIMIT 2");
  $queryCountVR = mysqli_query($conn, "SELECT count(*) as totalVenda FROM Venda a INNER JOIN Cliente b ON a.codcliente = b.CodCliente ORDER BY codVenda DESC");
  $countVR = mysqli_fetch_assoc($queryCountVR); 
  

?>


  <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="conteudo">
  
      <section class="content-header">
  <h1>
    Lista de Categorias
  </h1>
</section>

<!-- Main content -->
<section class="content ">

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Nova Categoria</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form style="font-size:25px;" action="../cadastros/cadastroCategoria.php" role="form" method="post" id="formCliente">
          <div class="box-body">

            <div class="row">

              <div class="form-group col-md-6">
                <label for="desperson">Nome da Categoria</label>
                <input type="text" class="form-control" id="categoryName" name="NomeCategoria" placeholder="Digite o nome da categoria">
              </div>

            </div><!-- fim linha -->

          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button id="enviar" type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>
          
        <hr>

        <div class="box-body">
          
           <h3>Lista de Categorias Cadastradas</h3>
            <div class="row">

              <table class="table table-bordered table-striped" style="font-size: 18px;">
                <thead>
                  <tr>
                    <th>Código Categoria</th>
                    <th>Nome da Categoria</th>
                    <th>Ação</th>
                  </tr>
                </thead>


                <tbody>
                <?php while($rowCatiguria = mysqli_fetch_assoc($queryCategory)){ ?>
                  <tr>
                    <td><?php echo $rowCatiguria['CodCategoria'];?></td>
                    <td><?php echo $rowCatiguria['NomeCategoria'];?></td>
                    <td class="text-left"><a href="../cadastros/deleteCategoria.php?codcat=<?php echo $rowCatiguria['CodCategoria']?>" class="btn btn-danger" onclick="return confirm('Deseja deletar esta categoria?')"><i class="fa fa-trash"></i></a> &nbsp; <a href="" class="btn btn-warning" data-toggle="modal" data-target="#<?php echo $rowCatiguria['CodCategoria'];?>"><i class="fa fa-edit"></i></a></td>
                  </tr>
                  
                  <div id="<?php echo $rowCatiguria['CodCategoria'];?>" class="modal fade bs-example-modal-lg" aria-labelledby="myLargeModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title" style="font-size: 20px;">Alterar Categoria</h4>
                        </div>

                        <div class="modal-content" style="font-size: 25px; padding: 10px;">
                          <?php
                              /*echo "<label>Código Categoria</label> <br/>";
                              echo "<input type='text' readonly value='".$rowCatiguria["CodCategoria"]."'<br/><br/>";

                              echo "<label>Nome Categoria</label> <br/>";
                              echo "<input type='text' value='".$rowCatiguria["NomeCategoria"]."'";*/
                          ?>

                          <form action="../update/updateCategoria.php" id="formCat" method="post">
                            <label for="">Código Categoria</label> <br/>
                            <input type="text" value="<?php echo $rowCatiguria['CodCategoria']?>" name="codCat"> <br/>

                            <label for="">Nome Categoria</label><br/>
                            <input type="text" value="<?php echo $rowCatiguria['NomeCategoria']?>" name="nomeCat">
                            <br/>
                            <button id="enviar" type="submit" class="btn btn-primary">Alterar</button>
                          </form>
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

            </div><!-- fim linha -->
        </div>
      </div>
    </div>
  </div>

</section>
<!-- /.content -->   

    </section>
    <!-- /.content -->
 
  <!-- /.content-wrapper -->

