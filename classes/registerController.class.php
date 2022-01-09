<?php

class RegisterController extends Register{
    private $name;
    private $email;
    private $password;
    private $repeatPassword;

    public function __construct($name, $email, $password, $repeatPassword){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->repeatPassword = $repeatPassword;
    }

    public function registerUser(){
        if($this->checkIfFormIsEmpty()){
            header('location: ../index.php?error=emptyinput');
            exit();
        }elseif($this->checkIfEmailIsInvalid()){
            header('location: ../index.php?error=invalidemail');
            exit();
        }elseif($this->checkIfPasswordsDontMatch()){
            header('location: ../index.php?error=passwordsnotmatch');
            exit();
        }elseif($this->checkIfUserExists()){
            header('location: ../index.php?error=userexists');
            exit();
        }

        $this->createUser($this->name, $this->email, $this->password);
    }

    private function checkIfFormIsEmpty(){
        if(empty($this->name) || empty($this->email) || empty($this->password) || empty($this->repeatPassword)){
            return true;
        }
        return false;
    }

    private function checkIfEmailIsInvalid(){
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    private function checkIfPasswordsDontMatch(){
        if($this->password !== $this->repeatPassword){
            return true;
        }
        return false;
    }

    private function checkIfUserExists(){
        if($this->checkUser($this->name, $this->email)){
            return true;
        }
        return false;
    }
}