<?php
class CharacterValidation {

    function __construct($character) {
        $this->_character = $character;

        $this->_db = new Database;
        $this->_db->connect();
    }
    
    function __destruct(){
        $this->_db->disconnect();
    }


    public function checkCharacterExists(){
         $q = $this->_db->_pdo->prepare('SELECT * FROM user_character WHERE id = :id ');
         $q->execute(array(':id' => $this->_character->getIdFromSession()));

         if($character = $q->fetch()){
                return true;
             }
    }

    

}

?>
