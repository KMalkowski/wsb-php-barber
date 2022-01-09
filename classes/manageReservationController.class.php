<?php

class manageReservationController extends Reservation{
    private $id;
    private $role;

    public function __construct($id, $role){
        $this->id = $id;
        $this->role = $role;
    }

    public function tryConfirmReservation(){

        if($this->checkIfFormIsEmpty()){
            header('location: ../index.php?error=emptyinput');
            exit();
        }elseif($this->role != 'admin'){
            header('location: ../index.php?error=invalidpermissions');
            exit();
        }
        $this->confirmReservation($this->id);
    }

    public function tryDeleteReservation(){

        if($this->checkIfFormIsEmpty()){
            header('location: ../index.php?error=emptyinput');
            exit();
        }elseif($this->role != 'admin'){
            header('location: ../index.php?error=invalidpermissions');
            exit();
        }
        $this->deleteReservation($this->id);
    }

    private function checkIfFormIsEmpty(){
        if(empty($this->id) || empty($this->role)){
            return true;
        }
        return false;
    }
}