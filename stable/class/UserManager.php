<?php
class UserManager {

    function __construct($user) {
        $this->_user = $user;
        $this->_db = new Database;
        $this->_db->connect();
    }
    
    function __destruct() {
        $this->_db->disconnect();
    }
    
    private $_user;

    public function create(){
        $q = $this->_db->_pdo->prepare('INSERT INTO user_account VALUES(null,:login,md5(:password),:email)');
        $q->execute(array(':login' => $this->_user->getLogin(), ':password' => $this->_user->getPassword(), ':email' => $this->_user->getEmail()));
        
        $q = $this->_db->_pdo->prepare('INSERT INTO user_equipment VALUES(null,0,0,0,0,0,0,0)');
        $q->execute();
    }
   

}

?>
