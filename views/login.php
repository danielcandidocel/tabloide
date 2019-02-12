<?php clearstatcache();
?>
<div class="login">
    <div class="login-all">
        <div class="login-logo">
            <!-- <img src="<?php echo BASE_URL;?>assets/images/logo_inoveh_branco.png" id="lar"/> -->
        </div>
        <div class="login-form2">
            <form method="POST" action="<?php echo BASE_URL;?>usuarios/login">
                <label>Name:</label>
                <input type="text" name="name" />
                <label>Senha:</label>
                <input type="password" name="senha" />                                
                <!-- <input type="button" value="Entrar" class="btn-primary" id="button-login" onclick="logar()"/> -->
                <input type="submit" value="Entrar" class="btn-danger" id="button-login" />
            </form>
            <?php 
                if (isset($erroLogin) && !empty($erroLogin)) {
                    echo '<p style="color:red">'.$erroLogin.'</p>';
                }
             ?>
            <!-- <div class="login-cadastrar">               
                <a href="<?php echo BASE_URL;?>home/esqueci" style="float: right">Esqueci minha senha</a>
            </div> -->
        </div>
        
    </div>
</div>


<!--Modal Login Inválido-->
<div class="modal fade" role='dialog' id='loginInvalido' >
<div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Notificação</h4>
      </div>
      <div class="modal-body">
        <p>E-mail e/ou Senha Incorreto(s). Tente Novamente.</p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
    </div>

  </div>
</div>

<!--Modal Campos Obrigatórios-->
<div class="modal fade" role='dialog' id='CamposObrigatorios' >
<div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Notificação</h4>
      </div>
      <div class="modal-body">
        <p>Preencha Todos os Campos.</p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
    </div>

  </div>
</div>

<!--Modal Campos Obrigatórios-->
<div class="modal fade" role='dialog' id='contaCancelada' >
<div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Notificação</h4>
      </div>
      <div class="modal-body">
        <p>Conta Excluída. Favor Entrar em Contato com o Administrador.</p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
    </div>

  </div>
</div>
