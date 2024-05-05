<?php
    
require_once('connection.php');
require 'class/task.class.php';

$task = new Task();

if($task->list() == true){
    //listar as atividades
} else {
    //erro ao listar as atividades
}
