<?php
	require('./conexao/conecta.php');

	$idPedido = $_GET['id'];
	
 	$sql = "UPDATE pedido SET idStatus = 2 WHERE idPedido =  $idPedido";
	$update = mysqli_query($conn, $sql) or die ('Falha ao finalizar pedido');

	$sql = "INSERT INTO pedido(idStatus, idCliente, ValorTotal) VALUES (1, " . $_SESSION['usuario_idCliente'] . ", 0)";
    $inserir = mysqli_query($conn, $sql) or die('Falha ao criar novo carrinho');
?>	
<div>
	<h1 class="masthead-heading text-uppercase mb-0">Obrigado pelo pedido!</h1>
	<div class="divider-custom divider-light">
	<div class="divider-custom-line"></div>
	<div class="divider-custom-icon">
	  <i class="fas fa-birthday-cake"></i>
	</div>
	<div class="divider-custom-line"></div>
	</div>
	<p class="masthead-subheading font-weight-light mb-0">Volte sempre!</p>
</div>