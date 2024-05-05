<?php
    
require_once('connection.php');
require 'class/task.class.php';

$task = new Task();

$id = addslashes($_POST["id"]);

if($task->destroy($id) == true){
    echo 'Atividade excluida com sucesso.';
} else {
    echo 'Erro ao excluir a atividade!';
}
