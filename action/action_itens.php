<?php
	require('conexao/conecta.php');

	$item = $_POST['item'];
	$qtd = $_POST['qtd'];

	$sql = "SELECT * FROM pedido WHERE idPedido = $id";
	$result = mysqli_query($conn, $sql) or die("Falha ao buscar pedido");
	$pedido = mysqli_fetch_array($result);

	if($pedido['ValorTotal'] != null){
		$valorT = $pedido['ValorTotal'];
	}
	else{
		$valorT = 0;
	}

	$sql = "SELECT * FROM itens WHERE idItens = $item";
	$result = mysqli_query($conn, $sql) or die("Falha ao buscar item");
	$itemData = mysqli_fetch_array($result);

	$valorU = $itemData['Valor'];

	$valorT += $valorU * $qtd;

 	echo $sql = "INSERT INTO itens_has_pedido(idItens, idPedido, Valor, Qtd) VALUES ($item, $id, $valorU, $qtd)";
    $inserir = mysqli_query($conn, $sql) or die('Falha ao adicionar item.');

    $sql = "UPDATE pedido SET ValorTotal = $valorT WHERE idPedido = $id";
    $inserir = mysqli_query($conn, $sql) or die('Falha ao calcular valor total.');
    
    $url = "./index.php?pag=pagpedido&id=$id";

	echo "<script type='text/javascript'>";
	echo "	alert('Item adicionado.');";
	echo "	window.location.replace('$url');";
	echo "</script>";
	
?>	