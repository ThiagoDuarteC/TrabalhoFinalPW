<?php

if((isset($_POST["title"]) && !empty($_POST["title"])) && (isset($_POST["description"]) && !empty($_POST["description"])) && (isset($_POST["due_date"]) && !empty($_POST["due_date"]))){
    
    require_once('connection.php');
    require 'class/task.class.php';

    $task = new Task();

    $id = addslashes($_POST["id"]);
    $title = addslashes($_POST["title"]);
    $description = addslashes($_POST["description"]);
    $due_date = addslashes($_POST["due_date"]);

    if($task->update($title, $description, $due_date, $id) == true){
        echo 'Atividade atualizada com sucesso.';
    } else {
        echo 'Erro ao atualizar a atividade!';
    }

} else {
    echo 'É obrigatório preencher todos os campos para atualizar uma atividade!';
}