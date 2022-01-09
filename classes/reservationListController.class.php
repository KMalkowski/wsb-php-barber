<?php

class ReservationListController extends Reservation{
    private $email;
    private $role;

    public function __construct($email){
        $this->email = $email;
    }

    public function tryGetUsersReservations(){
        if($this->checkIfFormIsEmpty()){
            return 'error';
            exit();
        }elseif($this->checkIfEmailIsInvalid()){
            return 'error';
            exit();
        }
        return $this->getUsersReservationList($this->email);
    }

    public function tryGetAllReservations(){
        return $this->getAllReservationList();
    }

    private function checkIfFormIsEmpty(){
        if(empty($this->email)){
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
}