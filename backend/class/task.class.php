<?php

class Task{

    public function list(){
        global $pdo;

        $current_user = $_SESSION['user'];

        $sql = "SELECT * FROM tasks WHERE created_by = :current_user AND deleted_at IS NULL";
        $sql = $pdo->prepare($sql);

        $sql->bindValue(':current_user', $current_user);

        try {
            $sql->execute();
            $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($tasks);
        } catch (PDOException $e) {
            return false;
        }

    }

    public function create($title, $description, $due_date){
        global $pdo;

        $current_user = $_SESSION['user'];

        $sql = "INSERT INTO tasks (title, description, status, due_date, created_by, created_at, updated_at) VALUES ('$title', '$description', 'DRAFT','$due_date', '$current_user', NOW(), NOW())";
        $sql = $pdo->prepare($sql);

        try {
            $sql->execute();
        } catch (PDOException $e) {
            return false;
        }

        return true;
    }

    public function show($id){
        global $pdo;

        $current_user = $_SESSION['user'];

        $sql = "SELECT * FROM tasks WHERE created_by = :current_user AND deleted_at IS NULL AND id = :id";
        $sql = $pdo->prepare($sql);

        $sql->bindValue(':current_user', $current_user);
        $sql->bindValue(':id', $id);

        try {
            $sql->execute();
            $tasks = $sql->fetch(PDO::FETCH_ASSOC);
            return json_encode($tasks);
        } catch (PDOException $e) {
            return false;
        }

    }

    public function update($title, $description, $due_date, $id){
        global $pdo;

        $sql = "UPDATE tasks SET title = :title, description = :description, due_date = :due_date, updated_at = NOW() WHERE id = :id";
        $sql = $pdo->prepare($sql);

        $sql->bindValue(':title', $title);
        $sql->bindValue(':description', $description);
        $sql->bindValue(':due_date', $due_date);
        $sql->bindValue(':id', $id);

        try {
            $sql->execute();
        } catch (PDOException $e) {
            return false;
        }

        return true;
    }

    public function destroy($id){
        global $pdo;

        $sql = "UPDATE tasks SET deleted_at = NOW() WHERE id = :id";
        $sql = $pdo->prepare($sql);

        $sql->bindValue(':id', $id);

        try {
            $sql->execute();
        } catch (PDOException $e) {
            return false;
        }

        return true;
    }

    public function completed($id){
        global $pdo;

        $sql = "UPDATE tasks SET status = 'DONE', updated_at = NOW() WHERE id = :id";
        $sql = $pdo->prepare($sql);

        $sql->bindValue(':id', $id);

        try {
            $sql->execute();
        } catch (PDOException $e) {
            return false;
        }

        return true;
    }

}