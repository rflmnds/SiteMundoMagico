<?php
  require('conexao/conecta.php');

  if(isset($_POST['enviar'])){
    require('action/action_login.php');
  }
?>

<!-- Login -->
<section class="masthead page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Entrar</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-birthday-cake"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>
      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form name="login" id="login" novalidate="novalidate" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>E-mail</label>
                <input class="form-control" id="email" type="email" placeholder="E-mail" name="email" required="required" data-validation-required-message="Coloque seu e-mail.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Senha</label>
                <input class="form-control" id="password" type="password" placeholder="Senha" name="senha" required="required" data-validation-required-message="Coloque sua senha.">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <br>
            <div class="text-danger">
              <?php 
                if(isset($_SESSION['erro'])) {
                  echo $_SESSION['erro'];
                }
              ?>    
            </div>
            <div id="success"></div>
            <div class="form-group">
              <a id="registrar" href="?pag=register">Registrar-se</a>
              <input type="submit" class="btn btn-primary btn-xl login" id="enviar" name="enviar" value="Entrar">
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>