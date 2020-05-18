<?php
    require('conexao/conecta.php');

    $sql = "SELECT * from cliente c 
                INNER JOIN pedido p ON c.idCliente = p.idCliente
                INNER JOIN itens_has_pedido ip ON p.idPedido = ip.idPedido 
                INNER JOIN itens i ON ip.idItens = i.idItens
                INNER JOIN status s ON p.idStatus = s.idStatus
                WHERE p.idPedido = " . $_GET['id'];
                
	$result2 = mysqli_query($conn, $sql) or die ('Falha ao buscar dados');
    
    if($status == 1){
        $sql = "UPDATE pedido SET idStatus = 2 WHERE idPedido = " . $_GET['id'];
        $result = mysqli_query($conn, $sql) or die ('Falha ao alterar status');
        header('Location: ?pag=realizapedidos');
    }
    else if($status == 2){
    	$sql = "UPDATE pedido SET idStatus = 3 WHERE idPedido = " . $_GET['id'];
    	$result = mysqli_query($conn, $sql) or die ('Falha ao alterar status');
        header('Location: ?pag=pagpedido&id=' . $_GET['id']);
    }
    else if($status == 3){
    	$sql = "UPDATE pedido SET idStatus = 2 WHERE idPedido = " . $_GET['id'];
    	$result = mysqli_query($conn, $sql) or die ('Falha ao alterar status');
        header('Location: ?pag=pagpedido&id=' . $_GET['id']);
    }
?>