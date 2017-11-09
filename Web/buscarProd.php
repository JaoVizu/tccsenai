<?php 

	include('Class/Sql.php');

	$product = isset($_POST['palavra']) ? $_POST['palavra'] : ' ';

	$queryUS = mysqli_query($conn, " SELECT * FROM Produto WHERE nomeproduto LIKE '%$product%'");



	if(mysqli_num_rows($queryUS) <= 0){
		echo "Nenhum produto encontrado";
	}else{
		while($row = mysqli_fetch_assoc($queryUS)){
			?>
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

			<?php
		}

	}
?>