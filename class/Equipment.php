<?php
class Equipment {

    function __construct() {
        $this->_db = new Database;
        $this->_db->connect(); 
    }
    
    public $_weapon;
    public $_shield;
    
    
    
    function showAllItems(){
        $db = $this->_db->_pdo->prepare('SELECT * FROM user_items,user_equipment WHERE user_items.owner_id = :id AND user_equipment.id = :id ');
        $db->execute(array(':id' => $_SESSION['id']));
     
            echo "<fieldset class='ramka2'><legend>Wszystkie:</legend>"; 
            $i = 1;
            while($item = $db->fetch()){
                
               
                if($item['item_id'] != $item['weapon'] AND $item['item_id'] != $item['shield'] AND $item['item_id'] != $item['helment'] AND $item['item_id'] != $item['shoulder'] AND $item['item_id'] != $item['armor'] AND $item['item_id'] != $item['belt'] AND $item['item_id'] != $item['boots']){
                    
                 
                
                $ItemGenerator[$i] = new ItemGenerator;              
                $ItemGenerator[$i]->generateExistingItem($item['item_id']);
                echo '<div id = "item" class="radius"><a href="./game.php?action=equipment&itemid='.$ItemGenerator[$i]->Item->getId().'">'.$ItemGenerator[$i]->Item->getName().'</a><br>';
                
                if($ItemGenerator[$i]->Item->getApparence() != 0 )
                    {
                     echo ' Wyglad + '.$ItemGenerator[$i]->Item->getApparence();
                    }
                if($ItemGenerator[$i]->Item->getPerception() != 0 )
                    {
                     echo ' Percepcja + '.$ItemGenerator[$i]->Item->getPerception();
                    }    
                if($ItemGenerator[$i]->Item->getStrenght() != 0 )
                    {
                     echo ' Siła + '.$ItemGenerator[$i]->Item->getStrenght();
                    }
                if($ItemGenerator[$i]->Item->getDexterity() != 0 )
                    {
                     echo ' Zręczność + '.$ItemGenerator[$i]->Item->getDexterity();
                    }
                 if($ItemGenerator[$i]->Item->getVitality() != 0 )
                    {
                     echo ' Żywotność + '.$ItemGenerator[$i]->Item->getVitality();
                    }
                 if($ItemGenerator[$i]->Item->getInteligence() != 0 )
                    {
                     echo ' Inteligencja + '.$ItemGenerator[$i]->Item->getInteligence();
                    }  
                  if($ItemGenerator[$i]->Item->getDamage() != 0 )
                    {
                     echo ' Obrażenia + '.$ItemGenerator[$i]->Item->getDamage();
                    }    
               echo '<a href="./game.php?action=equipment&sellid='.$ItemGenerator[$i]->Item->getId().'"><br>Sprzedaj</a><br></div>';
               
                $ItemGenerator[$i]->_db->disconnect();
                
                }   
                }
                 echo "</fieldset>";
                $i++;
            
        
    }
    
