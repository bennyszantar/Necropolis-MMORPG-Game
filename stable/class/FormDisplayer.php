<?php

class FormDisplayer {

    function __construct() {

    }

    public function displayLoginForm(){
        include './forms/login.php';
    }

    public function displayRegisterForm(){
        include './forms/register.php';
    }

    public function displayNewCharacterForm(){
        include './forms/newcharacter.php';
    }
    public function displayFightForm(){
        include './forms/fight.php';
    }
     public function displayTravelForm(){
        include './forms/travel.php';
    }

}


?>
