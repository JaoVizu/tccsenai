
<?php 

    include('../Class/Sql.php');
    include('../functions.php');

	$product = isset($_POST['palavra']) ? $_POST['palavra'] : ' ';

	$queryUS = mysqli_query($conn, " SELECT * FROM Produto WHERE nomeproduto LIKE '%$product%'");

    

	if(mysqli_num_rows($queryUS) <= 0){
		echo "Nenhum produto encontrado";
	}else{
        
		while($row = mysqli_fetch_assoc($queryUS)){
			?>
                
                <div class="card mt-2 ml-2" style="width: 20rem;">
                        <img class="card-img-top" src="../Web/res/site/img/products/<?php echo $row['ImagemProduto'];?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $row['NomeProduto'];?></h4>
                            <p><strong>R$ &nbsp;<?php echo formatPrice($row["ValorVendaProduto"]);?></strong></p>
                            <a href="detalhes.php?id_prod=<?php echo $row['CodProduto'];?>" class="btn btn-secondary">Detalhes</a>
                            <a href="../Web/carrinho.php?acao=add&id_prod=<?php echo $row['CodProduto'];?>" class="btn btn-primary">Comprar</a>
                        </div>
                    </div> 
                </div>

			<?php
        }

	}
?>
