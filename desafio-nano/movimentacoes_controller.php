<?php
require_once("globals.php");
require_once("db.php");


$movimentacao = $_POST['movimentacao'];
$funcionario = $_POST['funcionario'];
$observacoes = $_POST['observacoes'];
$valor = $_POST['valor'];
$id_admin = $_POST['id_admin'];
$data_criacao = date('Y-m-d H:i:s');

$erros = False;

if(empty($movimentacao) || empty($funcionario) || empty($observacoes) || empty($valor) || empty($id_admin)){
    $erros = True;
    $_SESSION['campos'] = '<p class="alert alert-danger text-center">Todos os campos devem ser preenchidos</p>';
    header('Location: cadastro_movimentacoes.php');
    exit();
}

if(!is_numeric($valor)){
    $erros = True;
    $_SESSION['valor'] = '<p class="alert alert-danger text-center">Insira um valor numérico</p>';
    header('Location: cadastro_movimentacoes.php');
    exit();
}

if(!$erros){

    $stmt = $conn->prepare("SELECT saldo_atual FROM funcionarios WHERE id = :funcionario_id");
    $stmt->bindParam(":funcionario_id", $funcionario);
    $stmt->execute();
    $saldo_funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

    if($movimentacao == 'saida'){
        $novo_saldo = $saldo_funcionario['saldo_atual'] - $valor;
        if($novo_saldo <= 0){
            $_SESSION['movimentacao'] = '<p class="alert alert-danger text-center">Movimentação inválida. Funcionário não pode ficar com saldo negativo.</p>';
            header('Location: cadastro_movimentacoes.php');
            exit();
        }else{
            $stmt = $conn->prepare("UPDATE funcionarios SET saldo_atual = $novo_saldo WHERE id = :funcionario_id");
            $stmt->bindParam(":funcionario_id", $funcionario);
            $stmt->execute();
        }
    }

    if($movimentacao == 'entrada'){
        $novo_saldo = $saldo_funcionario['saldo_atual'] + $valor;
        $stmt = $conn->prepare("UPDATE funcionarios SET saldo_atual = $novo_saldo WHERE id = :funcionario_id");
        $stmt->bindParam(":funcionario_id", $funcionario);
        $stmt->execute();
    }

    $valor = number_format($valor, 2, '.', '');
    $stmt = $conn->prepare("INSERT INTO movimentacoes (tipo_movimentacao, valor, funcionario_id, observacoes, administrador_id, data_criacao) 
                                VALUES (:tipo_movimentacao, :valor, :funcionario_id, :observacoes, :administrador_id, :data_criacao)");
    $stmt->bindParam(":tipo_movimentacao", $movimentacao);
    $stmt->bindParam(":valor", $valor);
    $stmt->bindParam(":funcionario_id", $funcionario);
    $stmt->bindParam(":observacoes", $observacoes);
    $stmt->bindParam(":administrador_id", $id_admin);
    $stmt->bindParam(":data_criacao", $data_criacao);
    if($stmt->execute()){
        $_SESSION['sucesso'] = '<p class="alert alert-success text-center">Cadastro Realizado com sucesso</p>';
        header('Location: cadastro_movimentacoes.php');
        exit();
        
    }else{
        $_SESSION['erro'] = '<p class="alert alert-danger text-center">Erro ao cadastrar</p>';
        header('Location: cadastro_movimentacoes.php');
        exit();
    }
}

?>