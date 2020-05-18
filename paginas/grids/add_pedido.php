<?php
    require('conexao/conecta.php');

    $sql = "INSERT INTO pedido(idStatus, idCliente) VALUES (1, " . $_SESSION['usuario_idCliente'] . ")";
                
    $result2 = mysqli_query($conn, $sql) or die ('Falha ao adicionar pedido');

    header('Location: ?pag=realizapedidos');
?>