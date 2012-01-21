<?php

class Fight {

    function __construct($Character1, $Character2) {
        $this->_character1 = $Character1;
        $this->_character2 = $Character2;
    }

    public function Fight() {




        $Equipment = new Equipment();

        $Equipment->addStatsToCharacter($this->_character1);
        $Equipment->addStatsToCharacter($this->_character2);
        $Equipment->getEquipedWeapons($this->_character1);
        $Equipment->getEquipedWeapons($this->_character2);
        $Equipment->_db->disconnect();
        $ch1attacks = 0;
        $ch2attacks = 0;
        $ch1weapon = 0;
        $ch2weapon = 0;
          echo '<div style="text-align:center;color:white;font-size:25px;">';
          echo 'Walka pomiędzy:<br> '.$this->_character1->_nick.' oraz '. $this->_character2->_nick;
          echo '</div>';
          echo '<div class="character">' . $this->_character1->_nick . '</div>  <div class="character">' . $this->_character2->_nick . '</div>';
         
        echo '<div id="fight">';
        while ($this->_character1->_health > 0 && $this->_character2->_health > 0) {





            if ($this->_character1->_perception + mt_rand(1, 800) > $this->_character2->_perception + mt_rand(1, 15) AND $ch1attacks > 0) {


                $ch1attacks--;
                if ($ch1weapon == 0 AND $this->_character1->otherhand == 0) {
                    $item = $this->_character1->weapon;
                    $itemdamage = $this->_character1->weapondamage;
                    $ch1weapon = 1;
                } else {
                    if($this->_character1->isshield == 1)
                    {
                    $item = $this->_character1->weapon;
                    $itemdamage = $this->_character1->weapondamage;   
                     $ch1weapon = 0;  
                    
                   
                    }else{
                       
                         if($this->_character1->otherhand == 1)
                             {
                                $item = $this->_character1->shield;
                                $itemdamage = $this->_character1->shielddamage;
                                $ch1weapon = 1;
                                
                             }else{
                                 
                            
                         $item = $this->_character1->shield;
                         $itemdamage = $this->_character1->shielddamage;
                         $ch1weapon = 0;
                         }
                        
                    }
                }

                if ($this->_character1->_health > 0) {
                    $content .= '<br>';
                    echo '<br>';

                    if (mt_rand(1, 100) - ($this->_character2->_dexterity - $this->_character1->_dexterity) > 30) {

                        $this->_character2->setHealth($this->_character2->_health - $dmg = ($this->_character1->_strenght + $itemdamage + mt_rand(1, 5)));
                        echo $this->_character1->_nick . ' uderza ' . $item . ' w ' . $this->_character2->_nick . ' i zadaje ' . $dmg . ' obrażeń ';
                        $content .= $this->_character1->_nick . ' uderza ' . $item . ' w ' . $this->_character2->_nick . ' i zadaje ' . $dmg . ' obrażeń ';
                    } else {
                        echo $this->_character1->_nick . ' atakuje ' . $this->_character2->_nick . ' ale nie trafia :( ';
                        $content .= $this->_character1->_nick . ' atakuje ' . $this->_character2->_nick . ' ale nie trafia :( ';
                        
                    }
                    
                    
                }
                if ($this->_character2->_health <= 0 && $this->_character1->_health > 0 AND $ch2attacks >= 0) {

                    $CharacterManager = new CharacterManager($this->_character2);
                    $CharacterManager->upgradeStatisticByNick('experince', $exp = 50 + mt_rand(1, 15), $this->_character1->_nick);
                    $CharacterManager->_db->disconnect();
                    echo '<br><hr>' . $this->_character1->_nick . ' wygrał i zdobył ' . $exp . ' doświadczenia !';
                    $content .= '<br>' . $this->_character1->_nick . ' wygrał i zdobył ' . $exp . ' doświadczenia !';
                    $Message = new Message();
                    $Message->newNews($_SESSION['id'],"Raport z walki !", $content); 
                    $Message->_db->disconnect();
                    
                    //$db = $this->_db->_pdo->prepare('INSERT INTO user_news VALUES(null,:id,:content,0,:title)');
                    //$db->execute(array(':id' => $_SESSION['id'],':title' => "Raport z walki !",':content' => $content));
                    
                    $Message = new Message();
                    $Message->newNews($this->_character2->_id,"Raport z walki !", $content); 
                    $Message->_db->disconnect();
                    
                    $Profile = new Profile();
                    $ProfileManager = new ProfileManager($Profile);
                    $ProfileManager->setProfile($this->_character1->_id);
                    $ProfileManager->updateProfile('wins', 1);
                    $ProfileManager->updateProfile('killstreak', 1);                                    
                    $ProfileManager->setProfile($this->_character2->_id);
                    $ProfileManager->updateProfile('loses', 1);
                    $ProfileManager->updateProfile('killstreak', 0);
                    $ProfileManager->_db->disconnect();
                    //$db = $this->_db->_pdo->prepare('INSERT INTO user_news VALUES(null,:id,:content,0,:title)');
                    //$db->execute(array(':id' => $this->_character2->_id,':title' => "Raport z walki !",':content' => $content));
                    
                }
            } else {

                
                if ($ch2attacks > 0) {
                   

                    $ch2attacks--;
                    if ($ch2weapon == 0 AND $this->_character2->otherhand == 0) {
                    $item2 = $this->_character2->weapon;
                    $item2damage = $this->_character2->weapondamage;
                    $ch2weapon = 1;
                } else {
                    if($this->_character2->isshield == 1)
                    {
                    $item2 = $this->_character2->weapon;
                     $item2damage = $this->_character2->weapondamage;   
                     $ch2weapon = 0;  
                   
                   
                    }else{
                       
                         if($this->_character2->otherhand == 1)
                             {
                                $item2 = $this->_character2->shield;
                                $item2damage = $this->_character2->shielddamage;
                                $ch2weapon = 1;
                                
                             }else{
                                 
                            
                         $item2 = $this->_character2->shield;
                         $item2damage = $this->_character2->shielddamage;
                         $ch2weapon = 0;
                         }
                        
                    }
                }
                    if ($this->_character2->_health > 0) {
                        echo '<span style="color:darkred">';
                        echo '<br>';
                        $content .= '<br>';
                        if (mt_rand(1, 100) - ($this->_character1->_dexterity - $this->_character2->_dexterity) > 30) {
                            $this->_character1->setHealth($this->_character1->_health - $dmg = ($this->_character2->_strenght + $item2damage +  mt_rand(1, 5)));
                            echo $this->_character2->_nick . ' uderza '.$item2 .' w '. $this->_character1->_nick . ' zadaje ' . $dmg . ' obrażeń ';
                            $content .= $this->_character2->_nick . ' uderza '.$item2 .' w '. $this->_character1->_nick . ' zadaje ' . $dmg . ' obrażeń ';
                        } else {
                            echo $this->_character2->_nick . ' atakuje ' . $this->_character1->_nick . ' ale nie trafia :( ';
                            $content .= $this->_character2->_nick . ' atakuje ' . $this->_character1->_nick . ' ale nie trafia :( '; 
                        }
                        echo '</span>';
                    }
                    if ($this->_character1->_health <= 0 && $this->_character2->_health > 0) {
                        $CharacterManager = new CharacterManager($this->_character1);
                        $CharacterManager->upgradeStatisticByNick('experince', $exp = 50 + mt_rand(1, 15), $this->_character2->_nick);
                        $CharacterManager->_db->disconnect();
                        echo '<br><hr>' . $this->_character2->_nick . ' wygrał i zdobył  ' . $exp . '  doświadczenia !';   
                        $content .= '<br>' . $this->_character2->_nick . ' wygrał i zdobył  ' . $exp . '  doświadczenia !';  
                        $Message = new Message();
                        $Message->newNews($_SESSION['id'],"Raport z walki !", $content); 
                        $Message->_db->disconnect();
                        
                        // $db = $this->_db->_pdo->prepare('INSERT INTO user_news VALUES(null,:id,:content,0,:title)');
                        // $db->execute(array(':id' => $_SESSION['id'],':title' => "Raport z walki !",':content' => $content));
                        
                        $Message = new Message();
                        $Message->newNews($this->_character2->_id,"Raport z walki !", $content); 
                        $Message->_db->disconnect();
                        
                        $Profile = new Profile();
                        $ProfileManager = new ProfileManager($Profile);
                        $ProfileManager->setProfile($this->_character2->_id);
                        $ProfileManager->updateProfile('wins', 1);
                        $ProfileManager->updateProfile('killstreak', 1);
                        $ProfileManager->setProfile($this->_character1->_id);
                        $ProfileManager->updateProfile('loses', 1);
                        $ProfileManager->updateProfile('killstreak', 0);
                        $ProfileManager->_db->disconnect();
                        // $db = $this->_db->_pdo->prepare('INSERT INTO user_news VALUES(null,:id,:content,0,:title)');
                        // $db->execute(array(':id' => $this->_character2->_id,':title' => "Raport z walki !",':content' => $content));
                        
                    }
                }
            }

            if ($ch1attacks <= 0 AND $ch2attacks <= 0) {
                $ch1attacks = 5;
                $ch2attacks = 5;
              
                
                $content .= '<hr>';
                echo '<hr>';
                echo $this->_character1->_nick . ' - ' . $this->_character1->_health . ' HP, ' . $this->_character2->_nick . ' - ' . $this->_character2->_health . ' HP<br>';
                $content .= $this->_character1->_nick . ' - ' . $this->_character1->_health . ' HP, ' . $this->_character2->_nick . ' - ' . $this->_character2->_health . ' HP<br>';             
                echo '<hr>';
                 $content .= '<hr>';
            }
        }
        echo '</div>';
    }

}

?>
