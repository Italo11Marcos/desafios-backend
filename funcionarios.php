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
                            <tr>
                                <td><?php echo $funcionario['id'] ?></td>
                                <td><?php echo $funcionario['nome_completo'] ?></td>
                                <td><?php echo 'R$'.$funcionario['saldo_atual'] ?></td>
                                <td><?php echo $funcionario['data_criacao'] ?></td>
                                <td>
                                    <a href="" title="Visualizar extratos"><i class="far fa-eye" aria></i></a>
                                    <a href="<?php $BASEURL ?>edicao_funcionarios.php?id=<?php echo $funcionario['id'] ?>" title="Editar funcionário"><i class="far fa-edit" aria></i></a>
                                    <a href="" title="Excluir funcionário"><i class="far fa-trash-alt" aria></i></a>
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
</section>

<?php
require_once("templates/painel/footer.php");
?>