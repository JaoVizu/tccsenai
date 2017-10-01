<?php
  include('../Class/Sql.php');
  include('../functions.php');

  //SELECIONANDO TODOS OS PRODUTOS DO BANCO
  $query = mysqli_query($conn, "select * from produto");
  
?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Produtos
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/products">Produtos</a></li>
  </ol>
</section>

<!-- Main content -->

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="product-create.php" class="btn btn-success">Cadastrar Produto</a>
            </div>

            <div class="box-body no-padding table-responsive">
              <table style="font-size: 18px;" class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Margem Lucro</th>
                    <th>Valor Venda</th>
                    <th>Quantidade Estoque</th>
                    <th>Fornecedor</th>
                    <th>Imagem</th>
                    <th>Max. Parcelas</th>
                    <th>Valor Parcelas</th>
                    <th>Data Cadastro</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th style="width: 140px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = mysqli_fetch_array($query)){?>
                  <tr>
                    <td><?php echo $row['CodProduto']?></td>
                    <td><?php echo $row['NomeProduto']?></td>
                    <td>R$ &nbsp;<?php echo $row['ValorProduto']?></td>
                    <td><?php echo $row['MargemLucro'] . "%";?></td>
                    <td>R$ &nbsp;<?php echo $row['ValorVendaProduto']?></td>
                    <td><?php echo $row['QntProduto']?></td>
                    <td><?php echo $row['CodFornecedor']?></td>
                    <td><?php echo $row['ImagemProduto']?></td>
                    <td><?php echo $row['QntParcelas']?></td>
                    <td>R$ &nbsp;<?php echo $row['ValorParcela']?></td>
                    <td><?php echo $row['DataCadastro']?></td>
                    <td><?php echo $row['Descricao']?></td>
                    <td><?php echo $row['Categoria']?></td>
                    <td>
                      <a href="product-update.php?codproduto=<?php echo $row['CodProduto']?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="../cadastros/deleteProduto.php?codproduto=<?php echo $row['CodProduto'] ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>


<!-- /.content -->
