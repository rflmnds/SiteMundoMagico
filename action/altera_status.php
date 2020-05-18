<?php
    require('conexao/conecta.php');

    $sql = "SELECT * from cliente c 
                INNER JOIN pedido p ON c.idCliente = p.idCliente
                INNER JOIN itens_has_pedido ip ON p.idPedido = ip.Pedido_idPedido 
                INNER JOIN itens i ON ip.Itens_idItens = i.idItens
                INNER JOIN status s ON p.idStatus = s.idStatus
                WHERE p.idPedido = " . $_GET['id'];
                
	$result2 = mysqli_query($conn, $sql) or die ('Falha ao buscar dados');
    
    if($status == "Aberto"){
    	$sql = "UPDATE pedido SET idStatus = 2 WHERE idPedido = " . $_GET['id'];
    	$result = mysqli_query($conn, $sql) or die ('Falha ao alterar status');
    }
    else{
    	$sql = "UPDATE pedido SET idStatus = 1 WHERE idPedido = " . $_GET['id'];
    	$result = mysqli_query($conn, $sql) or die ('Falha ao alterar status');
    }
    header('Location: ?pag=pagpedido&id=' . $_GET['id']);
?>