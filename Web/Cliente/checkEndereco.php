<?php

    include('Class/Sql.php');
    $codCli = $_SESSION['usuario']['CodCliente'];
    $queryCli = mysqli_query($conn, "SELECT * FROM Cliente WHERE CodCliente = '$codCli'");

?>

<div class="jumbotron text-center">
    <h1 class="jumbo-text">Confirme o Endereço</h1>
</div>

<div class="container">
    <form>
        <?php
            foreach($queryCli as $row){
        ?>
        <div class="row">
            <div class="form-group col-md-8">
                <label class="col-form-label col-form-label-lg">Endereço</label>
                <input type="" name="endereco" value="<?php echo $row['EndCliente']?>" class="form-control">
            </div>

            <div class="form-group col-md-4">
                <label for="" class="col-form-label col-form-label-lg">N° Casa</label>
                <input type="" name="ncasa" value="<?php echo $row['NCliente']?>" class="form-control">
            </div>            
        </div> <!-- fim linha -->

        <div class="row">
            <div class="form-group col-md-4">
                <label for="" class="col-form-label col-form-label-lg">Bairro</label>
                <input type="" name="bairro" value="<?php echo $row['BairroCliente'] ?>" class="form-control">
            </div>

            <div class="form-group col-md-4">
                <label for="" class="col-form-label col-form-label-lg">Complemento</label>
                <input type="" name="comple" value="<?php echo $row['ComCliente']?>" class="form-control">
            </div>

            <div class="form-group col-md-4">
                <label for="" class="col-form-label col-form-label-lg">Estado</label>
                <input type="" name="uf" value="<?php echo $row['EstadoCliente']?>" class="form-control">
            </div>
        </div><!-- fim linha -->
        
        <div class="d-flex justify-content-end mb-4">
            <input type="submit" name="" value="Continuar" class="btn btn-success btn-lg">
        </div>
            <?php } ?>
    </form>
    <div class="d-flex justify-content-end mb-4">
        <a href="../Web/finalizar-pedido.php" class="btn btn-lg btn-success">Continuar</a>
    </div>
</div>