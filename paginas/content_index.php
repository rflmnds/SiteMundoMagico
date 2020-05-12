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

        <!-- Portfolio Item 1 -->
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

            if(mysqli_fetch_array($result2)!= null){
              echo "    <img class='img-fluid' src='" . $img['Endereco'] . "' alt=''>";
            }
            else{
              echo "<p style='margin: 0; padding: 115px; font-weight: bold; text-align: center; background-color: #A9A9A9'>" . $item['Descricao'] . "</p>";
            }
            echo "  </div>";
            echo "</div>";
          }
        ?>
  </section>
  <!-- Portfolio Modal 1 -->
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
      echo "            <div class='col-lg-8'>";
      echo "              <h2 class='portfolio-modal-title text-secondary text-uppercase mb-0'>" . $item['Descricao'] . "</h2>";
      echo "              <div class='divider-custom'>";
      echo "                <div class='divider-custom-line'></div>";
      echo "                <div class='divider-custom-icon'>";
      echo "                  <i class='fas fa-birthday-cake'></i>";
      echo "                </div>";
      echo "                <div class='divider-custom-line'></div>";
      echo "              </div>";

      $sql = "SELECT * FROM foto WHERE idItens = " . $item['idItens'];
      $result2 = mysqli_query($conn, $sql);

      if($img = mysqli_fetch_array($result2)!= null){
        echo "              <img class='img-fluid rounded mb-5' src='" . $img['Endereco'] . "' alt=''>";
      }
      echo "              <p class='mb-5'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>";
      echo "              <a href='?page=imagemItem&id=" . $item['idItens'] . "' class='btn btn-primary'>";
      echo "                  <i class='fas fa-image fa-fw'></i>";
      echo "                  Adicionar imagem";
      echo "              </a>";
      echo "              <button class='btn btn-primary' href='#' data-dismiss='modal'>";
      echo "                <i class='fas fa-times fa-fw'></i>";
      echo "                Fechar";
      echo "              </button>";
      echo "            </div>";
      echo "          </div>";
      echo "        </div>";
      echo "      </div>";
      echo "    </div>";
      echo "  </div>";
      echo "</div>";
    }
  ?>