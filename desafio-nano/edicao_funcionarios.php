<?php
require_once("templates/painel/header.php");
require_once("globals.php");
require_once("db.php");

$id_admin = $_SESSION['id_admin'];
$funcionario_id = explode('/', $_GET['id']);

$stmt = $conn->prepare("SELECT * FROM funcionarios WHERE id = :id");
$stmt->bindParam(":id", $funcionario_id[0]);
$stmt->execute();
$funcionario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<section class="content">
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Editar: <?php echo $funcionario['nome_completo'] ?></b></h3>
        </div>
        <div class="card-body">
            <?php require_once("session_messages.php") ?>
            <form action="<?php $BASE_URL ?>funcionarios_controller.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome completo:</label>
                            <input class="form-control" type="text" name="nome_completo" value="<?php echo $funcionario['nome_completo'] ?>" placeholder="Nome completo" maxlength="200" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Login:</label>
                            <input class="form-control" type="text" name="login" value="<?php echo $funcionario['login'] ?>" placeholder="Login" maxlength="200" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Senha:</label>
                            <input class="form-control" type="password" name="password" value="<?php echo $funcionario['senha'] ?>" placeholder="Senha" maxlength="200" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Saldo:</label>
                            <input class="form-control" type="text" name="saldo" value="<?php echo $funcionario['saldo_atual'] ?>" placeholder="Saldo" required>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_admin" value="<?php echo $id_admin ?>">
                <input type="hidden" name="id_funcionario" value="<?php echo $funcionario_id[0] ?>">
                <input type="hidden" name="tipo" value="edicao">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Editar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>

<?php
require_once("templates/painel/footer.php");
?>

 