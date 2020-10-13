<?php
	require('conexao/conecta.php');

    $total = 0;

    $sql = "SELECT c.NomeCliente, p.idPedido, s.idStatus from cliente c 
                INNER JOIN pedido p ON c.idCliente = p.idCliente
                INNER JOIN status s ON p.idStatus = s.idStatus
                WHERE p.idStatus = 1 AND p.idCliente = " . $_SESSION['usuario_idCliente'];
    $result = mysqli_query($conn, $sql) or die ('Falha ao buscar dados do pedido');
    $pedido = mysqli_fetch_array($result);

    $nomeCliente = $pedido['NomeCliente'];
    $nPedido = $pedido['idPedido'];
    $status = $pedido['idStatus'];

    $sql = "SELECT c.NomeCliente, p.idPedido, i.DescricaoItem, i.Valor, ip.Qtd from cliente c 
                INNER JOIN pedido p ON c.idCliente = p.idCliente
                INNER JOIN itens_has_pedido ip ON p.idPedido = ip.idPedido 
                INNER JOIN itens i ON ip.idItens = i.idItens
                INNER JOIN status s ON p.idStatus = s.idStatus
                WHERE p.idStatus = 1 AND p.idCliente = " . $_SESSION['usuario_idCliente'];              
	$result = mysqli_query($conn, $sql) or die ('Falha ao buscar dados dos itens');
?>

<div class="container" style="padding-top: 150px; padding-bottom: 100px">
    <?= "<h2>Carrinho (Pedido Nº $nPedido)</h2>"; ?>
	<table class="table table-hover" id="myTable">
		 <tr>
                <th>Itens</th>
                <th>Quantidade</th>
                <th class="valor-item">Valor</th>
        </tr>
    <?php
    	while($linha = mysqli_fetch_array($result)){
            $pag = $_GET['pag'];
            $url = "?pag=pagcad&id=" . $linha['idPedido']; 
    		echo "<tr>";
            echo "  <td>" . $linha['DescricaoItem'] . "</td>";
            echo "  <td>" . $linha['Qtd'] . "</td>";
            echo "  <td class='valor-item'>R$" . number_format($linha['Valor'], 2, ",", ".") . "</td>";

            $total += $linha['Valor'] * $linha['Qtd'];

            echo "</tr>";
    	}
    ?>
        <tr>
            <th>Valor Total:</th>
            <td colspan="5" class="valor-item">
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
        <div class="row">
            <?php
                $sql = "SELECT * FROM itens i
                            INNER JOIN itens_has_pedido ip ON ip.idItens = i.idItens
                            INNER JOIN pedido p ON p.idPedido = ip.idPedido 
                            WHERE p.idStatus = 1 AND p.idCliente = " . $_SESSION['usuario_idCliente'];  
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
                        echo "<p style='margin: 0; padding: 115px; font-weight: bold; text-align: center; background-color: #A9A9A9'>" . $item['DescricaoItem'] . "</p>";
                    }
                    echo "  </div>";
                    echo "</div>";
                }

                $urlCompra = "?pag=finalizapedido&id=" . $nPedido;
            ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col">
            <a href="index.php#prateleira" class="btn btn-primary">Continuar comprando</a>
        </div>
        <div class="col" style="text-align: right;">
            <a href='<?= $urlCompra ?>' class='btn btn-primary'>Finalizar pedido</a>
        </div>
    </div>
</div>