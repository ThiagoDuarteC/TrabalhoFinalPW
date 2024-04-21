<?php

$localhost = "localhost";
$user = "root";
$password = "";
$database = "task";

global $pdo;

try{

    $pdo = new PDO("mysql:dbname=" . $database . "; host=" . $localhost, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){

    echo "ERRO: " . $e->getMessage();
    exit;

}
