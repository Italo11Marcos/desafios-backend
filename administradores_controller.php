<?php
require_once("globals.php");
require_once("db.php");

$nome = $_POST['nome_completo'];
$login = $_POST['login'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$data_criacao = date('Y-m-d H:i:s');

$erros = False;

if(empty($nome) || empty($login) || empty($password) || empty($password1)){
    $erros = True;
    $_SESSION['campos'] = '<p class="alert alert-danger text-center">Todos os campos devem ser preenchidos</p>';
    header('Location: cadastro.php');
    exit();
}

if(strlen($login) > 200){
    $erros = True;
    $_SESSION['login'] = '<p class="alert alert-danger text-center">Limite máximo de 200 caracteres</p>';
    header('Location: cadastro.php');
    exit();
}

if($password != $password1){
    $erros = True;
    $_SESSION['password'] = '<p class="alert alert-danger text-center">As senhas devem ser iguais</p>';
    header('Location: cadastro.php');
    exit();
}

if($password == $password1 && strlen($password) < 8){
    $erros = True;
    $_SESSION['password'] = '<p class="alert alert-danger text-center">A senha deve conter menos que 8 caracteres</p>';
    header('Location: cadastro.php');
    exit();
}

if(!$erros){
    $password = sha1($password);
    $stmt = $conn->prepare("INSERT INTO administradores (nome_completo, login, senha, data_criacao) VALUES (:nome_completo, :login, :senha, :data_criacao)");
    $stmt->bindParam(":nome_completo", $nome);
    $stmt->bindParam(":login", $login);
    $stmt->bindParam(":senha", $password);
    $stmt->bindParam(":data_criacao", $data_criacao);
    if($stmt->execute()){
        $_SESSION['sucesso'] = '<p class="alert alert-success text-center">Cadastro Realizado com sucesso</p>';
        header('Location: cadastro.php');
        exit();
        
    }else{
        $_SESSION['erro'] = '<p class="alert alert-danger text-center">Erro ao cadastrar</p>';
        header('Location: cadastro.php');
        exit();
    }
}
?>