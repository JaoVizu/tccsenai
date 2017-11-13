    <div class="container mb-5 mt-5">
        <h1 class="text-center mt-5 mb-5">Identificação</h1>
        <div class="row">

            <div class="col-md-6">
                <div id="logar">
                    <fieldset><legend>Já sou cadastrado</legend>
                       <form id="loginForm">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="email" class="col-form-label col-form-label-lg">Email*</label>
                                    <input type="email" class="form-control form-control-lg" id="emailLog" placeholder="voce@exemplo.com" name="login">
                                </div>

                                <div class="col-md-12">
                                    <label for="senha" class="col-form-label col-form-label-lg">Senha*</label>
                                    <input type="password" class="form-control form-control-lg" id="senha" name="password">
                                </div>
                            </div>
                            <button type="submit" id="logar-btn" class="btn btn-primary btn-lg pull-right" style="cursor:pointer;">Logar</button>
                        </form>
                        <small><em><strong>* Campos obrigatórios</strong></em></small>
                    </fieldset>
                </div>
            </div><!-- fim coluna 1 -->

            <div class="col-md-6">
                <div id="cadastrar">
                    <fieldset><legend>Quero me cadastrar</legend>
                        <form action="../Web/cadastroCliente.php" method="post" id="form">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="email" class="col-form-label col-form-label-lg">Email*</label>
                                    <input type="text" name="email" class="form-control form-control-lg" placeholder="voce@exemplo.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="cpf" class="col-form-label col-form-label-lg">CPF*</label>
                                    <input type="text" id="cpf" name="cpf" class="form-control form-control-lg" placeholder="000.000.000-00" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="cep" class="col-form-label col-form-label-lg">CEP*</label>
                                    <input type="text" id="cep" name="cep" class="form-control form-control-lg" placeholder="00000-000" required>
                                </div>
                            </div>
                            <button type="submit" id="cad" class="btn btn-primary btn-lg pull-right" style="cursor:pointer;">Cadastrar</button>
                        </form>
                        <small><em><strong>* Campos obrigatórios</strong></em></small>
                    </fieldset>
                </div>
            </div><!-- fim coluna 2 -->

        </div><!-- fim linha -->
    </div><!-- fim container-->

    <script src="../Web/admin/dist/js/jquery-3.2.1.min.js"></script>
    <script src="../Web/admin/dist/js/jquery.mask.js"></script>
    <script>
        //FUNCAO DE MASCARAS
            $(document).ready(function($){
                    $('#cep').mask('99999-999');
                    $('#cpf').mask('000.000.000-00');
                   
            });

                $('#cpf').blur(function(){
                    var cpf = $('#cpf').val();

                    $.ajax({
                      url: 'validacoes/validaCpf.php',
                      method: 'get',
                      data: "cpf="+cpf,

                        success: function(data){
                        
                            if(data == "1"){
                                alert('O CPF digitado é válido');
                                $('#cpf').css("border","1px solid green");
                                document.getElementById('cad').disabled = false;
                                
                            }else{
                              alert('Digite um CPF válido para liberar o botão!');
                              $('#cpf').css("border","1px solid red");
                              document.getElementById('cad').disabled = true;
                             
                            }
                      
                        } // fim function(data)

                    });//fim ajax

            }); // fim função
            
            
    </script>
    <script src="validacoes/login.js"></script>