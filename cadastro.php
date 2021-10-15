<?php
require_once("templates/login/header.php");
require_once("globals.php");
require_once("db.php");
?>

<div class="login-box">
  <div class="login-logo">
    <p><b>Nano</b></p>
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Faça o seu cadastro</p>
      <?php require_once("session_messages.php") ?>
      <form action="<?php $BASE_URL ?>cadastro_process.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nome Completo" name="nome_completo" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Login" name="login" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Repita e senha" name="password1" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="input-group mb-3">
            <button type="submit" class="btn btn-primary btn-block">Registrar</button>
        </div>
        <!-- /.col -->
      </form>

      <a href="<?php $BASE_URL ?>login.php" class="text-center">Eu já tenho cadastro</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

<?php
require_once("templates/login/footer.php");
?>