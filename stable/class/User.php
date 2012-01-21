<?php
class User {

    function __construct($login,$password,$email) {
        $this->setEmail($email);
        $this->setLogin($login);
        $this->setPassword($password);
    }

    private $_login = null;
    private $_password = null;
    private $_email = null;
    private $_id = null;
    private $_logged = null;

    //settery

    public function setLogin($login){
        if($this->_login === null){
            $this->_login = $login;
            return true;
        }
        else{
            return false;
        }
    }
    public function setPassword($password){
        if($this->_password === null){
            $this->_password = $password;
            return true;

        }
        else{
            return false;
        }
    }
    public function setEmail($email){
        if($this->_email === null){
            $this->_email = $email;
            return true;
        }
        else{
            return false;
        }
    }
    public function setId($id){
        if($this->_id === null){
            $this->_id = $id;
            return true;
        }
        else{
            return false;
        }
    }
    public function setLogged($logged){
        if($this->_logged === null){
            $this->_logged = $logged;
            return true;
        }
        else{
            return false;
        }
    }
    public function setSession(){
        $_SESSION['id'] = $this->getId();
        $_SESSION['logged'] = $this->getLogged();

    }

    //gettery

    public function getLogin(){
        return $this->_login;
    }
    public function getPassword(){
        return $this->_password;
    }
    public function getEmail(){
        return $this->_email;
    }
    public function getId(){
        return $this->_id;
    }
    public function getLogged(){
        return $this->_logged;
    }

}
?>
