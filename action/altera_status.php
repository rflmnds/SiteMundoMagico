<?php
    require('conexao/conecta.php');

    $vltotal = 0;

    $sql = "SELECT * from cliente c 
                INNER JOIN pedido p ON c.idCliente = p.idCliente
                INNER JOIN itens_has_pedido ip ON p.idPedido = ip.Pedido_idPedido 
                INNER JOIN itens i ON ip.Itens_idItens = i.idItens
                INNER JOIN status s ON p.idStatus = s.idStatus
                WHERE p.idPedido = " . $_GET['id'];
                
	$result2 = mysqli_query($conn, $sql) or die ('Falha ao buscar dados');

	while($linha2 = mysqli_fetch_array($result2)){
        $vltotal += $linha2['Valor'] * $linha2['Qtd'];
        $status = $linha2['Status'];
	}
    
    if($status == "Aberto"){
    	$sql = "UPDATE pedido SET ValorTotal = $vltotal, idStatus = 2 WHERE idPedido = " . $_GET['id'];
    	$result = mysqli_query($conn, $sql) or die ('Falha ao alterar status');
    }
    else{
    	$sql = "UPDATE pedido SET ValorTotal = NULL,idStatus = 1 WHERE idPedido = " . $_GET['id'];
    	$result = mysqli_query($conn, $sql) or die ('Falha ao alterar status');
    }
    header('Location: ?pag=pagpedido&id=' . $_GET['id']);
?>