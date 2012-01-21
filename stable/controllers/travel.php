<?php
if($_POST['travel'] == 'short'){
 $Travel = new Travel(mt_rand(1,6));    
}

if($_POST['travel'] == 'standard'){
 $Travel = new Travel(mt_rand(6,12));    
}


$TravelManager = new TravelManager($Travel);
$TravelManager->setTravel();



if($TravelManager->checkTravel() == true){
    
    if($TravelManager->checkTravelEnd() == true){
        $TravelManager->setActiveTravel();
        $TravelManager->endTravel($Travel->getStatistic());
        $Message = new Message;
        
    }else{
           $TravelManager->showTimeToEnd();
           
         }
    
}else{
    if($_POST){    
        if($_POST['start'] == 1){
            $TravelManager->startTravel();
            $TravelManager->showTimeToEnd();
        }
        
    }else{
        include './views/travel.php';
    }
    
}


?>
