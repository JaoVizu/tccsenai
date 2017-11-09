<?php 

	include('Class/Sql.php');

	$users = isset($_POST['palavra']) ? $_POST['palavra'] : ' ';

	$queryUS = mysqli_query($conn, " SELECT * FROM Cliente a INNER JOIN login b USING(CodCliente) WHERE nomecliente LIKE '%$users%'");

	if(mysqli_num_rows($queryUS) <= 0){
		echo "Nenhum cliente encontrado";
	}else{
		while($row = mysqli_fetch_assoc($queryUS)){
			?>
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

			<?php
		}

	}
?>