    function showEquipedItems(){
        $db = $this->_db->_pdo->prepare('SELECT * FROM user_equipment WHERE id = :id');
        $db->execute(array(':id' => $_SESSION['id']));
        $item = $db->fetch();
        $ItemGenerator = new ItemGenerator; 
         echo "<fieldset class='ramka1'><legend>Założone:</legend>";

      
            if($item['helment'] > 0){
                                 
                    $ItemGenerator->generateExistingItem($item['helment']);             
                    echo ' <div id ="item2" class = "radius"><a href="./game.php?action=equipment&itemtype=helment">'.$ItemGenerator->Item->getName().'</a><br>';
                    if($ItemGenerator->Item->getApparence() != 0 )
                    {
                     echo ' Wyglad + '.$ItemGenerator->Item->getApparence();
                    }
                if($ItemGenerator->Item->getPerception() != 0 )
                    {
                     echo ' Percepcja + '.$ItemGenerator->Item->getPerception();
                    }    
                if($ItemGenerator->Item->getStrenght() != 0 )
                    {
                     echo ' Siła + '.$ItemGenerator->Item->getStrenght();
                    }
                if($ItemGenerator->Item->getDexterity() != 0 )
                    {
                     echo ' Zręczność + '.$ItemGenerator->Item->getDexterity();
                    }
                 if($ItemGenerator->Item->getVitality() != 0 )
                    {
                     echo ' Żywotność + '.$ItemGenerator->Item->getVitality();
                    }
                 if($ItemGenerator->Item->getInteligence() != 0 )
                    {
                     echo ' Inteligencja + '.$ItemGenerator->Item->getInteligence();
                    }  
                  if($ItemGenerator->Item->getDamage() != 0 )
                    {
                     echo ' Obrażenia + '.$ItemGenerator->Item->getDamage();
                    }    
                  echo "</div>"; 
                    
                }
                if($item['shoulder'] > 0){
                                
                    $ItemGenerator->generateExistingItem($item['shoulder']);             
                    echo ' <div id ="item2" class = "radius"><a href="./game.php?action=equipment&itemtype=shoulder">'.$ItemGenerator->Item->getName().'</a><br>';
                     if($ItemGenerator->Item->getApparence() != 0 )
                    {
                     echo ' Wyglad + '.$ItemGenerator->Item->getApparence();
                    }
                if($ItemGenerator->Item->getPerception() != 0 )
                    {
                     echo ' Percepcja + '.$ItemGenerator->Item->getPerception();
                    }    
                if($ItemGenerator->Item->getStrenght() != 0 )
                    {
                     echo ' Siła + '.$ItemGenerator->Item->getStrenght();
                    }
                if($ItemGenerator->Item->getDexterity() != 0 )
                    {
                     echo ' Zręczność + '.$ItemGenerator->Item->getDexterity();
                    }
                 if($ItemGenerator->Item->getVitality() != 0 )
                    {
                     echo ' Żywotność + '.$ItemGenerator->Item->getVitality();
                    }
                 if($ItemGenerator->Item->getInteligence() != 0 )
                    {
                     echo ' Inteligencja + '.$ItemGenerator->Item->getInteligence();
                    }  
                  if($ItemGenerator->Item->getDamage() != 0 )
                    {
                     echo ' Obrażenia + '.$ItemGenerator->Item->getDamage();
                    }    
                  echo "</div>"; 
                }
                if($item['armor'] > 0){
                                 
                    $ItemGenerator->generateExistingItem($item['armor']);             
                    echo ' <div id ="item2" class = "radius"><a href="./game.php?action=equipment&itemtype=armor">'.$ItemGenerator->Item->getName().'</a><br>';
                     if($ItemGenerator->Item->getApparence() != 0 )
                    {
                     echo ' Wyglad + '.$ItemGenerator->Item->getApparence();
                    }
                if($ItemGenerator->Item->getPerception() != 0 )
                    {
                     echo ' Percepcja + '.$ItemGenerator->Item->getPerception();
                    }    
                if($ItemGenerator->Item->getStrenght() != 0 )
                    {
                     echo ' Siła + '.$ItemGenerator->Item->getStrenght();
                    }
                if($ItemGenerator->Item->getDexterity() != 0 )
                    {
                     echo ' Zręczność + '.$ItemGenerator->Item->getDexterity();
                    }
                 if($ItemGenerator->Item->getVitality() != 0 )
                    {
                     echo ' Żywotność + '.$ItemGenerator->Item->getVitality();
                    }
                 if($ItemGenerator->Item->getInteligence() != 0 )
                    {
                     echo ' Inteligencja + '.$ItemGenerator->Item->getInteligence();
                    }  
                  if($ItemGenerator->Item->getDamage() != 0 )
                    {
                     echo ' Obrażenia + '.$ItemGenerator->Item->getDamage();
                    }    
                  echo "</div>"; 
                    
                }
                if($item['belt'] > 0){
                                
                    $ItemGenerator->generateExistingItem($item['belt']);             
                    echo '<div id ="item2" class = "radius"><a href="./game.php?action=equipment&itemtype=belt">'.$ItemGenerator->Item->getName().'</a><br>';
                     if($ItemGenerator->Item->getApparence() != 0 )
                    {
                     echo ' Wyglad + '.$ItemGenerator->Item->getApparence();
                    }
                if($ItemGenerator->Item->getPerception() != 0 )
                    {
                     echo ' Percepcja + '.$ItemGenerator->Item->getPerception();
                    }    
                if($ItemGenerator->Item->getStrenght() != 0 )
                    {
                     echo ' Siła + '.$ItemGenerator->Item->getStrenght();
                    }
                if($ItemGenerator->Item->getDexterity() != 0 )
                    {
                     echo ' Zręczność + '.$ItemGenerator->Item->getDexterity();
                    }
                 if($ItemGenerator->Item->getVitality() != 0 )
                    {
                     echo ' Żywotność + '.$ItemGenerator->Item->getVitality();
                    }
                 if($ItemGenerator->Item->getInteligence() != 0 )
                    {
                     echo ' Inteligencja + '.$ItemGenerator->Item->getInteligence();
                    }  
                  if($ItemGenerator->Item->getDamage() != 0 )
                    {
                     echo ' Obrażenia + '.$ItemGenerator->Item->getDamage();
                    }    
                  echo "</div>"; 
                }
                if($item['boots'] > 0){
                                 
                    $ItemGenerator->generateExistingItem($item['boots']);             
                    echo '<div id ="item2" class = "radius"><a href="./game.php?action=equipment&itemtype=boots">'.$ItemGenerator->Item->getName().'</a><br>';
                     if($ItemGenerator->Item->getApparence() != 0 )
                    {
                     echo ' Wyglad + '.$ItemGenerator->Item->getApparence();
                    }
                if($ItemGenerator->Item->getPerception() != 0 )
                    {
                     echo ' Percepcja + '.$ItemGenerator->Item->getPerception();
                    }    
                if($ItemGenerator->Item->getStrenght() != 0 )
                    {
                     echo ' Siła + '.$ItemGenerator->Item->getStrenght();
                    }
                if($ItemGenerator->Item->getDexterity() != 0 )
                    {
                     echo ' Zręczność + '.$ItemGenerator->Item->getDexterity();
                    }
                 if($ItemGenerator->Item->getVitality() != 0 )
                    {
                     echo ' Żywotność + '.$ItemGenerator->Item->getVitality();
                    }
                 if($ItemGenerator->Item->getInteligence() != 0 )
                    {
                     echo ' Inteligencja + '.$ItemGenerator->Item->getInteligence();
                    }  
                  if($ItemGenerator->Item->getDamage() != 0 )
                    {
                     echo ' Obrażenia + '.$ItemGenerator->Item->getDamage();
                    }    
                  echo "</div>"; 
                }
                if($item['weapon'] > 0){
                               
                    $ItemGenerator->generateExistingItem($item['weapon']);             
                    echo '<div id ="item2" class = "radius"><a href="./game.php?action=equipment&itemtype=weapon">'.$ItemGenerator->Item->getName().'</a><br>';
                     if($ItemGenerator->Item->getApparence() != 0 )
                    {
                     echo ' Wyglad + '.$ItemGenerator->Item->getApparence();
                    }
                if($ItemGenerator->Item->getPerception() != 0 )
                    {
                     echo ' Percepcja + '.$ItemGenerator->Item->getPerception();
                    }    
                if($ItemGenerator->Item->getStrenght() != 0 )
                    {
                     echo ' Siła + '.$ItemGenerator->Item->getStrenght();
                    }
                if($ItemGenerator->Item->getDexterity() != 0 )
                    {
                     echo ' Zręczność + '.$ItemGenerator->Item->getDexterity();
                    }
                 if($ItemGenerator->Item->getVitality() != 0 )
                    {
                     echo ' Żywotność + '.$ItemGenerator->Item->getVitality();
                    }
                 if($ItemGenerator->Item->getInteligence() != 0 )
                    {
                     echo ' Inteligencja + '.$ItemGenerator->Item->getInteligence();
                    }  
                  if($ItemGenerator->Item->getDamage() != 0 )
                    {
                     echo ' Obrażenia + '.$ItemGenerator->Item->getDamage();
                    }    
                  echo "</div>"; 
                }
                if($item['shield'] > 0){
                                 
                    $ItemGenerator->generateExistingItem($item['shield']);             
                    echo '<div id ="item2" class = "radius"> <a href="./game.php?action=equipment&itemtype=shield">'.$ItemGenerator->Item->getName().'</a><br>';
                     if($ItemGenerator->Item->getApparence() != 0 )
                    {
                     echo ' Wyglad + '.$ItemGenerator->Item->getApparence();
                    }
                if($ItemGenerator->Item->getPerception() != 0 )
                    {
                     echo ' Percepcja + '.$ItemGenerator->Item->getPerception();
                    }    
                if($ItemGenerator->Item->getStrenght() != 0 )
                    {
                     echo ' Siła + '.$ItemGenerator->Item->getStrenght();
                    }
                if($ItemGenerator->Item->getDexterity() != 0 )
                    {
                     echo ' Zręczność + '.$ItemGenerator->Item->getDexterity();
                    }
                 if($ItemGenerator->Item->getVitality() != 0 )
                    {
                     echo ' Żywotność + '.$ItemGenerator->Item->getVitality();
                    }
                 if($ItemGenerator->Item->getInteligence() != 0 )
                    {
                     echo ' Inteligencja + '.$ItemGenerator->Item->getInteligence();
                    }  
                  if($ItemGenerator->Item->getDamage() != 0 )
                    {
                     echo ' Obrażenia + '.$ItemGenerator->Item->getDamage();
                    }    
                  echo "</div></fieldset>"; 
                }
                                
                
        
    }
    
