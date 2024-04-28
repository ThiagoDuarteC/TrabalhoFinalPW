<?php

$servername = "localhost";
$username = "root";
$password = "";

$connection = new mysqli($servername, $username, $password);

if ($connection->connect_error) {
    die("Erro na conexão: " . $connection->connect_error);
}

$sql_create_db = "CREATE DATABASE IF NOT EXISTS task";

if ($connection->query($sql_create_db) === TRUE) {
    echo "Banco de dados 'task' criado com sucesso!<br>";
} else {
    echo "Erro ao criar o banco de dados: " . $connection->error . "<br>";
}

$connection->select_db("task");

$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    last_name VARCHAR(255),
    date_of_birth VARCHAR(10),
    email VARCHAR(100),
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL
)";

if ($connection->query($sql_users) === TRUE) {
    echo "Tabela 'users' criada com sucesso!<br>";
} else {
    echo "Erro ao criar a tabela 'users': " . $connection->error . "<br>";
}

$sql_tasks = "CREATE TABLE IF NOT EXISTS tasks (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    status VARCHAR(100),
    created_by INT(11),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (created_by) REFERENCES users(id)
)";

if ($connection->query($sql_tasks) === TRUE) {
    echo "Tabela 'tasks' criada com sucesso!<br>";
} else {
    echo "Erro ao criar a tabela 'tasks': " . $connection->error . "<br>";
}

$connection->close();

?>
