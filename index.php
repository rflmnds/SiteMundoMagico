<?php
  include("conexao/conecta.php");

  session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <!--<meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">-->

  <title>Mundo Mágico - Doceria</title>

  <?php include("include/css.php");?>

</head>

<body id="page-top">

  <!-- Navigation -->
  <?php 
    if(isset($_SESSION['usuario_tipo'])){
      if($_SESSION['usuario_tipo'] == 'admin'){
        include("menus/navbar_adm.php");
      }
      else{
       include("menus/navbar_cli.php"); 
      }
    }
    else{
      include("menus/navbar.php"); 
    }
  ?>

  <!-- Conteudo Principal -->
  <?php 
    if(isset($_GET['pag'])){
      $link = $_GET['pag'];
      if($link == 'cadastroprod'){
        include("paginas/cadastros/cad_prod.php");
      }
      else if($link == 'realizapedidos'){
        include("paginas/grids/pedidoscli.php");
      }
       else if($link == 'pedidos'){
        include("paginas/grids/pedidosadm.php");
      }
      else if($link == 'pagpedido'){
        include("paginas/grids/itens_pedido.php");
      }
      else if($link == 'pedidofechado'){
        include("paginas/grids/pedidosfechados.php");
      }
      else if($link == 'imagemItem'){
        include("paginas/add_imagem.php");
      }
      else if($link == 'novoPedido'){
        include('paginas/grids/add_pedido.php');
      }
      else if($link == 'itemPedido'){
        include('paginas/grids/add_itens.php');
      }
      else if($link == 'CadastroTipo'){
        include('paginas/cadastros/cad_tipo.php');
      }
      else{
        include("paginas/content_index.php");
        
      }
    }
    else{
      include("paginas/content_index.php"); 
    }
  ?>

  <!-- Footer -->
  <?php include("menus/footer.php"); ?>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <?php include("include/js.php") ?>

</body>

</html>
