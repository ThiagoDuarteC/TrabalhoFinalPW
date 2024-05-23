<?php
    
require_once('connection.php');
require 'class/task.class.php';

$task = new Task();

echo $task->list();
