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
require 'class/Fight.php';
require 'class/Travel.php';
require 'class/TravelManager.php';
require 'class/Item.php';
require 'class/ItemManager.php';
require 'class/ItemGenerator.php';
require 'class/Equipment.php';
require 'class/Message.php';
require 'class/Profile.php';
require 'class/ProfileManager.php';
require './views/header.php';

$Character = new Character();
$CharacterManager = new CharacterManager($Character);
$CharacterManager->setCharacterData(0, 0);
$CharacterManager->levelUp();
$CharacterManager->_db->disconnect();
$Equipment = new Equipment();
$Equipment->addStatsToCharacter($Character);
$Equipment->_db->disconnect();

$Travel = new Travel(mt_rand(1,6));
$TravelManager = new TravelManager($Travel);
$TravelManager->setActiveTravel();
if($TravelManager->checkTravelEnd() == true){
        
        $TravelManager->silentEndTravel($Travel->getStatistic());
        $TravelManager->_db->disconnect();
}
else{
    $TravelManager->_db->disconnect(); 
}



//$ItemGenerator = new ItemGenerator();//
//$ItemGenerator->generateNewItem();


if(is_string($_GET['action'])){    
    if($_GET['action'] == 'login' OR $_GET['action'] == 'register'){
        include './controllers/'.$_GET['action'].'.php';
    }else{
        if($_SESSION['logged'] == 1){
            if(!include './controllers/'.$_GET['action'].'.php'){
            echo "Błąd";
                
            }    
            
        }else{
            $ViewDisplayer = new ViewDisplayer();           
            echo "<div id='character2'>Nie jesteś zalogowany ! Na co czekasz ?</div>";
            $ViewDisplayer->displayIndex();
            
        }
    }

}else{
    include './controllers/index.php';
}





require './views/footer.php';


?>

