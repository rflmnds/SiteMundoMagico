<?php
    require('./conexao/conecta.php');

    if(isset($_POST['submit'])){
      require('action/action_registro.php');
    }
?>

<!-- Registrar -->
<section class="masthead page-section" id="contact">
    <div class="container">
      
      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0 page-top">Registrar-se</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-birthday-cake"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Formulário de Registro -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <form name="formUsuario" id="contactForm" novalidate="novalidate" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nome</label>
                <input class="form-control" id="nome" name="nome" type="text" placeholder="Nome" required="required" data-validation-required-message="Por favor digite seu nome.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Telefone</label>
                <input class="form-control" id="telefone" name="telefone" type="text" placeholder="Telefone" required="required" data-validation-required-message="Por favor digite seu número de telefone.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email</label>
                <input class="form-control" id="email" name="email" type="email" placeholder="Email" required="required" data-validation-required-message="Por favor digite seu endereço de e-mail.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Senha</label>
                <input class="form-control" id="senha" name="senha" type="password" placeholder="Senha" required="required" data-validation-required-message="Digite sua senha.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-primary btn-xl">Cadastrar-se</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>