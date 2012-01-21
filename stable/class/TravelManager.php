<?php

class TravelManager {

    function __construct($travel) {
        $this->_travel = $travel;
        
        $this->_db = new Database;
        $this->_db->connect();  
    }
    
    function __destruct() {
        $this->_db->disconnect();
    }
    
    function setTravel(){
        $db = $this->_db->_pdo->prepare('SELECT * FROM game_travels WHERE id = :id');
        $db->execute(array(':id' => $this->_travel->getId() ));
        
            if($travel = $db->fetch()){
                $this->_travel->setId($travel['id']);
                $this->_travel->setName($travel['name']);
                $this->_travel->setTime($travel['time']);
                $this->_travel->setExperince($travel['experince']);
                $this->_travel->setMinlimit($travel['minlimit']);      
                $this->_travel->setStatistic($travel['statistic']);
                $this->_travel->setGold($travel['gold']);
             }

    }
    
    function setActiveTravel(){
        $db = $this->_db->_pdo->prepare('SELECT * FROM user_travels WHERE user_id = :id');
        $db->execute(array(':id' => $_SESSION['id'] ));
        
        $data = $db->fetch();
        
        $db = $this->_db->_pdo->prepare('SELECT * FROM game_travels WHERE id = :id');
        $db->execute(array(':id' => $data['travel_id'] ));
        
            if($travel = $db->fetch()){
                $this->_travel->setId($travel['id']);
                $this->_travel->setName($travel['name']);
                $this->_travel->setTime($travel['time']);
                $this->_travel->setExperince($travel['experince']);
                $this->_travel->setMinlimit($travel['minlimit']);      
                $this->_travel->setStatistic($travel['statistic']);
                $this->_travel->setGold($travel['gold']);
             }
        
    }
    
    
    function checkTravel(){
        $db = $this->_db->_pdo->prepare('SELECT * FROM user_travels WHERE user_id = :id');
        $db->execute(array(':id' => $_SESSION['id'] ));
        
         if($travel = $db->fetch()){
                    return true;
           }else{
               return false;
           }
    }
    
    function checkTravelEnd(){
        $db = $this->_db->_pdo->prepare('SELECT * FROM user_travels WHERE user_id = :id');
        $db->execute(array(':id' => $_SESSION['id'] ));
        
        
         if($travel = $db->fetch()){
                if($travel['end'] > time()){
                    return false;
                }else{
                    return true;
                }
           }
    }
    
    
    function startTravel(){
        $db = $this->_db->_pdo->prepare('INSERT INTO user_travels VALUES(null,:travel_id,:time,:id)');
        $db->execute(array(':travel_id' => $this->_travel->getId(), ':time' => time() + $this->_travel->getTime(), ':id' => $_SESSION['id']));           
    }
    
    function showTimeToEnd(){
        $db = $this->_db->_pdo->prepare('SELECT * FROM user_travels WHERE user_id = :id');
        $db->execute(array(':id' => $_SESSION['id'] ));
        
        
         if($travel = $db->fetch()){
                $end = ($travel['end'] - time());

                echo "<div class=hbar>Wyprawa</div><h2>Do końca pozostało:</h2><div id='character2'><div id='progressbar' style ='width:=100%;height:=50px;'  alt='".$end."' alt2='".($travel['end'] / 17000000)."'></div></div>";
         }
         
    }
    
    function silentTimeToEnd(){
        $db = $this->_db->_pdo->prepare('SELECT * FROM user_travels WHERE user_id = :id');
        $db->execute(array(':id' => $_SESSION['id'] ));
        
        
         if($travel = $db->fetch()){
                $this->end = ($travel['end'] - time());
                $this->endmax = $travel['end'];
                  }
         
    }
    
