<?php
    if(!empty($_SESSION['campos'])){
        echo $_SESSION['campos'];
        unset($_SESSION['campos']);
    }
    if(!empty($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    if(!empty($_SESSION['password'])){
        echo $_SESSION['password'];
        unset($_SESSION['password']);
    }
    if(!empty($_SESSION['sucesso'])){
        echo $_SESSION['sucesso'];
        unset($_SESSION['sucesso']);
    }
    if(!empty($_SESSION['erro'])){
        echo $_SESSION['erro'];
        unset($_SESSION['erro']);
    }
    if(!empty($_SESSION['nao_autenticado'])){
        echo $_SESSION['nao_autenticado'];
        unset($_SESSION['nao_autenticado']);
    }
?>