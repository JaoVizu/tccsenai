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
  
