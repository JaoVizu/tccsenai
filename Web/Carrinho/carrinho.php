<?php
include('Class/Sql.php');

    if(!isset($_SESSION['pedido'])){
        $_SESSION['pedido'] = array();
    }

    if(!isset($_GET['acao'])){
        $_GET['acao'] = null;
    }

  if(isset($_GET['acao'])){ 
        //ADICIONAR CARRINHO 
        if($_GET['acao'] == 'add'){ 
            $id = $_GET['id_prod']; 
            if(!isset($_SESSION['pedido'][$id])){ 
                $_SESSION['pedido'][$id] = 1; 
            } else { 
                $_SESSION['pedido'][$id] += 1; 
            } 
        }
    }
    

    if($_GET['acao'] == 'del'){
        $id = intval($_GET['id_prod']);
        if(isset($_SESSION['pedido'][$id])){
            unset($_SESSION['pedido'][$id]);
        }
    }
    
    //ALTERAR QUANTIDADE
    if($_GET['acao'] == 'up'){
        if(is_array($_POST['prod'])){
            foreach ($_POST['prod'] as $key => $qnt) {
                if(!empty($qnt) || $qnt <> 0 ){
                    $_SESSION['pedido'][$key] = $qnt;
                }else{
                    unset($_SESSION['pedido'][$key]);
                }
            }
        }
    }



?>
    <div class="jumbotron text-center">
        <h1 class="jumbo-text">Meu Carrinho</h1>
    </div>
    <div class="container mt-5">
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Subtotal</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <form action="?acao=up" method="post">
            <tbody>

                <?php
                $total = 0;
                if(count($_SESSION['pedido'])){

                    //variaveis para operaçoes
                    
                    foreach($_SESSION['pedido'] as $prod => $quantidade){
                        $listar = mysqli_query($conn, "SELECT * FROM produto WHERE CodProduto = '$prod'");
                        $arrayListar = mysqli_fetch_assoc($listar);

                        $sub = number_format($arrayListar['ValorVendaProduto'] * $quantidade,2, ",", ".");
                        $total += $arrayListar['ValorVendaProduto'] * $quantidade; 
                ?>

                <tr>
                    <td><img src="res/site/img/products/<?php echo $arrayListar['ImagemProduto']?>" alt="<?php echo $arrayListar['ImagemProduto']?>" width="100"></td>
                    <td><?php echo $arrayListar['NomeProduto']?></td>
                    <td>
                        <div class="quantity">
                                <input type="number" min="1" max="<?php echo $arrayListar['QntProduto']; ?>" step="1" value="<?php echo $quantidade?>" id="qtd" name="<?php echo "prod[$prod]"?>">
                        </div>
                        <button type="submit" class="btn btn-outline-primary ml-4" style="cursor:pointer;"><i class="fa fa-refresh" aria-hidden="true"></i> Atualizar Carrinho</button>
                    </td>
                    <td><?php echo "R$ ".$arrayListar['ValorVendaProduto']?></td>
                    <td class="subtotal"><?php echo "R$ ".$sub;?></td>
                    <td>
                        <a href="?acao=del&id_prod=<?php echo $arrayListar['CodProduto'];?>"><i class="fa fa-trash fa-3x"></i></a>
                    </td>
                </tr>
                <tr>

                  <?php
                        } 
                    }else{
                        echo '<td colspan="5">Não há produtos no carrinho</td>';
                    }
                ?>
                <tr>
                    <td colspan="5">Total<span id="total" class="float-right"><strong><?php echo "R$ ".number_format($total,2,",",".");?></strong></span></td>
                </tr>
            </tbody>
        </table>
            <div class="d-flex justify-content-end mb-5">
                <a id="finaliza" href=<?php if(isset($_SESSION['usuario'])){
                    echo "../Web/checarEnd.php";
                }else{
                    echo "../Web/checaLogin.php";
                }

                ?> class="btn btn-success">Finalizar Pedido</a>
            </div>
        </form>
    </div>
    <script src="admin/dist/js/jquery-3.2.1.min.js"></script>
    <script src="Carrinho/js/qtdCarrinho.js"></script>