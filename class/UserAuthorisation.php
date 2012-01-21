<?php
class UserAuthoristation {

    function __construct($user) {
        $this->_user = $user;

        $this->_db = new Database();
        $this->_db->connect();
    }
    
    function __destruct() {
        $this->_db->disconnect();
    }

    private $user;

    public function Logon(){

        $q = $this->_db->_pdo->prepare('SELECT * FROM user_account WHERE login = :login AND password = :password');
        $q->execute(array(':login' => $this->_user->getLogin(), ':password' => $this->_user->getPassword()));
        
      

             if($user = $q->fetch()){
                 
                 $this->_user->setId($user['id']);
                 $this->_user->setLogged(1);
                 $this->_user->setSession();
                 return true;
             }else{
                    return false;
                       
                  }

      

    }

    public function Logout(){
        $_SESSION['logged'] = 0;
    }

}
?>
