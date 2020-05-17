<?php
	require('conexao/conecta.php');

    $sql = "SELECT c.Nome, p.idPedido, i.Descricao, i.Valor, s.Status from cliente c 
                INNER JOIN pedido p ON c.idCliente = p.idCliente
                INNER JOIN itens_has_pedido ip ON p.idPedido = ip.Pedido_idPedido 
                INNER JOIN itens i ON ip.Itens_idItens = i.idItens
                INNER JOIN status s ON p.idStatus = s.idStatus
                WHERE c.idCliente = " . $_SESSION['usuario_id'];
                
	$result = mysqli_query($conn, $sql) or die ('Falha ao buscar cliente');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo $id; 
    }
?>
<div class="container" style="padding-top: 150px">
    <h2>Pedidos</h2>
	<table class="table table-hover" id="myTable">
		 <tr>
                <th>Nº de pedido</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Itens do pedido</th>
                <th></th>
                <th></th>
        </tr>
    <?php
    	while($linha = mysqli_fetch_array($result)){
            $pag = $_GET['pag'];
            //$url = "?pag=pagcad&id=" . $linha['idservico']; Link p botão
    		echo "<tr>";
                echo "<td>" . $linha['idPedido'] . "</td>";
                echo "<td>" . $linha['Valor'] . "</td>";
                echo "<td>" . $linha['Status'] . "</td>";
                //echo "<td><a href='$url' class='btn btn-success'><span class='glyphicon glyphicon-plus'><span></a></td>";
                echo "</tr>";
    	}
    ?>
	</table>
</div>