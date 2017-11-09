
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
  