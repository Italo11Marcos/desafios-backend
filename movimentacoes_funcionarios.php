<?php
require_once("templates/painel/header.php");
require_once("globals.php");
require_once("db.php");

$id_admin = $_SESSION['id_admin'];
$funcionario_id = explode('/', $_GET['id']);

$stmt = $conn->prepare("SELECT m.data_criacao, m.tipo_movimentacao, m.valor, m.observacoes 
                        FROM movimentacoes as m 
                        JOIN funcionarios as f on m.funcionario_id = f.id 
                        WHERE m.funcionario_id = :id");
$stmt->bindParam(":id", $funcionario_id[0]);
$stmt->execute();
$extratos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT nome_completo FROM funcionarios WHERE id = :id");
$stmt->bindParam(":id", $funcionario_id[0]);
$stmt->execute();
$funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<section class="content">
<div class="content-wrapper">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><b>Extratos - <?php echo $funcionario['nome_completo'] ?></b></h3>
            <?php require_once("session_messages.php") ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-borderless text-center" id="table_extratos">
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Obervação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                                foreach($extratos as $extrato){
                            ?>
                            <tr>
                                <td><?php echo $extrato['data_criacao'] ?></td>
                                <?php if($extrato['tipo_movimentacao'] == 'entrada') {?>
                                    <td><span class="badge badge-success">Entrada</span></td>
                                <?php }else{ ?>
                                    <td><span class="badge badge-danger">Saída</span></td>
                                <?php } ?>
                                <td><?php echo 'R$'.$extrato['valor'] ?></td>
                                <td><?php echo $extrato['observacoes'] ?></td>
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