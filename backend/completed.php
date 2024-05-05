<?php
    
require_once('connection.php');
require 'class/task.class.php';

$task = new Task();

$id = addslashes($_POST["id"]);

if($task->completed($id) == true){
    echo 'Atividade completada com sucesso.';
} else {
    echo 'Erro ao completar a atividade!';
}
