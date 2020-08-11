<?php
    require ('conexao/conecta.php');

    if(isset($_POST['submit'])){
      require('action/action_produto.php');
    }

    $result = "SELECT * FROM tipo_itens";
    $result_tipo = mysqli_query($conn, $result) or die ('Falha ao buscar tipo do produto');
?>
<div class="row">
    <div class="col-lg-8 mx-auto">
      <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
      <h2 class="page-top text-center text-uppercase text-secondary mb-0">Cadastro de Produto</h2>

      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-birthday-cake"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <form name="formProd" method="post">
        <div class="control-group">
          <div class="form-group floating-label-form-group controls mb-0 pb-2">
            <label>Descrição</label>
            <input class="form-control" id="desc" name="desc" type="text" placeholder="Descrição" required="required" data-validation-required-message="Descreva o produto.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls mb-0 pb-2">
            <label>Valor</label>
            <input class="form-control" id="valor" name="valor" type="text" placeholder="Valor" required="required" data-validation-required-message="Valor de compra do produto.">
            <p class="help-block text-danger"></p>
          </div>
        </div>

        <div class="control-group">
          <div class="form-group floating-label-form-group controls mb-0 pb-2">  
          <label>Tipo do produto</label>
          <select name="select" class="form-control" required="required" data-validation-required-message="Por favor, escolha uma opção valida.">
            <?php
                while($tipo = mysqli_fetch_array($result_tipo)){
                echo "<option value='" . $tipo['idTipoItem'];
                echo "'>" . $tipo['DescricaoTipo'] . "</option>";
                }
            ?>
          </select>
          </div>
        </div>

        <br>
        <div id="success"></div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary btn-xl" value="Cadastrar">
        </div>
        <br>
      </form>
    </div>
  </div>
</div>