    function getEquipedWeapons($character){
        
        
        $db = $this->_db->_pdo->prepare('SELECT * FROM user_equipment WHERE id = :id');
        $db->execute(array(':id' => $character->getId()));
        $item = $db->fetch();
        
        $db2 = $this->_db->_pdo->prepare('SELECT itemtype FROM user_items WHERE item_id = '.$item['shield'].'');
        $db2->execute(array(':id' => $character->getId()));
        $item2 = $db2->fetch();
        
        $ItemGenerator = new ItemGenerator; 
        
                
                if($item['weapon'] > 0){
                               
                    $ItemGenerator->generateExistingItem($item['weapon']); 
                    $character->weapon = $ItemGenerator->Item->getName();
                    $character->weapondamage = $ItemGenerator->Item->getDamage();
                    $character->otherhand = 0;
                    
                    
                }
                else{
                    
                    $character->otherhand = 1;
                    $character->weapon = "Pięściami";
                    $character->weapondamage = 1;
                    
                }
                if($item['shield'] > 0){
                    
                     if($item2['itemtype'] == 6){
                         
                               
                     $ItemGenerator->generateExistingItem($item['shield']);  
                     $character->shield = $ItemGenerator->Item->getName();
                     $character->shielddamage = $ItemGenerator->Item->getDamage();
                      $character->isshield = 0;
               
                     }else{
                         
                        $character->isshield = 1;    
                     }
                    
                }
                else{
                   $character->shield = 'Pięściami';
                   $character->shielddamage = 1;
                   $character->isshield = 1;  
                }
              
        $ItemGenerator->_db->disconnect();        
                                
                
        
    }
    
