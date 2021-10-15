<?php
require_once("templates/login/header.php");
require_once("globals.php");
require_once("db.php");
?>

<div class="login-box">
  <div class="login-logo">
    <p><b>Nano</b></p>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <?php require_once("session_messages.php") ?>
      <form action="<?php $BASE_URL ?>login_controller.php" method="post">
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
        <div class="row">
          <!-- /.col -->
          <div class="input-group mb-3">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-0">
        <a href="<?php $BASE_URL ?>cadastro.php" class="text-center">Faça seu cadastro</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>

<?php
require_once("templates/login/footer.php");
?>