<?php

	include('../Class/Sql.php');
	include('../functions.php');

	$tipo = $_GET['tipo'];

	if($tipo == '1'){
		$query = mysqli_query($conn, "SELECT * FROM Produto ORDER BY ValorVendaProduto DESC");?>
		<div class="row">
			<?php foreach ($query as $read_produto) { ?>
			
				<div class="card mt-2 ml-2" style="width: 20rem;">
	                    <img class="card-img-top" src="../Web/res/site/img/products/<?php echo $read_produto['ImagemProduto']?>" alt="Card image cap">
	                    <div class="card-body">
	                        <h4 class="card-title"><?php echo $read_produto['NomeProduto'];?></h4>
	                        <p><strong>R$ &nbsp;<?php echo formatPrice($read_produto["ValorVendaProduto"])?></strong></p>
	                        <a href="detalhes.php?id_prod=<?php echo $read_produto['CodProduto'];?>" class="btn btn-secondary">Detalhes</a>
	                        <a href="#" class="btn btn-primary">Comprar</a>
	                    </div>
	            </div>
	        
	       <?php }
	   		}?>
		</div>
	
		<?php
		if($tipo == '2'){
		$query = mysqli_query($conn, "SELECT * FROM Produto ORDER BY ValorVendaProduto ASC");?>
		<div class="row">
			<?php foreach ($query as $read_produto) { ?>
			
				<div class="card mt-2 ml-2" style="width: 20rem;">
	                    <img class="card-img-top" src="../Web/res/site/img/products/<?php echo $read_produto['ImagemProduto']?>" alt="Card image cap">
	                    <div class="card-body">
	                        <h4 class="card-title"><?php echo $read_produto['NomeProduto'];?></h4>
	                        <p><strong>R$ &nbsp;<?php echo formatPrice($read_produto["ValorVendaProduto"])?></strong></p>
	                        <a href="detalhes.php?id_prod=<?php echo $read_produto['CodProduto'];?>" class="btn btn-secondary">Detalhes</a>
	                        <a href="#" class="btn btn-primary">Comprar</a>
	                    </div>
	            </div>
	        
	       <?php }
	   		}?>
		</div>



		<?php
		if($tipo == '3'){
		$query = mysqli_query($conn, "SELECT * FROM Produto ORDER BY NomeProduto ASC");?>
		<div class="row">
			<?php foreach ($query as $read_produto) { ?>
			
				<div class="card mt-2 ml-2" style="width: 20rem;">
	                    <img class="card-img-top" src="../Web/res/site/img/products/<?php echo $read_produto['ImagemProduto']?>" alt="Card image cap">
	                    <div class="card-body">
	                        <h4 class="card-title"><?php echo $read_produto['NomeProduto'];?></h4>
	                        <p><strong>R$ &nbsp;<?php echo formatPrice($read_produto["ValorVendaProduto"])?></strong></p>
	                        <a href="detalhes.php?id_prod=<?php echo $read_produto['CodProduto'];?>" class="btn btn-secondary">Detalhes</a>
	                        <a href="#" class="btn btn-primary">Comprar</a>
	                    </div>
	            </div>
	        
	       <?php }
	   		}?>
		</div>

	<?php
		if($tipo == '0'){
		$query = mysqli_query($conn, "SELECT * FROM Produto");?>
		<div class="row">
			<?php foreach ($query as $read_produto) { ?>
			
				<div class="card mt-2 ml-2" style="width: 20rem;">
	                    <img class="card-img-top" src="../Web/res/site/img/products/<?php echo $read_produto['ImagemProduto']?>" alt="Card image cap">
	                    <div class="card-body">
	                        <h4 class="card-title"><?php echo $read_produto['NomeProduto'];?></h4>
	                        <p><strong>R$ &nbsp;<?php echo formatPrice($read_produto["ValorVendaProduto"])?></strong></p>
	                        <a href="detalhes.php?id_prod=<?php echo $read_produto['CodProduto'];?>" class="btn btn-secondary">Detalhes</a>
	                        <a href="#" class="btn btn-primary">Comprar</a>
	                    </div>
	            </div>
	        
	       <?php }
	   		}?>
		</div>

		<?php
		if($tipo == '0'){
		$query = mysqli_query($conn, "SELECT * FROM Produto");?>
		<div class="row">
			<?php foreach ($query as $read_produto) { ?>
			
				<div class="card mt-2 ml-2" style="width: 20rem;">
	                    <img class="card-img-top" src="../Web/res/site/img/products/<?php echo $read_produto['ImagemProduto']?>" alt="Card image cap">
	                    <div class="card-body">
	                        <h4 class="card-title"><?php echo $read_produto['NomeProduto'];?></h4>
	                        <p><strong>R$ &nbsp;<?php echo formatPrice($read_produto["ValorVendaProduto"])?></strong></p>
	                        <a href="detalhes.php?id_prod=<?php echo $read_produto['CodProduto'];?>" class="btn btn-secondary">Detalhes</a>
	                        <a href="#" class="btn btn-primary">Comprar</a>
	                    </div>
	            </div>
	        
	       <?php }
	   		}?>
		</div>

	