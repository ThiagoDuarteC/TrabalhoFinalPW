<?php

class User{

    public function signin($email, $password){

        global $pdo;

        $sql = "SELECT id, email, password FROM users WHERE email = :email AND password = :password";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("password", $password);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();

            $_SESSION['user'] = $dado['email'];

            return true;
        } else {
            return false;
        }

    }

}