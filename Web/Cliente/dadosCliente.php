<?php include('Class/Sql.php');
        $cod = $_SESSION['usuario']['CodCliente'];
?>
<div class="jumbotron text-center">
    <h1 class="jumbo-text">Meus Dados</h1>
</div>

<div class="container mt-5">

        <form id="updCli" style="font-size:25px;" role="form" method="post" action="Cliente/updateUser.php?id=<?php echo $cod?>">
          <div class="box-body">

            <!-- inicio do laço php -->
            <?php
                
                //consulta para pegar o id do cliente que vai ser feito o update
                $queryCliente = mysqli_query($conn, "SELECT * FROM Cliente a INNER JOIN login b USING(CodCliente) WHERE a.CodCliente = '$cod'");
                while($row = mysqli_fetch_assoc($queryCliente)){
            ?>
            
            <div class="row">
              <div class="form-group col-md-9">
                <label for="desperson">Nome</label>
                <input type="text" data-cod="<?php echo $cod;?>" class="form-control" id="desperson" name="NomeCliente" placeholder="Digite o nome" value="<?php echo $row['NomeCliente'];?>">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label for="deslogin">Login</label>
                <input type="text" class="form-control" id="deslogin" name="NomeLogin" placeholder="Digite o login"  value="<?php echo $row['NomeLogin'];?>">
              </div>

              <div class="form-group col-md-6">
                <label for="desemail">E-mail</label>
                <input type="email" class="form-control" id="desemail" name="email" placeholder="Digite o e-mail" value="<?php echo $row['email'];?>">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" id="deslogin" name="endereco" placeholder="Endereço"  value="<?php echo $row['EndCliente'];?>">
              </div>

              <div class="form-group col-md-2">
                <label for="">Nº Casa</label>
                <input type="text" class="form-control" id="numerohouse" name="numCasa" placeholder="Nº da Casa"  value="<?php echo $row['NCliente'];?>">
              </div>

              <div class="form-group col-md-4">
                <label for="">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento"  value="<?php echo $row['ComCliente'];?>">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label for="nrphone">Telefone</label>
                <input type="tel" class="form-control" id="nrphone" name="TelefoneCliente" placeholder="Digite o telefone"  value="<?php echo $row['TelefoneCliente'];?>">
              </div>

              <div class="form-group col-md-6">
                <label for="nrphone">Celular</label>
                <input type="tel" class="form-control" id="nrphone" name="CelularCliente" placeholder="Digite o telefone"  value="<?php echo $row['CelularCliente'];?>">
              </div>
            </div>           

          </div>
          <?php } ?>
          <!-- /.box-body -->
          <div class="box-footer">
            <button id="enviar" type="submit" class="btn btn-primary">Alterar Dados</button>
          </div>
        </form>

</div>
