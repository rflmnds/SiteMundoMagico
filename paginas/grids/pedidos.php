<?php
	require('conexao/conecta.php');

    $total = 0;

    $sql = "SELECT c.Nome, p.idPedido, i.Descricao, i.Valor, ip.Qtd from cliente c 
                INNER JOIN pedido p ON c.idCliente = p.idCliente
                INNER JOIN itens_has_pedido ip ON p.idPedido = ip.Pedido_idPedido 
                INNER JOIN itens i ON ip.Itens_idItens = i.idItens
                INNER JOIN status s ON p.idStatus = s.idStatus";
                
	$result = mysqli_query($conn, $sql) or die ('Falha ao buscar servicos');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo $id; 
    }
?>
<div class="container" style="padding-top: 120px; padding-bottom: 100px">
    <h2>Pedidos</h2>
	<table class="table table-hover" id="myTable">
		 <tr>
                <th>Cliente</th>
                <th>Itens</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th></th>
                <th></th>
        </tr>
    <?php
    	while($linha = mysqli_fetch_array($result)){
            $pag = $_GET['pag'];
            $url = "?pag=pagcad&id=" . $linha['idPedido']; 
    		echo "<tr>";
                echo "<td>" . $linha['Nome'] . "</td>";
                echo "<td>" . $linha['Descricao'] . "</td>";
                echo "<td>" . $linha['Qtd'] . "</td>";
                echo "<td>" . $linha['Valor'] . "</td>";

                $total += $linha['Valor'] * $linha['Qtd'];

                //echo "<td><a href='$url' class='btn btn-success'><span class='glyphicon glyphicon-plus'><span></a></td>";
                //echo "<td><a href='$url2' class='btn btn-default'><span class='glyphicon glyphicon-edit'><span></a></td>";
                //echo "<td><a href='$url3' class='btn btn-warning'>Adicionar etapa</a></td>";
                echo "</tr>";
    	}
    ?>
        <tr>
            <th>Valor Total:</th>
            <td colspan="5">
                <?php
                    echo 'R$' . number_format($total,2,",",".");
                ?>
            </td>
        </tr>
	</table>
    <a href="#" class="btn btn-primary">Finalizar Pedido</a>
</div>