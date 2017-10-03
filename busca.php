<?php

include('Class/Sql.php');

$palavra = $_POST['palavra'];

$sql = mysqli_query($conn, "SELECT * FROM Cliente WHERE NomeCliente
	LIKE '%$palavra%'");
$qtd = mysqli_num_rows($sql);

?>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
           
           <h2>Resultados da busca</h2>

            <div class="box-body no-padding table-responsive">
              <table style="font-size: 18px;" class="table table-striped">
                <thead>
                  <tr>
                    <th>Código</th>
                    <th>Nome</th>

                  </tr>
                </thead>
                <tbody>
                  <!-- INICIANDO LOOP -->
                  <?php while ($row = mysqli_fetch_assoc($sql)){?>
                  <tr>
                    <td><?php echo $row['CodCliente'] ?></td>
                    <td><?php echo $row['NomeCliente'] ?></td>
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