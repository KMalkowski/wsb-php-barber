<?php

class LoginController extends Login{
    private $email;
    private $password;

    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
    }

    public function tryLoginUser(){
        if($this->checkIfFormIsEmpty()){
            header('location: ../index.php?error=emptyinput');
            exit();
        }

        $this->loginUser($this->email, $this->password);
    }

    private function checkIfFormIsEmpty(){
        if(empty($this->email) || empty($this->password)){
            return true;
        }
        return false;
    }
}