<?php
require_once("globals.php");
require_once("db.php");


$login = $_POST['login'];
$password = $_POST['password'];
$password = sha1($password);

$url = $BASE_URL."cadastro.php";
$url = str_replace("\\", "", $url);

$stmt = $conn->prepare("SELECT login FROM administradores WHERE login = :login AND senha = :senha");
$stmt->bindParam(":login", $login);
$stmt->bindParam(":senha", $password);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$result){
    $_SESSION['nao_autenticado'] = '<p class="alert alert-danger text-center">Usuário ou senha não encontrados</p>';
    header('Location: login.php');
    exit();
}else{
    $_SESSION['usuario'] = $login;
    header('Location: index.php');
    exit();
}

?>