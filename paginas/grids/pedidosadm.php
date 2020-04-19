<?php
	require('conexao/conecta.php');

    $sql = "SELECT c.Nome, p.idPedido, p.ValorTotal, s.Status from cliente c 
                INNER JOIN pedido p ON c.idCliente = p.idCliente
                INNER JOIN itens_has_pedido ip ON p.idPedido = ip.Pedido_idPedido 
                INNER JOIN itens i ON ip.Itens_idItens = i.idItens
                INNER JOIN status s ON p.idStatus = s.idStatus WHERE s.idStatus = '1'
                GROUP BY p.idPedido";
                
	$result = mysqli_query($conn, $sql) or die ('Falha ao buscar servicos');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo $id; 
    }
?>
<div class="container" style="padding-top: 150px ; padding-bottom: 100px">
    <h2>Pedidos abertos</h2>
	<table class="table table-hover" id="myTable">
		 <tr>
                <th>Cliente</th>
                <th>Nº de pedido</th>
                <th>Valor</th>
                <th>Status</th>
                <th></th>
                <th></th>
        </tr>
    <?php
    	while($linha = mysqli_fetch_array($result)){
            $pag = $_GET['pag'];
            $url = "?pag=pagpedido&id=" . $linha['idPedido']; 
    		echo "<tr>";
                echo "<td>" . $linha['Nome'] . "</td>";
                echo "<td>" . $linha['idPedido'] . "</td>";
                echo "<td>" . $linha['ValorTotal'] . "</td>";
                echo "<td>" . $linha['Status'] . "</td>";
                echo "<td><a href='$url' class='btn btn-success'><span class='glyphicon glyphicon-plus'><span></a></td>";
                //echo "<td><a href='$url2' class='btn btn-default'><span class='glyphicon glyphicon-edit'><span></a></td>";
                //echo "<td><a href='$url3' class='btn btn-warning'>Adicionar etapa</a></td>";
                echo "</tr>";
    	}
    ?>
	</table>
    <a href="?pag=pedidofechado" class="btn btn-primary">Ver pedidos fechados</a>
</div>