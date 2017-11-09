        <form style="font-size:25px;" role="form" method="post" id="formCliente">
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
                <input type="text" class="form-control" id="cepcliente" name="CepCliente" placeholder="Digite o CEP">
              </div>

              <div class="form-group col-md-1">
                <label for="">Nº Casa</label>
                <input type="text" class="form-control" id="numerohouse" name="numCasa" placeholder="Nº da Casa">
              </div>

              <div class="form-group col-md-2">
                <label for="">Complemento</label>
                <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento">
              </div>

              <div class="form-group col-md-6">
                <label for="despassword">Endereço</label>
                <input type="text" class="form-control" id="endCliente" name="EndCliente" placeholder="Digite o Endereço">
              </div>

            </div><!-- FIM LINHA -->

            <div class="row">
              <div class="form-group col-md-6">
                <label for="despassword">CPF</label>
                <input type="text" class="form-control" id="cpfcliente" name="CPFCliente" placeholder="Digite o CPF">
              </div>

              <div class="form-group col-md-6">
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
                <input type="email" class="form-control" id="desemail" name="email" placeholder="Digite o e-mail">
              </div>

            
              <div class="form-group col-md-4">
                <label for="despassword">Senha</label>
                <input type="password" class="form-control" id="despassword" name="Senha" placeholder="Digite a senha">
              </div>
          </div><!-- fim linha -->

            <div class="checkbox">
              <label>
                <input type="checkbox" name="inadmin" value="1"> Acesso de Administrador
              </label>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button id="enviar" type="submit" class="btn btn-success">Cadastrar</button>
          </div>
        </form>