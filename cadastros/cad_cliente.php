<?php
    include('../conexao/conecta.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro - Cliente</title>
	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
</head>
<body><br>
<form method="post" action="../action/action_registro.php">
		<div class="form-group">

			<label for="login">Login</label>
			<input type="text" class="form-control" name="Login" placeholder="Login" required>
		</div>

		<div class="form-group">
			<label for="senha">Senha</label>
			<input type="password" class="form-control" name="Senha" placeholder="Senha" required>
		</div>
		
		<div class="form-group">
			<label for="nome_cliente">Nome</label>
			<input class="form-control" name="Nome" placeholder="Nome" required>
		</div>		

		<div class="form-group">
			<label for="telefone_cliente">Telefone</label>
			<input class="form-control" name="Telefone" placeholder="Telefone" required>
		</div>

		<div class="form-group">
			<label for="email_cliente">Email</label>
			<input type="email" class="form-control" name="Email" placeholder="Email" required>
		</div>			

		<input type="submit" class="btn btn-success" value="Salvar">
	</form>
</body>
</html>