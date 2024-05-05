<?php

class Task{

    public function create($title, $description){
        global $pdo;

        $current_user = $_SERVER['PHP_AUTH_USER'];

        $sql = "INSERT INTO tasks (title, description, status, created_by, created_at, updated_at) VALUES ('$title', '$description', 'DRAFT', '$current_user', NOW(), NOW())";
        $sql = $pdo->prepare($sql);

        try {
            $sql->execute();
        } catch (PDOException $e) {
            return false;
        }

        return true;
    }

    public function update($title, $description, $id){
        global $pdo;

        $sql = "UPDATE tasks SET title = :title, description = :description, updated_at = NOW() WHERE id = :id";
        $sql = $pdo->prepare($sql);

        $sql->bindValue(':title', $title);
        $sql->bindValue(':description', $description);
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