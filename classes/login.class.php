<?php

class Login extends Db {
    protected function loginUser($email, $password){
        $sql = $this->connect()->prepare('SELECT Password FROM Users WHERE Name = ? OR Email = ?;');
        
        if(!$sql->execute(array($email, $email))){
            $sql = null;
            header('location: ../index.php?error=databaseerror');
            exit();
        }

        if($sql->rowCount() == 0){
            $sql = null;
            header('location: ../index.php?error=usernotexists');
            exit();
        }
        
        $hashedPassword = $sql->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPassword[0]['Password']);

        if(!$checkPassword){
            $sql = null;
            header('location: ../index.php?error=invalidpassword');
            exit();
        }else{
            $sql = $this->connect()->prepare('SELECT * FROM Users WHERE Name = ? OR Email = ? AND password = ?;');
            if(!$sql->execute(array($email, $email, $hashedPassword[0]['Password']))){
                $sql = null;
                header('location: ../index.php?error=databaseerror');
                exit();
            }

            if($sql->rowCount() == 0){
                $sql = null;
                header('location: ../index.php?error=usernotexists');
                exit();
            }

            $user = $sql->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['username'] = $user[0]['Name'];
            $_SESSION['role'] = $user[0]['Role'];
            $_SESSION['email'] = $user[0]['Email'];
        }

        $sql = null;
    }
}