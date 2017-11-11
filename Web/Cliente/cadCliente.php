  <?php
    //RECEBER OS VALORES DO POSTS PASSADOS
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : null; 
    $cep = isset($_POST['cep']) ? $_POST['cep'] : null;
    
  ?>

      <div class="jumbotron text-center">
        <h1 class="jumbo-text">NOVO CADASTRO</h1>
      </div>
      <div class="container">
        <form style="font-size:25px;" role="form" method="post" id="formCliente" >
          <div class="box-body">

            <div class="row">

              <div class="form-group col-md-5">
                <label for="desperson">Nome</label>
                <input type="text" class="form-control" id="desperson" name="NomeCliente" placeholder="Digite o nome">
              </div>


              <div class="form-group col-md-4">
                  <label for="despassword">Data Nascimento</label>
                  <input type="date" class="form-control" id="datanasc" name="DataNasc" placeholder="Digite a data de nascimento">
              </div>

              <div class="form-group col-md-3">
                  <label for="despassword">Sexo</label>
                  <select name="SexoCliente" class="form-control" placeholder="Informe o Sexo">
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>
                  </select>
              </div>

            </div><!-- fim linha -->

            <div class="row">
              
              <div class="form-group col-md-3">
                <label for="despassword">Cep</label>
                <input type="text" class="form-control" id="cepcliente" name="CepCliente" placeholder="Digite o CEP" value="<?php echo $cep;?>">
              </div>

              <div class="form-group col-md-3">
                <label for="">Nº Casa</label>
                <input type="text" class="form-control" id="numerohouse" name="numCasa" placeholder="Nº da Casa">
              </div>

              <div class="form-group col-md-2">
                <label for="">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
              </div>

              <div class="form-group col-md-4">
                <label for="despassword">Endereço</label>
                <input type="text" class="form-control" id="endCliente" name="EndCliente" placeholder="Digite o Endereço">
              </div>

            </div><!-- FIM LINHA -->

            <div class="row">
              

              <div class="form-group col-md-4">
                <label for="despassword">CPF</label>
                <input type="text" class="form-control" id="cpfcliente" name="CPFCliente" placeholder="Digite o CPF" value="<?php echo $cpf?>">
              </div>

              <div class="form-group col-md-4">
                <label for="despassword">RG</label>
                <input type="text" class="form-control" id="rgcliente" name="RGCliente" placeholder="Digite o RG">
              </div>
            </div><!-- fim linha -->

            <div class="row">

              <div class="form-group col-md-6">
                <label for="despassword">Telefone</label>
                <input type="text" class="form-control" id="telefonecliente" name="TelefoneCliente" placeholder="Digite o Telefone">
              </div>

              <div class="form-group col-md-6">
                <label for="despassword">Celular</label>
                <input type="text" class="form-control" id="celularcliente" name="CelularCliente" placeholder="Digite o celular">
              </div>

            </div><!-- FIM LINHA -->

            <div class="row">

              <div class="form-group col-md-4">
                <label for="despassword">Cidade</label>
                <input type="text" class="form-control" id="cidadecliente" name="CidadeCliente" placeholder="Digite a cidade">
              </div>

              <div class="form-group col-md-2">
                <label for="despassword">Estado</label>
                <input type="text" class="form-control" id="estadocliente" name="EstadoCliente" placeholder="Digite o estado">
              </div>

              <div class="form-group col-md-6">
                <label for="despassword">Bairro</label>
                <input type="text" class="form-control" id="bairrocliente" name="BairroCliente" placeholder="Digite o bairro">
              </div>
            
            </div><!-- fim linha -->

          <div class="row">  

            <div class="form-group col-md-4">
                <label for="deslogin">Login</label>
                <input type="text" class="form-control" id="deslogin" name="NomeLogin" placeholder="Digite o login">
              </div>

            
              <div class="form-group col-md-4">
                <label for="desemail">E-mail</label>
                <input type="email" class="form-control" id="desemail" name="email" placeholder="Digite o e-mail" value="<?php echo $email; ?>">
              </div>

            
              <div class="form-group col-md-4">
                <label for="despassword">Senha</label>
                <input type="password" class="form-control" id="despassword" name="Senha" placeholder="Digite a senha">
              </div>
          </div><!-- fim linha -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer d-flex justify-content-end mb-3">
            <button id="enviar" type="submit" class="btn btn-lg btn-success" style="cursor: pointer;">Cadastrar</button>
          </div>
        </form>
        </div> 
        <script src="admin/dist/js/jquery-3.2.1.min.js"></script>
        <script src="admin/dist/js/jquery.mask.js"></script>  
        <script src="Cliente/js/cep.js"></script>
        <script src="Cliente/js/cadastroCliente.js"></script>