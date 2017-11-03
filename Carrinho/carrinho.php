<?php
include('Class/Sql.php');

    if(isset($_GET['del'])){
        $del = $_GET['del'];
        unset($_SESSION['pedido'][$del]);
    }
?>
    <div class="container">
        <table border="2">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if(isset($_SESSION['pedido'])){
                    foreach($_SESSION['pedido'] as $prod => $quantidade){
                        $listar = mysqli_query($conn, "SELECT * FROM produto WHERE CodProduto = '$prod'");
                        $arrayListar = mysqli_fetch_assoc($listar);
                ?>

                <tr>
                    <td><img src="res/site/img/products/<?php echo $arrayListar['ImagemProduto']?>" alt="<?php echo $arrayListar['ImagemProduto']?>" width="100"></td>
                    <td><?php echo $arrayListar['NomeProduto']?></td>
                    <td>
                        <div class="quantity">
                                <input type="number" min="1" max="<?php echo $read['QntProduto']; ?>" step="1" value="1" id="qtd" data-id="<?php echo $arrayListar['CodProduto']; ?>" data-preco="<?php echo $arrayListar['ValorVendaProduto']; ?>">
                        </div>
                    </td>
                    <td id="subtotal"><?php echo $arrayListar['ValorVendaProduto']?></td>
                    <td>
                        <a href="?del=<?php echo $arrayListar['CodProduto'];?>"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>

                  <?php
                        } 
                    }else{
                        echo '<td colspan="5">Não há produtos no carrinho</td>';
                    }
                ?>
                <tr>
                    <td colspan="4">Total</td>
                </tr>
            </tbody>
        </table>
    </div>
       