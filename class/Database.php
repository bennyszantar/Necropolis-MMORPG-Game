<?php
class Database {

    function __construct() {
        
    }

    public function connect(){
        try{
            //1
         $this->_pdo = new PDO('mysql:host=localhost;dbname=necropolis;', 'root', '');
       // $this->_pdo = new PDO('mysql:host=mysql2.000webhost.com;dbname=a3829872_sfc;', 'a3829872_admin', 'beniamins9');

    
        $this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $error){
            echo 'Problem z baza :( :' . $error->getMessage();
        }
    }
    
    public function disconnect(){
        $this->_pdo = null;
    }
}

?>
