    <div class="container mb-5 mt-5">
        <h1 class="text-center mt-5 mb-5">Identificação</h1>
        <div class="row">

            <div class="col-md-6">
                <div id="logar">
                    <fieldset><legend>Já sou cadastrado</legend>
                       <form>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="email" class="col-form-label col-form-label-lg">Email*</label>
                                    <input type="email" class="form-control form-control-lg" id="email" placeholder="voce@exemplo.com" name="email">
                                </div>

                                <div class="col-md-12">
                                    <label for="senha" class="col-form-label col-form-label-lg">Senha*</label>
                                    <input type="password" class="form-control form-control-lg" id="senha" name="pass">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg pull-right" style="cursor:pointer;">Logar</button>
                        </form>
                        <small><em><strong>* Campos obrigatórios</strong></em></small>
                    </fieldset>
                </div>
            </div><!-- fim coluna 1 -->

            <div class="col-md-6">
                <div id="cadastrar">
                    <fieldset><legend>Quero me cadastrar</legend>
                        <form>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="email" class="col-form-label col-form-label-lg">Email</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="voce@exemplo.com">
                                </div>
                                <div class="col-md-6">
                                    <label for="cpf" class="col-form-label col-form-label-lg">CPF</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="000.000.000-00">
                                </div>
                                <div class="col-md-6">
                                    <label for="cep" class="col-form-label col-form-label-lg">CEP</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="00000-000">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg pull-right" style="cursor:pointer;">Cadastrar</button>
                        </form>
                        <small><em><strong>* Campos obrigatórios</strong></em></small>
                    </fieldset>
                </div>
            </div><!-- fim coluna 2 -->

        </div><!-- fim linha -->
    </div><!-- fim container-->