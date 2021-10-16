<?php
require_once("templates/painel/header.php");
require_once("globals.php");
require_once("db.php");
?>

<section class="content">
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Funcionários</b></h3>
            <?php require_once("session_messages.php") ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-borderless text-center" id="table_funcionarios">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Cadastro</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $stmt = $conn->prepare("SELECT id, nome_completo, saldo_atual, data_criacao FROM funcionarios");
                                $stmt->execute();
                                $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach($funcionarios as $funcionario){
                            ?>
                            <tr id="<?php echo $funcionario['id'] ?>">
                                <td><?php echo $funcionario['id'] ?></td>
                                <td><?php echo $funcionario['nome_completo'] ?></td>
                                <td><?php echo 'R$'.$funcionario['saldo_atual'] ?></td>
                                <td><?php echo $funcionario['data_criacao'] ?></td>
                                <td>
                                    <a href="" title="Visualizar extratos"><i class="far fa-eye"></i></a>
                                    <a href="<?php $BASEURL ?>edicao_funcionarios.php?id=<?php echo $funcionario['id'] ?>" title="Editar funcionário"><i class="far fa-edit"></i></a>
                                    <a href="#" class="remove" title="Excluir funcionário" data-toggle="modal" data-target="#modalExcluirFuncionario"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalExcluirFuncionario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content border border-danger">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Realmente deseja excluir este funcionário?
      </div>
      <div class="modal-footer">
        <form action="<?php $BASEURL ?>funcionarios_controller.php" method="post">
            <input type="hidden" name="tipo" value="excluir">
            <input id="funcionario_excluir" type="hidden" name="id_funcionario" value="">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>

</section>

<?php
require_once("templates/painel/footer.php");
?>