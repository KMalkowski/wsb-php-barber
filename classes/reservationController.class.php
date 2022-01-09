<?php

class ReservationController extends Reservation{
    private $email;
    private $date;
    private $time;
    private $dateTime;

    public function __construct($email, $date, $time){
        $this->email = $email;
        $this->date = $date;
        $this->time = $time;
        $this->dateTime = date($date . ' ' . $time);
    }

    public function tryMakeReservation(){

        if($this->checkIfFormIsEmpty()){
            header('location: ../index.php?error=emptyinput');
            exit();
        }elseif($this->checkIfEmailIsInvalid()){
            header('location: ../index.php?error=invalidemail');
            exit();
        }elseif($this->checkIfReservationExists()){
            header('location: ../index.php?error=userexists');
            exit();
        }
        $this->makeReservation($this->email, $this->dateTime);
    }

    private function checkIfFormIsEmpty(){
        if(empty($this->email) || empty($this->date || empty($this->time))){
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

    private function checkIfReservationExists(){
        if($this->checkReservation($this->dateTime)){
            return true;
        }
        return false;
    }

    public function tryGetUsersReservations($email){
        return getUsersReservationList($email);
    }
}