    function endTravel($statistic){
       $Character = new Character();
       $CharacterManager = new CharacterManager($Character);
       $CharacterManager->setCharacterData(0, 0);
       
        $db = $this->_db->_pdo->prepare('SELECT '.$statistic.' FROM user_character WHERE id = :id');
        $db->execute(array(':id' => $_SESSION['id']));   
        
         if($travel = $db->fetch()){
             
           
              echo "<div id='character2'>";
                
                   $rand = mt_rand(1,100) ;
                   $chance =  $travel[0] *2 + $this->_travel->getMinlimit();
                    if($rand <= $travel[0]*2 + $this->_travel->getMinlimit()){
                        
                        echo $this->_travel->getName().' z szansą: '.$chance.'% '.$rand.'<br> ';
                        echo " Przybyłeś z wyprawy, po ciężkim trudach podróży, mimo wielu starć z monstrami i rabusiami. <br><b>Zdobyłeś ".$this->_travel->getExperince() * ($Character->_level / 10)." doświadczenia oraz ".$this->_travel->getGold() * ($Character->_level / 10)." złota ! </b></br>";
                        $content .= " Przybyłeś z wyprawy, po ciężkim trudach podróży, mimo wielu starć z monstrami i rabusiami. <br><b>Zdobyłeś ".$this->_travel->getExperince()." doświadczenia oraz ".$this->_travel->getGold()." złota !</b></br>";
                       
                        
                        $db = $this->_db->_pdo->prepare('UPDATE user_character SET experince = experince + :experince WHERE id = :id');
                        $db->execute(array(':experince' => $this->_travel->getExperince() * ($Character->_level / 10), ':id' => $_SESSION['id']));
                        
                        $db = $this->_db->_pdo->prepare('UPDATE user_character SET gold = gold + :gold WHERE id = :id');
                        $db->execute(array(':gold' => $this->_travel->getGold() * ($Character->_level / 10), ':id' => $_SESSION['id']));
                        
                        $db = $this->_db->_pdo->prepare('DELETE FROM user_travels WHERE user_id = :id');
                        $db->execute(array(':id' => $_SESSION['id']));
                        
                        $ItemGenerator = new ItemGenerator;
                        $ItemGenerator->generateNewItem();
                        
                        echo "Zdobyłeś przedmioty:<b>". $ItemGenerator->Item."</b> !";
                        $content .= "Zdobyłeś przedmioty:<b>". $ItemGenerator->Item."</b> !";
                        
                        
                        
                    }else{
                        echo "Nie udalo sie z szansą ".$chance."% '.$rand.':(";
                         $content .= "Nie udalo sie z szansą ".$chance."% '.$rand.':(";
                        
                        $db = $this->_db->_pdo->prepare('DELETE FROM user_travels WHERE user_id = :id');
                        $db->execute(array(':id' => $_SESSION['id']));
                    }
                    
                    //$Message = new Message();
                    //$Message->newNews($_SESSION['id'],"Raport z wyprawy !", $content);       
                   // $Message->_db->disconnect();
                    
                    $db = $this->_db->_pdo->prepare('INSERT INTO user_news VALUES(null,:id,:content,0,:title)');
                    $db->execute(array(':id' => $_SESSION['id'],':title' => "Raport z wyprawy !",':content' => $content));
                
                echo '</div>';
           }
       
       
    }
    
    function silentEndTravel($statistic){
       $Character = new Character();
       $CharacterManager = new CharacterManager($Character);
       $CharacterManager->setCharacterData(0, 0);
       
        $db = $this->_db->_pdo->prepare('SELECT '.$statistic.' FROM user_character WHERE `id` = :id');
        $db->execute(array(':id' => $_SESSION['id']));   
        
         if($travel = $db->fetch()){
             
           
             
                
                   $rand = mt_rand(1,100) ;
                   $chance =  $travel[0] *2 + $this->_travel->getMinlimit();
                    if($rand <= $travel[0]*2 + $this->_travel->getMinlimit()){
                        
                        $content .= $this->_travel->getName().' z szansą: '.$chance.'% '.$rand.'<br> ';
                        $content .= " Przybyłeś z wyprawy, po ciężkim trudach podróży, mimo wielu starć z monstrami i rabusiami. <br><b>Zdobyłeś ".$this->_travel->getExperince()." doświadczenia oraz ".$this->_travel->getGold()." złota !</b></br>";
                       
                        
                        $db = $this->_db->_pdo->prepare('UPDATE user_character SET experince = experince + :experince WHERE id = :id');
                        $db->execute(array(':experince' => $this->_travel->getExperince() * ($Character->_level / 10), ':id' => $_SESSION['id']));
                        
                        $db = $this->_db->_pdo->prepare('UPDATE user_character SET gold = gold + :gold WHERE id = :id');
                        $db->execute(array(':gold' => $this->_travel->getGold() * ($Character->_level / 10), ':id' => $_SESSION['id']));
                        
                        $ItemGenerator = new ItemGenerator;
                        $ItemGenerator->generateNewItem();
                        $ItemGenerator->_db->disconnect();
                        
                        $content .= "Zdobyłeś przedmioty:<b>". $ItemGenerator->Item."</b> !";
                        
                        $db = $this->_db->_pdo->prepare('DELETE FROM user_travels WHERE user_id = :id');
                        $db->execute(array(':id' => $_SESSION['id']));
                        
                        
                        
                    }else{
                          $content .= "Nie udalo sie z szansą ".$chance."% '.$rand.':(";
                        
                        $db = $this->_db->_pdo->prepare('DELETE FROM user_travels WHERE user_id = :id');
                        $db->execute(array(':id' => $_SESSION['id']));
                    }
                  
                    
                    //$Message = new Message();
                   // $Message->newNews($_SESSION['id'],"Raport z wyprawy !", $content);       
                   // $Message->_db->disconnect();
                    
                    $db = $this->_db->_pdo->prepare('INSERT INTO user_news VALUES(null,:id,:content,0,:title)');
                    $db->execute(array(':id' => $_SESSION['id'],':title' => "Raport z wyprawy !",':content' => $content));
                    
                
                
           }
       
       
    }

}
?>
