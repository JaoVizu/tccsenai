	<div class="jumbotron text-center">
		<h1 class="jumbo-text">RECUPERAR SENHA</h1>
	</div>

	<div class="container">
		<div id="form-cpf" class="mb-5">
			<form action="" id="formCpf">
				<label for="" class="col-form-label col-form-label-lg">Digite seu CPF:</label>
				<input type="text" name="cpf" id="cpf" class="form-control">

				<input type="submit" class="btn btn-lg btn-primary mt-4" id="enviaCpf">
			</form>
		</div>

		<div id="nova-senha" class="mb-5">
			<form action="" id="formSenha">
				<label for="" class="col-form-label col-form-label-lg">Digite sua nova senha:</label>
				<input type="text" name="pass" id="pass" class="form-control">

				<label for="" class="col-form-label col-form-label-lg">Confirme sua senha:</label>
				<input type="text" name="pass2" id="pass2" class="form-control">

				<button class="btn btn-lg btn-primary mt-4" id="enviaSenha">Finalizar</button>
			</form>
		</div>
	</div>

	<script src="admin/dist/js/jquery-3.2.1.min.js"></script>
    <script src="admin/dist/js/jquery.mask.js"></script> 
    <script>
    	$("#cpf").mask("000.000.000-00");
    </script>

    <script src="Cliente/js/cadastroCliente.js"></script>