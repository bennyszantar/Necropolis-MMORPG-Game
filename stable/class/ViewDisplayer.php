<?php
class ViewDisplayer {

    function __construct() {

    }

    public function displayLogin(){
        include './views/login.php';   
    }

    public function displayIndex(){
        include './views/index.php';
    }

    public function displayRegister(){
        include './views/register.php';
    }

    public function displayDefaultHeader(){
        include './views/loginheader.php';
    }

    public function displayDefaultFooter(){
        include './views/footer.php';
    }

    public function displayNewCharacter(){
        include './views/newcharacter.php';
    }

    public function displayGameHeader(){
        include './views/header.php';
    }
    

}
?>
