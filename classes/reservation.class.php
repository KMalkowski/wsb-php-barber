<?php

class Reservation extends Db {
    protected function checkReservation($date){
        $sql = $this->connect()->prepare('SELECT Date FROM Events WHERE Date = STR_TO_DATE(?, "%m-%d-%Y %H:%i:%s");');
        
        if(!$sql->execute(array($date)) || $sql->rowCount() > 0){
            $sql = null;
            header('location: ../index.php?error=datetaken');
            exit();
        }

        $sql = null;
    }

    protected function makeReservation($email, $date){
        $sql = $this->connect()->prepare('INSERT INTO Events (Email, Date, isConfirmed) VALUES (?, STR_TO_DATE(?, "%m-%d-%Y %H:%i:%s"), false);');
        
        if(!$sql->execute(array($email, $date))){
            $sql = null;
            header('location: ../index.php?error=reservation_already_done');
            exit();
        }

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    protected function getUsersReservationList($email){
        $sql = $this->connect()->prepare('SELECT * FROM Events WHERE Email = ?;');
        
        if(!$sql->execute(array($email))){
            $sql = null;
            return 'error';
            exit();
        }

        if($sql->rowCount() == 0){
            $sql = null;
            return 'error';
            exit();
        }else{
            $reservations = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $reservations;
        }
    }

    protected function getAllReservationList(){
        $sql = $this->connect()->prepare('SELECT * FROM Events;');
        
        if(!$sql->execute()){
            $sql = null;
            return 'error';
            exit();
        }

        if($sql->rowCount() == 0){
            $sql = null;
            return 'error';
            exit();
        }else{
            $reservations = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $reservations;
        }
    }

    protected function confirmReservation($id){
        $sql = $this->connect()->prepare('
        UPDATE Events
        SET isConfirmed = true
        WHERE ID = ?;'
        );
        
        if(!$sql->execute(array($id))){
            $sql = null;
            return 'error';
            exit();
        }
        
        return true;
    }

    protected function deleteReservation($id){
        $sql = $this->connect()->prepare(
        'DELETE FROM Events WHERE ID = ?;'
        );
        
        if(!$sql->execute(array($id))){
            $sql = null;
            return 'error';
            exit();
        }
        
        return true;
    }
}