<!-- Masthead -->
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="img/logoBanner.png" heigth="2000px" alt="">

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Mundo Mágico</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-birthday-cake"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Doceria</p>

    </div>
  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Prateleira</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-birthday-cake"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Portfolio Grid Items -->
      <div class="row">

        <!-- Portfolio Itens -->
        <?php
          $sql = "SELECT * FROM itens";
          $result1 = mysqli_query($conn, $sql);

          while($item = mysqli_fetch_array($result1)){
            echo "<div class='col-md-6 col-lg-4'>";
            echo "  <div class='portfolio-item mx-auto' data-toggle='modal' data-target='#portfolioModal" . $item['idItens'] . "'>";
            echo "    <div class='portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100'>";
            echo "      <div class='portfolio-item-caption-content text-center text-white'>";
            echo "        <i class='fas fa-plus fa-3x'></i>";
            echo "      </div>";
            echo "    </div>";

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
        ?>
  </section>
  <!-- Portfolio Modals -->
  <?php
    $sql = "SELECT * FROM itens";
    $result1 = mysqli_query($conn, $sql);
    
    while($item = mysqli_fetch_array($result1)){
      echo "<div class='portfolio-modal modal fade' id='portfolioModal" . $item['idItens'] . "' tabindex='-1' role='dialog' aria-hidden='true'>";
      echo "  <div class='modal-dialog modal-xl' role='document'>";
      echo "    <div class='modal-content'>";
      echo "      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
      echo "        <span aria-hidden='true'>";
      echo "          <i class='fas fa-times'></i>";
      echo "        </span>";
      echo "      </button>";
      echo "      <div class='modal-body text-center'>";
      echo "        <div class='container'>";
      echo "          <div class='row justify-content-center'>";
      echo "            <div class='col'>";
  
      $sql = "SELECT * FROM foto WHERE idItens = " . $item['idItens'];
      $result2 = mysqli_query($conn, $sql);

      $imagem = mysqli_fetch_array($result2);
      if($imagem != null){
        echo "              <img class='img-fluid rounded mb-5' src='img/uploads/" . $imagem['Endereco'] . "' alt=''>";
      }
      else{
        echo "              <p style='margin: 0; padding: 115px; font-weight: bold; text-align: center; background-color: #A9A9A9' class='rounded'>Sem imagem</p>";
      }
      echo "            </div>";
      echo "            <div class='col'>";
      echo "              <h2 class='portfolio-modal-title text-secondary text-uppercase mb-0'>" . $item['DescricaoItem'] . "</h2>";
      echo "              <div class='divider-custom'>";
      echo "                <div class='divider-custom-line'></div>";
      echo "                <div class='divider-custom-icon'>";
      echo "                  <i class='fas fa-birthday-cake'></i>";
      echo "                </div>";
      echo "                <div class='divider-custom-line'></div>";
      echo "              </div>";
      echo "              <h2>R$" . number_format($item['Valor'], 2, ",", ".") . "</h2><br>";
      if(isset($_SESSION['usuario_tipo'])){
        if($_SESSION['usuario_tipo'] == 'admin'){
          echo "              <a href='?pag=imagemItem&id=" . $item['idItens'] . "' class='btn btn-primary'>";
          echo "                  <i class='fas fa-image fa-fw'></i>";
          echo "                  Adicionar imagem";
          echo "              </a>";
          echo "              <a href='?pag=cadastroprod&id=" . $item['idItens'] . "' class='btn btn-primary'>";
          echo "                  <i class='fas fa-edit'></i>";
          echo "                  Editar produto";
          echo "              </a>";
        }
        else{
          echo "              <a href='?pag=carrinho&id=" . $item['idItens'] . "' class='btn btn-primary'>";
          echo "                  <i class='fas fa-edit'></i>";
          echo "                  Adicionar ao carrinho";
          echo "              </a>";
        }
      }
      echo "            </div>";
      echo "          </div>";
      echo "        </div>";
      echo "      </div>";
      echo "    </div>";
      echo "  </div>";
      echo "</div>";
    }

    if(isset($_SESSION['usuario_tipo'])){
      if($_SESSION['usuario_tipo'] != 'admin') {
        include("paginas/contato.php");
      }
    }
    else{
      include("paginas/contato.php");
    }
?>