    function addStatsToCharacter($character){
        
        $db = $this->_db->_pdo->prepare('SELECT * FROM user_equipment WHERE id = :id');
        $db->execute(array(':id' => $character->getId()));
            $ItemGenerator = new ItemGenerator;  
                $item = $db->fetch();
                if($item['weapon'] != 0){
                               
                                
                    $ItemGenerator->generateExistingItem($item['weapon']);             
                
                    $character->setStrenght($character->_strenght + $ItemGenerator->Item->getStrenght());                                        
                    $character->setDexterity($character->_dexterity + $ItemGenerator->Item->getDexterity());
                    $character->setInteligence($character->_inteligence + $ItemGenerator->Item->getInteligence());
                    $character->setVitality($character->_vitality + $ItemGenerator->Item->getVitality());
                    $character->setApparence($character->_apparence + $ItemGenerator->Item->getApparence());
                    $character->setPerception($character->_perception + $ItemGenerator->Item->getPerception());
                   
                    
                   
                }
                if($item['shield'] != 0){
                               
                                
                    $ItemGenerator->generateExistingItem($item['shield']);             
                
                    $character->setStrenght($character->_strenght + $ItemGenerator->Item->getStrenght());                                        
                    $character->setDexterity($character->_dexterity + $ItemGenerator->Item->getDexterity());
                    $character->setInteligence($character->_inteligence + $ItemGenerator->Item->getInteligence());
                    $character->setVitality($character->_vitality + $ItemGenerator->Item->getVitality());
                    $character->setApparence($character->_apparence + $ItemGenerator->Item->getApparence());
                    $character->setPerception($character->_perception + $ItemGenerator->Item->getPerception());
                    
                    
                }
                if($item['helment'] != 0){
                    $ItemGenerator->generateExistingItem($item['helment']);             
                
                    $character->setStrenght($character->_strenght + $ItemGenerator->Item->getStrenght());                                        
                    $character->setDexterity($character->_dexterity + $ItemGenerator->Item->getDexterity());
                    $character->setInteligence($character->_inteligence + $ItemGenerator->Item->getInteligence());
                    $character->setVitality($character->_vitality + $ItemGenerator->Item->getVitality());
                    $character->setApparence($character->_apparence + $ItemGenerator->Item->getApparence());
                    $character->setPerception($character->_perception + $ItemGenerator->Item->getPerception());
                    
                }
                if($item['shoulder'] != 0){
                    $ItemGenerator->generateExistingItem($item['shoulder']);             
                
                    $character->setStrenght($character->_strenght + $ItemGenerator->Item->getStrenght());                                        
                    $character->setDexterity($character->_dexterity + $ItemGenerator->Item->getDexterity());
                    $character->setInteligence($character->_inteligence + $ItemGenerator->Item->getInteligence());
                    $character->setVitality($character->_vitality + $ItemGenerator->Item->getVitality());
                    $character->setApparence($character->_apparence + $ItemGenerator->Item->getApparence());
                    $character->setPerception($character->_perception + $ItemGenerator->Item->getPerception());
                    
                }
                if($item['armor'] != 0){
                    $ItemGenerator->generateExistingItem($item['armor']);             
                
                    $character->setStrenght($character->_strenght + $ItemGenerator->Item->getStrenght());                                        
                    $character->setDexterity($character->_dexterity + $ItemGenerator->Item->getDexterity());
                    $character->setInteligence($character->_inteligence + $ItemGenerator->Item->getInteligence());
                    $character->setVitality($character->_vitality + $ItemGenerator->Item->getVitality());
                    $character->setApparence($character->_apparence + $ItemGenerator->Item->getApparence());
                    $character->setPerception($character->_perception + $ItemGenerator->Item->getPerception());
                    
                }
                if($item['belt'] != 0){
                    $ItemGenerator->generateExistingItem($item['belt']);             
                
                    $character->setStrenght($character->_strenght + $ItemGenerator->Item->getStrenght());                                        
                    $character->setDexterity($character->_dexterity + $ItemGenerator->Item->getDexterity());
                    $character->setInteligence($character->_inteligence + $ItemGenerator->Item->getInteligence());
                    $character->setVitality($character->_vitality + $ItemGenerator->Item->getVitality());
                    $character->setApparence($character->_apparence + $ItemGenerator->Item->getApparence());
                    $character->setPerception($character->_perception + $ItemGenerator->Item->getPerception());
                    
                }
                if($item['boots'] != 0){
                    $ItemGenerator->generateExistingItem($item['boots']);             
                
                    $character->setStrenght($character->_strenght + $ItemGenerator->Item->getStrenght());                                        
                    $character->setDexterity($character->_dexterity + $ItemGenerator->Item->getDexterity());
                    $character->setInteligence($character->_inteligence + $ItemGenerator->Item->getInteligence());
                    $character->setVitality($character->_vitality + $ItemGenerator->Item->getVitality());
                    $character->setApparence($character->_apparence + $ItemGenerator->Item->getApparence());
                    $character->setPerception($character->_perception + $ItemGenerator->Item->getPerception());
                    
                }            
               $ItemGenerator->_db->disconnect(); 
                
                
            
        
    }
    
