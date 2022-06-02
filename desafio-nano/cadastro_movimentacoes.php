<?php
require_once("templates/painel/header.php");
require_once("globals.php");
require_once("db.php");
$id_admin = $_SESSION['id_admin'];

$stmt = $conn->prepare("SELECT id, nome_completo FROM funcionarios");
$stmt->execute();
$funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="content">
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Cadastro de Movimentações</b></h3>
        </div>
        <div class="card-body">
            <?php require_once("session_messages.php") ?>
            <form action="<?php $BASE_URL ?>movimentacoes_controller.php" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Tipo de Movimentação: </label>
                            <select class="form-control" name="movimentacao">
                                <option value="entrada">Entrada</option>
                                <option value="saida">Saída</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Funcionário: </label>
                            <select class="form-control" name="funcionario" >
                                <?php foreach($funcionarios as $funcionario){?>
                                <option value="<?php echo $funcionario['id'] ?>"><?php echo $funcionario['nome_completo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Valor:</label>
                            <input class="form-control" type="text" name="valor" placeholder="00.00" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Observações:</label>
                            <textarea class="form-control" name="observacoes" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_admin" value="<?php echo $id_admin ?>">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Cadastrar</button>
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