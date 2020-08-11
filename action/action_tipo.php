<?php
	require('conexao/conecta.php');

	$TipoProduto = $_POST['tipo'];
	$sql = "INSERT INTO tipo_itens(DescricaoTipo) VALUES ('$TipoProduto')";
	$inserir = mysqli_query($conn, $sql) or die('Falha ao inserir tipo.');
	 

	$url = "index.php?pag=cadastroprod";
	echo "<script type='text/javascript'>";
	echo "alert('Registro realizado.');";
	echo "window.location.replace('$url');";
	echo "</script>";
    
    

?>