    function equipItem($id){
        $db = $this->_db->_pdo->prepare('SELECT item_id,itemtype FROM user_items WHERE item_id = :id AND owner_id = :sid');
        $db->execute(array(':id' => $id,':sid' => $_SESSION['id']));
        
        $item = $db->fetch();       
        
        
        if($item['itemtype'] == 6){
            $db = $this->_db->_pdo->prepare('SELECT weapon,shield FROM user_equipment WHERE id = :sid');
            $db->execute(array(':sid' => $_SESSION['id']));           
            
            $owner = $db->fetch();
           
            if($owner['weapon'] == 0){
               $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET weapon = :id WHERE id = :sid');
               $db->execute(array(':id' => $id,':sid' => $_SESSION['id']));
               
            }
            else{
                if($owner['shield'] == 0){
                      $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET shield = :id WHERE id = :sid');
                      $db->execute(array(':id' => $id,':sid' => $_SESSION['id']));
                }else{
                        echo 'Nie mozesz zalozyc tego przedmiotu, sciagnij najpierw poprzednie !';
                       }
                    
                }
            }
          if($item['itemtype'] == 1){
              $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET helment = :id WHERE id = :sid');
              $db->execute(array(':id' => $id,':sid' => $_SESSION['id']));
          }
          if($item['itemtype'] == 2){
              $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET shoulder = :id WHERE id = :sid');
              $db->execute(array(':id' => $id,':sid' => $_SESSION['id']));
          }  
          if($item['itemtype'] == 3){
              $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET armor = :id WHERE id = :sid');
              $db->execute(array(':id' => $id,':sid' => $_SESSION['id']));
          }  
          if($item['itemtype'] == 4){
              $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET belt = :id WHERE id = :sid');
              $db->execute(array(':id' => $id,':sid' => $_SESSION['id']));
          }  
          if($item['itemtype'] == 5){
              $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET boots = :id WHERE id = :sid');
              $db->execute(array(':id' => $id,':sid' => $_SESSION['id']));
          }  
          if($item['itemtype'] == 7){
              $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET shield = :id WHERE id = :sid');
              $db->execute(array(':id' => $id,':sid' => $_SESSION['id']));
          }  
            
        }
        
