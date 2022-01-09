<?php

class Register extends Db {
    protected function checkUser($name, $email){
        $sql = $this->connect()->prepare('SELECT Name FROM Users WHERE Name = ? OR Email = ?;');
        
        if(!$sql->execute(array($name, $email))){
            $sql = null;
            header('location: ../index.php?error=User_already_exists');
            exit();
        }

        $sql = null;
    }

    protected function createUser($name, $email, $password){
        $sql = $this->connect()->prepare('INSERT INTO Users (Name, Email, Password) VALUES (?, ?, ?);');

        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
        
        if(!$sql->execute(array($name, $email, $passwordHashed))){
            $sql = null;
            header('location: ../index.php?error=User_already_exists');
            exit();
        }

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }
}