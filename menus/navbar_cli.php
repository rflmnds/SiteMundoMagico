<?php
  $active['realizapedidos'] = '';

  if(isset($_GET['pag'])) {
    $active[$_GET['pag']] = 'active';
  }
  else {
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
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php#portfolio">PRATELEIRA</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php#contact">Contato</a>
        </li>
        <li class="nav-item mx-0 mx-lg-1 dropdown">
          <a class="nav-link py-3 px-0 px-lg-3 rounded dropdown-toggle" href="#" id="perfilDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-alt"></i> <?= $_SESSION['usuario_nome'] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="perfilDropdown">
            <a class="dropdown-item" href="?pag=realizapedidos"><i class="fas fa-history"></i> Pedidos</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">SAIR <i class="fas fa-sign-out-alt"></i></a>
          </div>
        </li>
        <li class="nav-item mx-0 mx-lg-1">
          <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php#contact"><i class="fas fa-shopping-cart"></i> Carrinho</a>
        </li>
      </ul>
    </div>
  </div>
</nav>