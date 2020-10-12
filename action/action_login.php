<?php
    include('conexao/conecta.php');

    session_start();

    $login = $_POST['email'];
    $senha = md5 ($_POST['senha']);

    $sql = "SELECT * FROM usuario WHERE Login = '$login' and Senha = '$senha'";
    $result = mysqli_query($conn,$sql) or die('Falha ao buscar dados do cliente');
    $usuario = mysqli_fetch_array($result);
    
    // Criando a sessão.
    if ($usuario) {
        $sql = "SELECT * FROM adm WHERE idUsuario = " . $usuario['idUsuario'];
        $result = mysqli_query($conn, $sql) or die ('Falha ao buscar administrador');
        $adm = mysqli_fetch_array($result);

        if($adm){
            $_SESSION['usuario_tipo'] = 'admin';
        }
        else{
            $_SESSION['usuario_tipo'] = 'cliente';
        }
    }
    else {
        $_SESSION['erro'] = "Login mal sucedido. E-mail ou senha incorretos.";
    }

    if (isset($_SESSION['usuario_tipo'])){
        if ($_SESSION['usuario_tipo'] == 'admin') {
            $_SESSION['usuario_id'] = $adm['idUsuario'];
            $_SESSION['usuario_nome'] = $adm['Nome'];
            header('Location: index.php');
        }
        else {
            $sql = "SELECT * FROM cliente WHERE idUsuario = " . $usuario['idUsuario'];
            $result = mysqli_query($conn, $sql) or die ('Falha ao buscar dados do cliente');
            $cliente = mysqli_fetch_array($result);

            $_SESSION['usuario_id'] = $cliente['idUsuario'];
            $_SESSION['usuario_idCliente'] = $cliente['idCliente'];
            $_SESSION['usuario_nome'] = $cliente['NomeCliente'];
            $_SESSION['carrinho'] = array();

            $sql = "SELECT * FROM pedido WHERE idCliente = " . $cliente['idCliente'];
            $result = mysqli_query($conn, $sql) or die ('Falha ao verificar carrinho');
            $cart = mysqli_fetch_array($result);

            if(isset($cart)){
                if($cart['idStatus'] != 1){
                    $sql = "INSERT INTO pedido(idStatus, idCliente, ValorTotal) VALUES (1, " . $cliente['idCliente'] . ", 0)";
                    $inserir = mysqli_query($conn, $sql) or die('Falha ao criar novo carrinho');
                }
            }
            else{
                $sql = "INSERT INTO pedido(idStatus, idCliente, ValorTotal) VALUES (1, " . $cliente['idCliente'] . ", 0)";
                $inserir = mysqli_query($conn, $sql) or die('Falha ao criar novo carrinho');
            }

            header('Location: index.php');
        }
    }
   
    