<?php
  $active['home'] = '';
  $active['prateleira'] = '';
  $active['pedidos'] = '';
  $active['cadastroprod'] = '';
  $active['entrar'] = '';

  if(isset($_GET['pag'])) {
    $active[$_GET['pag']] = 'active';
  } else {
    $active['home'] = 'active';
  }
?>
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="index.php#page-top"><img height="70px" src="./img/logoMenu.png"></a>
    <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger <?= $active["home"] ?>" href="?pag=home">Home</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger <?= $active["prateleira"] ?>" href="?pag=prateleira#portfolio">PRATELEIRA</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger <?= $active["pedidos"] ?>" href="?pag=pedidos">PEDIDOS</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger <?= $active["cadastroprod"] ?>" href="?pag=cadastroprod">CADASTROS</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger <?= $active["entrar"] ?>" href="logout.php">SAIR</a>
        </li>
      </ul>
    </div>
  </div>
</nav>