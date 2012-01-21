<?php
session_start();


require 'class/Character.php';
require 'class/CharacterManager.php';
require 'class/User.php';
require 'class/UserManager.php';
require 'class/Database.php';
require 'class/UserAuthorisation.php';
require 'class/FormDisplayer.php';
require 'class/ViewDisplayer.php';
require 'class/CharacterValidation.php';
require './views/loginheader.php';


echo mt_rand(0,1);




if(is_string($_GET['action'])){    
    if($_GET['action'] == 'login'){
        include './controllers/'.$_GET['action'].'.php';
    }else{
        if($_SESSION['logged'] == 1){
            include './controllers/'.$_GET['action'].'.php';
        }else{
            $ViewDisplayer = new ViewDisplayer();           
            echo "Nie jestes zalogowany";
            $ViewDisplayer->displayIndex();
            
        }
    }

}else{
    include './controllers/index.php';
}



require './views/footer.php';

?>
