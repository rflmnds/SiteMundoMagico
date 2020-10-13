<?php
	require('conexao/conecta.php');

	$idItem = $_GET['id'];
	$qtd = $_POST['qtd'];

	$sql = "SELECT * FROM pedido WHERE idCliente = " . $_SESSION['usuario_idCliente'] . " AND idStatus = 1";
	$result = mysqli_query($conn, $sql) or die("Falha ao buscar pedido");
	$pedido = mysqli_fetch_array($result);

	$idPedido = $pedido['idPedido'];

	if($pedido['ValorTotal'] != null){
		$valorT = $pedido['ValorTotal'];
	}
	else{
		$valorT = 0;
	}

	$sql = "SELECT * FROM itens WHERE idItens = $idItem";
	$result = mysqli_query($conn, $sql) or die("Falha ao buscar item");
	$itemData = mysqli_fetch_array($result);

	$valorU = $itemData['Valor'];

	$valorT += $valorU * $qtd;

 	$sql = "INSERT INTO itens_has_pedido(idItens, idPedido, Valor, Qtd) VALUES ($idItem, $idPedido, $valorU, $qtd)";
    $inserir = mysqli_query($conn, $sql) or die('Falha ao adicionar item.');

    $sql = "UPDATE pedido SET ValorTotal = $valorT WHERE idPedido = $idPedido";
    $inserir = mysqli_query($conn, $sql) or die('Falha ao calcular valor total.');
    
    $url = "./index.php?pag=pagpedido&id=$id";

	echo "<script type='text/javascript'>";
	echo "	alert('Item adicionado.');";
	echo "	window.location.replace('$url');";
	echo "</script>";
	
?>	