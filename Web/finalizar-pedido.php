
<?php
    session_start();
    include('Class/Sql.php');
  
    if(!count($_SESSION['pedido']) > 0){

    }else{
        
        $cod = $_SESSION['usuario']['CodCliente'];
        $queryEnd = mysqli_query($conn, "SELECT EndCliente, NCliente FROM Cliente WHERE CodCliente = '$cod'");
        $endArra = mysqli_fetch_array($queryEnd);
        $end = $endArra['EndCliente'];
        $nmr = $endArra['NCliente'];

        $insert_venda = mysqli_query($conn, "INSERT INTO Venda
        (CodCliente, DataVenda, DescontoVenda, FormaPagamento, HoraPedido,TotalVenda,EndVenda,NVenda,StatusPedido)
        VALUES
        ('$cod', '".date("Y-m-d")."', '0', 'N/A', '".date('H:i:s')."','0','$end','$nmr', 'Aguardando')");

        if(mysqli_num_rows($insert_venda) < 0){
           echo "Erro ao cadastrar usuário". mysqli_error($conn);
        }

        $read_ultimo_pedido = mysqli_query($conn, "SELECT CodVenda FROM venda ORDER BY Codvenda DESC LIMIT 1");
        
        $read_ultimo_pedido_view = mysqli_fetch_assoc($read_ultimo_pedido);
        
        foreach($_SESSION['pedido'] as $id_produto => $qtd_produto):
            $total = 0;
            foreach($_SESSION['pedido'] as $prod => $quantidade){
                $listar = mysqli_query($conn, "SELECT * FROM produto WHERE CodProduto = '$id_produto'");
                $arrayListar = mysqli_fetch_assoc($listar);

                $sub = number_format($arrayListar['ValorVendaProduto'] * $qtd_produto,2, ",", ".");
                $total += $arrayListar['ValorVendaProduto'] * $qtd_produto; 
                
            }

            $insert_item_venda = mysqli_query($conn, "INSERT INTO itemvenda(CodProduto,CodVenda,QntItem,ValorItem)
            VALUES('$id_produto','".$read_ultimo_pedido_view['CodVenda']."','$qtd_produto','".$arrayListar['ValorVendaProduto']."')");

        endforeach;
        
        $update_venda = mysqli_query($conn, "UPDATE Venda SET TotalVenda = '$total' WHERE CodVenda = '".$read_ultimo_pedido_view['CodVenda']."'");
        //echo "<script>alert('Cadastrou certin')</script>";

        header("Location: pagar.php?id=".$read_ultimo_pedido_view['CodVenda']."");
    }
    

?>