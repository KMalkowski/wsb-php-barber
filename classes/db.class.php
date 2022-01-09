<?php

class Db {
    protected function connect(){
        try{
            $host = 'localhost';
            $user = 'kris';
            $password = 'gitarasiema';
            $dbName = 'barber';
            $db = new PDO('mysql:host=' . $host . ';dbname='  . $dbName, $user, $password);

            if(!$this->tableExists($db, 'users')){
                $this->createUsersTable($db);
            }

            if(!$this->tableExists($db, 'events')){
                $this->createEventsTable($db);
            }

            return $db;
        }catch(PDOException $e){
            print('Database connection error: ' . $e->getMessage());
            die();
        }
    }

    private function tableExists($pdo, $table) {
        try {
            $result = $pdo->query("SELECT 1 FROM {$table} LIMIT 1");
        } catch (Exception $e) {
            $result = false;
        }
        return $result;
    }

    private function createUsersTable($db){
        try {
            $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $sql ="CREATE table Users(
            ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR( 50 ) NOT NULL, 
            Email VARCHAR( 50 ) NOT NULL,
            Password VARCHAR( 250 ) NOT NULL, 
            Role VARCHAR( 150 ) );";
            $db->exec($sql);

        } catch(PDOException $e) {
            print $e->getMessage();
            die();
        }
    }

    private function createEventsTable($db){
        try {
            $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $sql ="CREATE table Events(
            ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
            Email VARCHAR( 50 ) NOT NULL, 
            Date DATETIME NOT NULL,
            isConfirmed BOOLEAN );";
            $db->exec($sql);

        } catch(PDOException $e) {
            print $e->getMessage();
            die();
        }
    }
}

