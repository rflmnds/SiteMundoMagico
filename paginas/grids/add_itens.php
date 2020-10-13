<?php
    require ('conexao/conecta.php');

    $sql = "SELECT * FROM itens WHERE idItens = " . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    $item = mysqli_fetch_array($result);

    $produto = $item['DescricaoItem'];
    $valor = $item ['Valor'];

    if(isset($_POST['submit'])){
      require('action/action_itens.php');
    }
?>
<div class="container">
  <div class="col-lg-10 mx-auto">
    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
    <h2 class="page-top text-center text-uppercase text-secondary mb-0">Adicionar item</h2>

    <div class="divider-custom">
      <div class="divider-custom-line"></div>
      <div class="divider-custom-icon">
        <i class="fas fa-birthday-cake"></i>
      </div>
      <div class="divider-custom-line"></div>
    </div>

    <div class="row" style="padding-top: 50px">
      <?php      
        $sql = "SELECT * FROM itens WHERE idItens = " . $_GET['id'];  
        $result1 = mysqli_query($conn, $sql);
        $item = mysqli_fetch_array($result1);

        echo "<div class='col-md-6 col-lg-5 mx-auto>";
        echo "  <div class='portfolio-item mx-auto' style='cursor: auto'>";

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
      ?>
      <div class='col-md-6 col-lg-5 mx-auto text-right'>
        <h2 class="text-center text-uppercase text-secondary mb-0"><?= $produto ?></h2>

        <h4>R$<?= number_format($valor, 2, ",", ".") ?></h4>

        <form name="formItens" method="post">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
              <label>Quantidade</label>
              <input class="form-control" id="qtd" name="qtd" type="text" placeholder="Quantidade" required="required" data-validation-required-message="Informe a quantia.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Adicionar ao carrinho">
          </div>
          <br>
        </form>
      </div>
    </div>
  </div>
</div>

