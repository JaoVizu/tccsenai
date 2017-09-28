

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
              <table class="table table-striped">
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
                  {loop="$products"}
                  <tr>
                    <td>{$value.CodProduto}</td>
                    <td>{$value.NomeProduto}</td>
                    <td>R$ &nbsp;{$value.ValorProduto}</td>
                    <td>{$value.MargemLucro}</td>
                    <td>R$ &nbsp;{$value.ValorVendaProduto}</td>
                    <td>{$value.QntProduto}</td>
                    <td>{$value.CodFornecedor}</td>
                    <td>{$value.ImagemProduto}</td>
                    <td>{$value.QntParcelas}</td>
                    <td>R$ &nbsp;{$value.ValorParcela}</td>
                    <td>{$value.DataCadastro}</td>
                    <td>{$value.Descricao}</td>
                    <td>{$value.Categoria}</td>
                    <td>
                      <a href="product-update.php" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="/admin/products/{$value.CodProduto}/delete" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
                    </td>
                  </tr>
                  {/loop}
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
  	</div>
  </div>


<!-- /.content -->
