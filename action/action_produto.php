<?php
	require('conexao/conecta.php');

	$desc = $_POST['desc'];
	$valor = $_POST['valor'];
	$idTipoItem = $_POST['idTipoItem'];
	
 	$sql = "INSERT INTO itens(DescricaoItem, Valor, idTipoItem) VALUES ('$desc', '$valor', '$idTipoItem')";
    $inserir = mysqli_query($conn, $sql) or die('Falha ao inserir produto.');
    
    $url = "index.php?pag=prateleira";
	echo "<script type='text/javascript'>";
	echo "alert('Registro realizado.');";
	echo "window.location.replace('$url');";
	echo "</script>";
	
?>	