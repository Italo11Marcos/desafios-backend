<?php
require_once("globals.php");
require_once("db.php");

$nome = $_POST['nome_completo'];
$login = $_POST['login'];
$password = $_POST['password'];
$saldo = $_POST['saldo'];
$id_admin = $_POST['id_admin'];
$data_criacao = date('Y-m-d H:i:s');

$erros = False;

if(empty($nome) || empty($login) || empty($password) || empty($saldo)){
    $erros = True;
    $_SESSION['campos'] = '<p class="alert alert-danger text-center">Todos os campos devem ser preenchidos</p>';
    header('Location: cadastro_funcionarios.php');
    exit();
}

if(strlen($login) > 200){
    $erros = True;
    $_SESSION['login'] = '<p class="alert alert-danger text-center">Limite máximo de 200 caracteres</p>';
    header('Location: cadastro_funcionarios.php');
    exit();
}

if(!is_numeric($saldo)){
    $erros = True;
    $_SESSION['saldo'] = '<p class="alert alert-danger text-center">Insira um valor numérico</p>';
    header('Location: cadastro_funcionarios.php');
    exit();
}

if(strlen($password) < 8){
    $erros = True;
    $_SESSION['password'] = '<p class="alert alert-danger text-center">A senha deve conter menos que 8 caracteres</p>';
    header('Location: cadastro_funcionarios.php');
    exit();
}

if(!$erros){
    $saldo = number_format($saldo, 2, '.', '');
    $password = md5($password);
    $stmt = $conn->prepare("INSERT INTO funcionarios (nome_completo, login, senha, saldo_atual, administrador_id, data_criacao) 
                            VALUES (:nome_completo, :login, :senha, :saldo_atual, :administrador_id, :data_criacao)");
    $stmt->bindParam(":nome_completo", $nome);
    $stmt->bindParam(":login", $login);
    $stmt->bindParam(":senha", $password);
    $stmt->bindParam(":saldo_atual", $saldo);
    $stmt->bindParam(":administrador_id", $id_admin);
    $stmt->bindParam(":data_criacao", $data_criacao);
    if($stmt->execute()){
        $_SESSION['sucesso'] = '<p class="alert alert-success text-center">Cadastro Realizado com sucesso</p>';
        header('Location: cadastro_funcionarios.php');
        exit();
        
    }else{
        $_SESSION['erro'] = '<p class="alert alert-danger text-center">Erro ao cadastrar</p>';
        header('Location: cadastro_funcionarios.php');
        exit();
    }
}
?>