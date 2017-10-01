<head>
<meta charset="utf-8">
</head>
<?php
  include('../Class/Sql.php');

  //pegando os usuarios do banco de dados
  $query = mysqli_query($conn, "SELECT * FROM Cliente a INNER JOIN login b USING(CodCliente) ORDER BY a.CodCliente");
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Usuários
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active"><a href="/admin/users">Usuários</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
            
            <div class="box-header">
              <a href="user-create.php" class="btn btn-success">Cadastrar Usuário</a>
            </div>

            <div class="box-body no-padding table-responsive">
              <table style="font-size: 18px;" class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">Codigo Cliente</th>
                    <th>Nome</th>
                    <th>Data Nascimento</th>
                    <th>Endereço</th>
                    <th>Cep</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Telefone Residencial</th>
                    <th>Celular</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Bairro</th>
                    <th>Sexo</th>
                    <th>E-mail</th>
                    <th>Login</th>
                    
                    <th style="width: 60px">Admin</th>
                    <th style="width: 140px">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- INICIANDO LOOP -->
                  <?php while ($row = mysqli_fetch_assoc($query)){?>
                  <tr>
                    <td><?php echo $row['CodCliente']?></td>
                    <td><?php echo $row['NomeCliente']?></td>
                    <td><?php echo $row['DataNasc']?></td>
                    <td><?php echo $row['EndCliente']?></td>
                    <td><?php echo $row['CepCliente']?></td>
                    <td><?php echo $row['CPFCliente']?></td>
                    <td><?php echo $row['RGCliente']?></td>
                    <td><?php echo $row['TelefoneCliente']?></td>
                    <td><?php echo $row['CelularCliente']?></td>
                    <td><?php echo $row['CidadeCliente']?></td>
                    <td><?php echo $row['EstadoCliente']?></td>
                    <td><?php echo $row['BairroCliente']?></td>
                    <td><?php echo $row['SexoCliente']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['NomeLogin']?></td>
                    <td>  <?php 
                            if($row['inadmin'] == 1){
                              echo "Sim";
                            }else{
                              echo "Não";
                            }
                          ?>
                      
                    </td>
                    <td>
                      <a href="user-update.php?codcliente=<?php echo $row['CodCliente']?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Editar</a>
                      <a href="../cadastros/deleteCliente.php?idCliente=<?php echo $row['CodLogin'] ?>" onclick="return confirm('Deseja realmente excluir este registro?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Excluir</a>
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

</section>
<!-- /.content -->
