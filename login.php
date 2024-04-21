<?php

$arr = [];

foreach (getallheaders() as $name => $value) {
    $arr[$name] = $value;
}

if((isset($arr["email"]) && !empty($arr["email"])) && (isset($arr["password"]) && !empty($arr["password"]))){
    
    require 'connection.php';
    require 'class/user.class.php';

    $user = new User();

    $email = addslashes($arr["email"]);
    $password = addslashes($arr["password"]);

    if($user->login($email, $password) == true){
        //REDIRECIONAR PARA TELA INICIAL LOGADO
    } else {
        //REDIRECIONAR PARA A MESMA TELA COM MENSAGEM DE ERRO AO LOGAR
    }

} else {
    echo "deu errado primo";
}