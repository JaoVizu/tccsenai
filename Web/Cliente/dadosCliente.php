<?php include('Class/Sql.php'); ?>
<div class="jumbotron text-center">
    <h1 class="jumbo-text">Meus Dados</h1>
</div>

<div class="container mt-5">
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nº Pedido</th>
                    <th>Data</th>
                    <th>Valor</th>
                    <th>Status</th>
                    <th>Opções</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $codCli = $_SESSION['usuario']['CodCliente'];
            $queryCli = mysqli_query($conn, "SELECT * FROM Cliente WHERE CodCliente = '$codCli'");
            foreach($queryCli as $row):
            ?>
                <tr>
                    <td><?php echo $row['CodCliente']?></td>
                    <td><?php echo $row['DataVenda']?></td>
                    <td><?php echo $row['TotalEncomenda']?></td>
                    <td><?php echo $row['StatusPedido']?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>    
    
</div>