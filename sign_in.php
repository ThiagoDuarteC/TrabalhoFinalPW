<?php

if((isset($_POST["email"]) && !empty($_POST["email"])) && (isset($_POST["password"]) && !empty($_POST["password"]))){
    
    require_once('connection.php');
    require 'class/user.class.php';

    $user = new User();

    $email = addslashes($_POST["email"]);
    $password = addslashes($_POST["password"]);

    if($user->signin($email, $password) == true){
        if(isset($_SESSION['user'])){
            header("Location: home.php");
            exit();
            //REDIRECIONAR PARA TELA INICIAL LOGADO
        } else {
            header("Location: index.html");
            exit();
            //REDIRECIONAR PARA A MESMA TELA COM MENSAGEM DE ERRO AO LOGAR
        }
    } else {
        header("Location: index.html");
        exit();
        //REDIRECIONAR PARA A MESMA TELA COM MENSAGEM DE ERRO AO LOGAR
    }

} else {
    header("Location: home.php");
    exit();
}