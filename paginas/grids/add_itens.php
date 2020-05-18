<?php
    require ('conexao/conecta.php');

    $id = $_GET['id'];

    if(isset($_POST['submit'])){
      require('action/action_itens.php');
    }
?>
<div class="row">
    <div class="col-lg-8 mx-auto">
      <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
      <h2 class="page-top text-center text-uppercase text-secondary mb-0">Adicionar itens</h2>

      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-birthday-cake"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <form name="formItens" method="post">
        <div class="control-group">
          <div class="form-group floating-label-form-group controls mb-0 pb-2">
            <p>Item</p>
            <select class="form-control" id="item" name="item" required="required" data-validation-required-message="Selecione o item.">
            	<?php
            		$sql = "SELECT * FROM itens";
            		$result = mysqli_query($conn, $sql) or die ("Falha ao buscar itens");

            		while($item = mysqli_fetch_array($result)){
            			echo "<option value='" . $item['idItens'] . "'>" . $item['Descricao'] . "(R$" . number_format($item['Valor'], 2, ",", ".") .  ")</option>";
            		}
            	?>
            </select>
            <p class="help-block text-danger"></p>
          </div>
        </div>
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
          <input type="submit" name="submit" class="btn btn-primary btn-xl" value="Adicionar">
        </div>
        <br>
      </form>
    </div>
  </div>
</div>

