<?php
    
if(isset($_POST["id"]) && !empty($_POST["id"])){
    require_once('connection.php');
    require 'class/task.class.php';

    $id = trim($_POST["id"]);
    
    $task = new Task();

    echo $task->show($id);
} else {
    echo 'Atividade não encontrada.';
}
