<?php
  include("conexao/conecta.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Mundo Mágico - Doceria</title>

  <!-- Include CSS -->
  <?php include("include/css.php");?>

</head>

<body id="page-top">

  <!-- Navigation -->
  <?php include("menus/navbar_login.php"); ?>

  <?php
    if(!isset($_GET["pag"])){
      include("paginas/content_login.php");
    } else {
      include("paginas/content_register.php");
    }
  ?>

  <!-- Footer -->
  <?php include("menus/footer.php"); ?>

  <!-- Include JS -->
  <?php include("include/js.php") ?>

</body>

</html>