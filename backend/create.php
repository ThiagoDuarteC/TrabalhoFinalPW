<?php

if((isset($_POST["title"]) && !empty($_POST["title"])) && (isset($_POST["description"]) && !empty($_POST["description"])) && (isset($_POST["due_date"]) && !empty($_POST["due_date"]))){
    
    require_once('connection.php');
    require 'class/task.class.php';

    $task = new Task();

    $title = addslashes($_POST["title"]);
    $description = addslashes($_POST["description"]);
    $due_date = addslashes($_POST["due_date"]);

    if($task->create($title, $description, $due_date) == true){
        echo 'Atividade criada com sucesso.';
    } else {
        echo 'Erro ao criar a atividade!';
    }

} else {
    echo 'É obrigatório preencher todos os campos para criar uma atividade!';
}