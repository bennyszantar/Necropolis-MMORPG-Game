<?php
class ItemManager {

    function __construct() {
       
    
       $this->_db = new Database;
       $this->_db->connect();   
    }
    
    function __destruct() {
        $this->_db->disconnect();
    }
    
    function sell($itemid){
              
        $db = $this->_db->_pdo->prepare('DELETE FROM user_items WHERE item_id = :id AND owner_id = :oid');
        $db->execute(array(':oid' => $_SESSION['id'],':id' => $itemid));
        
        if($db->rowCount() == 1){
             $db = $this->_db->_pdo->prepare('UPDATE user_character SET gold = gold + 100 WHERE id = :id');
             $db->execute(array(':id' => $_SESSION['id']));
        }
    }
    
    function sellAll(){
          
        $db = $this->_db->_pdo->prepare('SELECT * FROM user_equipment WHERE id = :oid');
        $db->execute(array(':oid' => $_SESSION['id']));

        $eq = $db->fetch();
        
        $db = $this->_db->_pdo->prepare('DELETE FROM user_items WHERE owner_id = :oid AND item_id != '.$eq['helment'].' AND item_id != '.$eq['armor'].' 
            AND item_id != '.$eq['weapon'].' AND item_id != '.$eq['shoulder'].' AND item_id != '.$eq['belt'].' AND item_id != '.$eq['boots'].' AND item_id != '.$eq['shield'].'');
        $db->execute(array(':oid' => $_SESSION['id']));
        
       
             $db = $this->_db->_pdo->prepare('UPDATE user_character SET gold = gold + (100 * '.$db->rowCount().') WHERE id = :id');
             $db->execute(array(':id' => $_SESSION['id']));
       
    }
    
    
    

}
?>
