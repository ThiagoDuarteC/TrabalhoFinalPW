<?php

class User{

    public function signin($email, $password){

        global $pdo;

        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("password", $password);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();

            $_SESSION['id'] = $dado['iduser'];

            return true;
        } else {
            return false;
        }

    }

}