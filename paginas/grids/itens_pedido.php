<?php
	require('conexao/conecta.php');

    $total = 0;

    $sql = "SELECT c.Nome, p.idPedido from cliente c 
                INNER JOIN pedido p ON c.idCliente = p.idCliente
                WHERE p.idPedido = " . $_GET['id'];

    $result = mysqli_query($conn, $sql) or die ('Falha ao buscar dados');
    $pedido = mysqli_fetch_array($result);
    $nomeCliente = $pedido['Nome'];
    $nPedido = $pedido['idPedido'];

    $sql = "SELECT c.Nome, p.idPedido, i.Descricao, i.Valor, ip.Qtd from cliente c 
                INNER JOIN pedido p ON c.idCliente = p.idCliente
                INNER JOIN itens_has_pedido ip ON p.idPedido = ip.Pedido_idPedido 
                INNER JOIN itens i ON ip.Itens_idItens = i.idItens
                INNER JOIN status s ON p.idStatus = s.idStatus
                WHERE p.idPedido = " . $_GET['id'];
                
	$result = mysqli_query($conn, $sql) or die ('Falha ao buscar dados');

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo $id; 
    }
?>
<div class="container" style="padding-top: 150px; padding-bottom: 100px">
    <?= "<h2>Pedido Nº $nPedido - Cliente: $nomeCliente</h2>"; ?>
	<table class="table table-hover" id="myTable">
		 <tr>
                <th>Itens</th>
                <th>Quantidade</th>
                <th>Valor</th>
        </tr>
    <?php
    	while($linha = mysqli_fetch_array($result)){
            $pag = $_GET['pag'];
            $url = "?pag=pagcad&id=" . $linha['idPedido']; 
    		echo "<tr>";
            echo "  <td>" . $linha['Descricao'] . "</td>";
            echo "  <td>" . $linha['Qtd'] . "</td>";
            echo "  <td>R$" . number_format($linha['Valor'], 2, ",", ".") . "</td>";

            $total += $linha['Valor'] * $linha['Qtd'];

            echo "</tr>";
    	}
    ?>
        <tr>
            <th>Valor Total:</th>
            <td colspan="5" style="text-align: right">
                <?php
                    echo 'R$' . number_format($total, 2, ",", ".");
                ?>
            </td>
        </tr>
	</table>

    <div class="portfolio">
        <h2 class="text-center text-uppercase text-secondary mb-0">Itens</h2>

        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-birthday-cake"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <?php
            $sql = "SELECT * FROM itens i
                        INNER JOIN itens_has_pedido ip ON ip.Itens_idItens = i.idItens
                        INNER JOIN pedido p ON p.idPedido = ip.Pedido_idPedido 
                        WHERE idPedido = " . $_GET['id'];
            $result1 = mysqli_query($conn, $sql);

            while($item = mysqli_fetch_array($result1)){
                echo "<div class='col-md-6 col-lg-4'>";
                echo "  <div class='portfolio-item mx-auto' style='cursor: auto'>";

            $sql = "SELECT * FROM foto WHERE idItens = " . $item['idItens'];
            $result2 = mysqli_query($conn, $sql);

            $img = mysqli_fetch_array($result2);
            if($img != null){
                echo "    <img class='img-fluid' src='img/uploads/" . $img['Endereco'] . "' alt=''>";
            }
            else{
                echo "<p style='margin: 0; padding: 115px; font-weight: bold; text-align: center; background-color: #A9A9A9'>" . $item['Descricao'] . "</p>";
            }
            echo "  </div>";
            echo "</div>";
          }
        ?>
    </div>

    <a href="#" class="btn btn-primary">Finalizar Pedido</a>
</div>