<?php
	require('../conexao/conecta.php');

	$desc = $_POST['desc'];
	$valor = $_POST['valor'];
	
 	$sql = "INSERT INTO itens(Descricao, Valor) VALUES ('$desc', '$valor')";
    $inserir = mysqli_query($conn, $sql) or die('Falha ao inserir produto.');
    
    $url = "../index.php?pag=prateleira";
	echo "<script type='text/javascript'>";
	echo "alert('Registro realizado.');";
	echo "window.location.replace('$url');";
	echo "</script>";
	
?>	