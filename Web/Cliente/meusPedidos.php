<?php include('Class/Sql.php');
        include('functions.php');
?>
<div class="jumbotron text-center">
    <h1 class="jumbo-text">Meus Pedidos</h1>
</div>

<div class="container mt-5">
        
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>Nº Pedido</th>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $codCli = $_SESSION['usuario']['CodCliente'];
            $queryVenda = mysqli_query($conn, "SELECT * FROM Venda WHERE CodCliente = '$codCli'");
            foreach($queryVenda as $row):
            ?>
                <tr>
                    <td><?php echo $row['CodVenda']?></td>
                    <td><?php echo $row['DataVenda']?></td>
                    <td><?php echo 'R$ '.formatPrice($row['TotalVenda'])?></td>
                    <td><?php echo $row['StatusPedido']?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>    
    
</div>
       