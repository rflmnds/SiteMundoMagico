<?php
	require('conexao/conecta.php');

    echo $sql = "SELECT * from pedido p 
                INNER JOIN cliente c ON p.idCliente = c.idCliente
                INNER JOIN status s ON p.idStatus = s.idStatus
                WHERE c.idCliente = " . $_SESSION['usuario_idCliente'];
                
	$result = mysqli_query($conn, $sql) or die ('Falha ao buscar cliente');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo $id; 
    }
?>
<div class="container" style="padding-top: 150px; padding-bottom: 100px">
    <h2>Pedidos</h2>
	<table class="table table-hover" id="myTable">
		 <tr>
                <th>Nº de pedido</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Itens do pedido</th>
                <th></th>
        </tr>
    <?php
    	while($linha = mysqli_fetch_array($result)){
            $pag = $_GET['pag'];
            $url = "?pag=pagpedido&id=" . $linha['idPedido']; 
    		echo "<tr>";
            echo "  <td>" . $linha['idPedido'] . "</td>";
            echo "  <td>" . $linha['ValorTotal'] . "</td>";
            echo "  <td>" . $linha['Status'] . "</td>";
            echo "  <td><a href='$url' class='btn btn-success'>Ver Itens</a></td>";
            echo "</tr>";
    	}
    ?>
	</table>
    <a href="?pag=novoPedido" class="btn btn-primary">Novo pedido</a>
</div>