    function unequipItem($itemtype){
         $db = $this->_db->_pdo->prepare('SELECT item_id FROM user_items WHERE item_id = :id AND owner_id = :sid');
        $db->execute(array(':id' => $id,':sid' => $_SESSION['id']));
        
        $item = $db->fetch();       
        
        if($itemtype == 'weapon'){     
               $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET weapon = :id WHERE id = :sid');
               $db->execute(array(':id' => 0,':sid' => $_SESSION['id']));
               echo "Kupa";
        }
        if($itemtype == 'shield'){     
               $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET shield = :id WHERE id = :sid');
               $db->execute(array(':id' => 0,':sid' => $_SESSION['id']));
        }
        if($itemtype == 'helment'){     
               $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET helment = :id WHERE id = :sid');
               $db->execute(array(':id' => 0,':sid' => $_SESSION['id']));
        }
        if($itemtype == 'shoulder'){     
               $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET shoulder = :id WHERE id = :sid');
               $db->execute(array(':id' => 0,':sid' => $_SESSION['id']));
        }
        if($itemtype == 'armor'){     
               $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET armor = :id WHERE id = :sid');
               $db->execute(array(':id' => 0,':sid' => $_SESSION['id']));
        }
        if($itemtype == 'belt'){     
               $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET belt = :id WHERE id = :sid');
               $db->execute(array(':id' => 0,':sid' => $_SESSION['id']));
        }
        if($itemtype == 'boots'){     
               $db = $this->_db->_pdo->prepare('UPDATE user_equipment SET boots = :id WHERE id = :sid');
               $db->execute(array(':id' => 0,':sid' => $_SESSION['id']));
        }       
            
                    
                
            
    }    
    

}
?>
