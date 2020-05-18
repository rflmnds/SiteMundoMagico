<?php
	require('./conexao/conecta.php');

	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$email = $_POST['email'];
 	$senha = $_POST['senha'];
	
 	$sql = "INSERT INTO usuario(Login, Senha) VALUES ('$email', md5('$senha'))";
	$inserir = mysqli_query($conn, $sql) or die ('Falha ao inserir usuário');

	$selecao = "SELECT idUsuario FROM usuario WHERE Login = '$email' AND Senha = md5('$senha')";
	$execute = mysqli_query($conn, $selecao) or die ('Falha');
	while($a = mysqli_fetch_array($execute)){
	     $id_usuario = $a['idUsuario'];
	}
	$sql = "INSERT INTO cliente(Nome, Telefone, Email, idUsuario) 
	VALUES ('$nome', '$telefone', '$email', '$id_usuario')";
    $inserir = mysqli_query($conn, $sql) or die('Falha ao inserir cliente.');
    
 	$url = "./login.php";
	echo "<script type='text/javascript'>";
	echo "alert('Registro realizado.');";
	echo "window.location.replace('$url');";
	echo "</script>";
	
?>	