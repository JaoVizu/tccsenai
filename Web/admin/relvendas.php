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
  $queryVendas = mysqli_query($conn, " SELECT * FROM Venda a INNER JOIN Cliente b USING(CodCliente) Where CodVenda > 1");

  //Vendo o total de vendas
  $totalVenda = mysqli_query($conn, " SELECT COUNT(*) AS total FROM Venda");
  $rowTotal = mysqli_fetch_assoc($totalVenda); 



?>

    <!-- Main content -->
    <section class="conteudo">

           <div class="content-header">
        <h1>Relatório de Vendas</h1>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Relátorio de Vendas</h3>
                        
                        <a class="pull-right" style="margin-right: 20px;" href="../geraPdf.php"><i class="fa fa-file-pdf-o fa-4x"></i></a>
                    </div>
                    
                    <!-- tabela do relatorio -->
                    <table class="table table-striped" style="font-size: 18px;">
                        <thead>
                            <th>Código de Venda</th>
                            <th>Cliente</th>
                            <th>Data de Venda</th>
                            <th>Forma Pagamento</th>
                            <th>Status Pedido</th>
                            <th>Visualizar Item Venda</th>
                        </thead>
                        
                        <tbody>
                            <?php while($rowVenda = mysqli_fetch_assoc($queryVendas)){?>
                            <tr>
                                <td><?php echo $rowVenda['CodVenda'];?></td>
                                <td><?php echo $rowVenda['NomeCliente']?></td>
                                <td><?php echo $rowVenda['DataVenda'];?></td>
                                <td><?php echo $rowVenda['FormaPagamento'];?></td>
                                <td><?php echo $rowVenda['StatusPedido'];?></td>
                                <td> 
                                    <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal<?php echo $rowVenda['CodVenda'];?>">Visualizar Item</button>
                                </td>
                            </tr>
                            <!-- Modal -->
                                <div id="myModal<?php echo $rowVenda['CodVenda']; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title" style="font-size: 30px;">Item(s)</h4>
                                        </div>
                                        <div class="modal-body" style="font-size: 25px;">
                                          <?php
                                            //PESQUISAR O ITEM VENDA DA VENDA SELECIONADA
                                            $codVenda = $rowVenda['CodVenda'];

                                            //pegando item da venda e o produto
                                            $queryItemVenda = mysqli_query($conn, "SELECT * FROM itemvenda where codvenda = '$codVenda'");
                                          ?>
                                          <?php

                                            foreach($queryItemVenda as $linha):

                                                //pegando o codigo do produto
                                                $codigoproduto = $linha['CodProduto'];
                                                //Selecionando o produto do item da venda
                                                $queryPegaProduto = mysqli_query($conn, "SELECT * FROM produto WHERE codproduto = '$codigoproduto'");

                                                //laço para mostrar todos os nomes do produtos que estao nos itens das vendas
                                                foreach($queryPegaProduto as $pega):
                                                
                                                    echo "Nome do Produto: ". '<strong>' . $pega['NomeProduto'].'</strong>' . '<br/>';
                                                    echo "Quantidade: " . '<strong>'.$linha['QntItem']. '</strong>' . '<br/>';

                                                    echo "Valor total: " . '<strong>R$ '.formatPrice($linha['ValorItem']).'</strong><br/>';
                                                    endforeach;  
                                            endforeach;
                                                
                                          ?>
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

   

    

