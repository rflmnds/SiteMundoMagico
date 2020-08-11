<?php
    require ('conexao/conecta.php');

    if(isset($_POST['submit'])){
      require('action/action_tipo.php');
    }
?>

<div class="row">
    <div class="col-lg-8 mx-auto">
      <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
      <h2 class="page-top text-center text-uppercase text-secondary mb-0">Cadastro do tipo do produto</h2>

      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-birthday-cake"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <form name="formTipo" method="post">
        <div class="control-group">
          <div class="form-group floating-label-form-group controls mb-0 pb-2">
          <label>Tipo do produto</label>
            <input class="form-control" id="tipo" name="tipo" type="text" placeholder="Tipo do produto" required="required" data-validation-required-message="Descreva o tipo do produto.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary btn-xl" value="Cadastrar tipo">
        </div>
        <br>
      </form>
    </div>
  </div>
</div>