<?php
require_once("templates/painel/header.php");
require_once("globals.php");
require_once("db.php");
?>

<section class="content">
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Movimentações</b></h3>
            <?php require_once("session_messages.php") ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-borderless text-center" id="table_movimentacoes">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Funcionário</th>
                                <th scope="col">Obervação</th>
                                <th scope="col">Cadastro</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                $stmt = $conn->prepare("SELECT m.id, m.tipo_movimentacao, m.valor, m.observacoes, m.data_criacao, f.nome_completo 
                                                        FROM movimentacoes as m JOIN funcionarios as f
                                                        on m.funcionario_id = f.id ORDER BY m.data_criacao DESC");
                                $stmt->execute();
                                $movimentacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                foreach($movimentacoes as $movimentacao){
                            ?>
                            <tr id="<?php echo $movimentacao['id'] ?>">
                                <td><?php echo $movimentacao['id'] ?></td>
                                <?php if($movimentacao['tipo_movimentacao'] == 'entrada') {?>
                                    <td><span class="badge badge-success">Entrada</span></td>
                                <?php }else{ ?>
                                    <td><span class="badge badge-danger">Saída</span></td>
                                <?php } ?>
                                <td><?php echo 'R$'.$movimentacao['valor'] ?></td>
                                <td><?php echo $movimentacao['nome_completo'] ?></td>
                                <td><?php echo $movimentacao['observacoes'] ?></td>
                                <td><?php echo $movimentacao['data_criacao'] ?></td>
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