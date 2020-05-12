<?php
    require ('conexao/conecta.php');

    if(isset($_POST['submit'])){
      require('action/action_imagem.php');
    }
    else{
      $success = null;
      $mensagem = null;
    }
?>
<div class="row">
    <div class="col-lg-8 mx-auto">
      <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0 page-top">Adicionar Imagem</h2>

      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-birthday-cake"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <form name="formImagem" method="post" enctype="multipart/form-data">
        <div class="control-group">
          <div class="form-group floating-label-form-group controls mb-0 pb-2">
            <label>Imagem</label>
            <input class="form-control-file" id="img" name="img" type="file" placeholder="Imagem" required="required">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <br>
        <div id="danger"><?= $mensagem ?></div>
        <div id="success"><?= $success ?></div>
        <div class="form-group">
          <input type="submit" name="submit" class="btn btn-primary" value="Adicionar">
        </div>
        <br>
      </form>
    </div>
  </div>
</div>

