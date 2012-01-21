<?php
class CharacterManager {

    function __construct($character) {
        $this->_character = $character;

        $this->_db = new Database;
        $this->_db->connect();                      
    }
    
    function __destruct(){
        $this->_db->disconnect();
    }



    private $_character;
    
 
    public function render(){
        include './views/character.php';
    }

    public function upgradeStatistic($statistic, $how_much){

         
            $db = $this->_db->_pdo->prepare('UPDATE user_character SET '.$statistic.' = '.$statistic.' + :how_much WHERE id = :id');
            $db->execute(array(':how_much' => $how_much, ':id' => $this->_character->getIdFromSession()));

    }

    public function downgradeStatistic($statistic, $how_much){

           
            $db = $this->_db->_pdo->prepare('UPDATE user_character SET '.$statistic.' = '.$statistic.' - :how_much WHERE id = :id');
            $db->execute(array(':how_much' => $how_much, ':id' => $this->_character->getIdFromSession()));

    }
    
    public function upgradeStatisticByNick($statistic, $how_much, $nick){

         
            $db = $this->_db->_pdo->prepare('UPDATE user_character SET '.$statistic.' = '.$statistic.' + :how_much WHERE nick = :nick');
            $db->execute(array(':how_much' => $how_much, ':nick' => $nick ));

    }

    public function downgradeStatisticByNick($statistic, $how_much, $nick){

           
            $db = $this->_db->_pdo->prepare('UPDATE user_character SET '.$statistic.' = '.$statistic.' - :how_much WHERE nick = :nick');
            $db->execute(array(':how_much' => $how_much, ':nick' => $nick ));

    }
    
    public function getIdFromDatabase($id){
            $db = $this->_db->_pdo->prepare('SELECT id FROM user_character WHERE id = :id');
            $db->execute(array(':id' => $id));
            
            if($character = $db->fetch()){
                $this->_character->setId($character['id']);
            }
    }
    public function levelUp(){
        if($this->_character->_experince > $this->_character->_nextlevel){
            $this->upgradeStatistic('level', 1);
            $this->upgradeStatistic('nextlevel',$this->_character->_experince * 0.15);
            $this->upgradeStatistic('health',$this->_character->_health * 0.10);
            $this->upgradeStatistic('strenght',5);
            $this->upgradeStatistic('dexterity',5);
            $this->upgradeStatistic('inteligence',5);
            $this->upgradeStatistic('vitality',5);
            $this->upgradeStatistic('apparence',5);
            $this->upgradeStatistic('perception',5);
            
        }
        
    }
    
    public function setCharacterData($id,$nick){
        if($id == 0 && $nick == 0){
        
            try{
            
            
                
            
            $db = $this->_db->_pdo->prepare('SELECT * FROM user_character WHERE id = :id');
            $db->execute(array(':id' => $_SESSION['id']));

            if($character = $db->fetch()){
                    $this->_character->setNick($character['nick']);
                    $this->_character->setRace($character['race']);
                    $this->_character->setClass($character['class']);
                switch($character['race']){
                    case 'dwarf':
                        $this->_character->setDexterity($character['dexterity'] - ($character['dexterity'] * 0.20));
                        $this->_character->setHealth($character['health'] + ($character['health'] * 0.25));               
                        $this->_character->setInteligence($character['inteligence'] - ($character['inteligence'] * 0.15));
                        $this->_character->setVitality($character['vitality'] + $character['vitality'] * 0.20);
                        $this->_character->setApparence($character['apparence']);
                        $this->_character->setPerception($character['perception']);
                        $this->_character->setStrenght($character['strenght'] + ($character['strenght'] * 0.25));
                        break;
                    case 'elf':
                        $this->_character->setDexterity($character['dexterity'] + ($character['dexterity'] * 0.10));
                        $this->_character->setHealth($character['health'] - ($character['health'] * 0.15));               
                        $this->_character->setInteligence($character['inteligence'] + ($character['inteligence'] * 0.15));
                        $this->_character->setVitality($character['vitality'] - ($character['vitality'] * 0.10));
                        $this->_character->setApparence($character['apparence']);
                        $this->_character->setPerception($character['perception'] + ($characte['perception'] * 0.15));
                        $this->_character->setStrenght($character['strenght']) - ($character['strenght'] * 0.10);
                        break;
                    case 'human':
                        $this->_character->setDexterity($character['dexterity']);
                        $this->_character->setHealth($character['health'] + ($character['health'] * 0.05));               
                        $this->_character->setInteligence($character['inteligence'] + ($character['inteligence'] * 0.10));
                        $this->_character->setVitality($character['vitality']);
                        $this->_character->setApparence($character['apparence'] + ($character['apparence'] * 0.10));
                        $this->_character->setPerception($character['perception'] + ($characte['perception'] * 0.05));
                        $this->_character->setStrenght($character['strenght']);
                        break;
                    case 'darkelf':
                        $this->_character->setDexterity($character['dexterity'] + ($character['dexterity'] * 0.10));
                        $this->_character->setHealth($character['health'] - ($character['health'] * 0.15));               
                        $this->_character->setInteligence($character['inteligence'] + ($character['inteligence'] * 0.20));
                        $this->_character->setVitality($character['vitality'] - ($character['vitality'] * 0.10));
                        $this->_character->setApparence($character['apparence'] - ($character['apparence'] * 0.10));
                        $this->_character->setPerception($character['perception'] + ($characte['perception'] * 0.20));
                        $this->_character->setStrenght($character['strenght']) - ($character['strenght'] * 0.10);
                        break;
                    case 'lostdwarf':
                        $this->_character->setDexterity($character['dexterity'] - ($character['dexterity'] * 0.20));
                        $this->_character->setHealth($character['health'] + ($character['health'] * 0.30));               
                        $this->_character->setInteligence($character['inteligence'] - ($character['inteligence'] * 0.15));
                        $this->_character->setVitality($character['vitality'] + $character['vitality'] * 0.20);
                        $this->_character->setApparence($character['apparence'] - ($character['apparence'] * 0.20));
                        $this->_character->setPerception($character['perception']);
                        $this->_character->setStrenght($character['strenght'] + ($character['strenght'] * 0.30));
                        break;
                    case 'nekromancer':
                        $this->_character->setDexterity($character['dexterity']);
                        $this->_character->setHealth($character['health'] - ($character['health'] * 0.05));               
                        $this->_character->setInteligence($character['inteligence'] + ($character['inteligence'] * 0.30));
                        $this->_character->setVitality($character['vitality']);
                        $this->_character->setApparence($character['apparence'] - ($character['apparence'] * 0.20));
                        $this->_character->setPerception($character['perception'] - ($characte['perception'] * 0.05));
                        $this->_character->setStrenght($character['strenght']);
                                                                                                                 
                }
                 
                $this->_character->setExperince($character['experince']);
                $this->_character->setNextLevel($character['nextlevel']);
                $this->_character->setLevel($character['level']);
                $this->_character->setId($character['id']);
                $this->_character->setGold($character['gold']);
                
                
            }else{
                throw new Exception('Nie moge uaktualnic statystyk :(');
            }         
            }
            
            catch(Exception $error){
                echo 'Wystapil blad1:' . $error->getMessage();
            }            
            
            }
            if($nick != null && $id == 0){
                try{
            
            
                
            
            $db = $this->_db->_pdo->prepare('SELECT * FROM user_character WHERE nick = :nick');
            $db->execute(array(':nick' => $nick));

            if($character = $db->fetch()){
                   $this->_character->setNick($character['nick']);
                    $this->_character->setRace($character['race']);
                    $this->_character->setClass($character['class']);
                switch($character['race']){
                    case 'dwarf':
                        $this->_character->setDexterity($character['dexterity'] - ($character['dexterity'] * 0.20));
                        $this->_character->setHealth($character['health'] + ($character['health'] * 0.25));               
                        $this->_character->setInteligence($character['inteligence'] - ($character['inteligence'] * 0.15));
                        $this->_character->setVitality($character['vitality'] + $character['vitality'] * 0.20);
                        $this->_character->setApparence($character['apparence']);
                        $this->_character->setPerception($character['perception']);
                        $this->_character->setStrenght($character['strenght'] + ($character['strenght'] * 0.25));
                        break;
                    case 'elf':
                        $this->_character->setDexterity($character['dexterity'] + ($character['dexterity'] * 0.10));
                        $this->_character->setHealth($character['health'] - ($character['health'] * 0.15));               
                        $this->_character->setInteligence($character['inteligence'] + ($character['inteligence'] * 0.15));
                        $this->_character->setVitality($character['vitality'] - ($character['vitality'] * 0.10));
                        $this->_character->setApparence($character['apparence']);
                        $this->_character->setPerception($character['perception'] + ($characte['perception'] * 0.15));
                        $this->_character->setStrenght($character['strenght']) - ($character['strenght'] * 0.10);
                        break;
                    case 'human':
                        $this->_character->setDexterity($character['dexterity']);
                        $this->_character->setHealth($character['health'] + ($character['health'] * 0.05));               
                        $this->_character->setInteligence($character['inteligence'] + ($character['inteligence'] * 0.10));
                        $this->_character->setVitality($character['vitality']);
                        $this->_character->setApparence($character['apparence'] + ($character['apparence'] * 0.10));
                        $this->_character->setPerception($character['perception'] + ($characte['perception'] * 0.05));
                        $this->_character->setStrenght($character['strenght']);
                        break;
                    case 'darkelf':
                        $this->_character->setDexterity($character['dexterity'] + ($character['dexterity'] * 0.10));
                        $this->_character->setHealth($character['health'] - ($character['health'] * 0.15));               
                        $this->_character->setInteligence($character['inteligence'] + ($character['inteligence'] * 0.20));
                        $this->_character->setVitality($character['vitality'] - ($character['vitality'] * 0.10));
                        $this->_character->setApparence($character['apparence'] - ($character['apparence'] * 0.10));
                        $this->_character->setPerception($character['perception'] + ($characte['perception'] * 0.20));
                        $this->_character->setStrenght($character['strenght']) - ($character['strenght'] * 0.10);
                        break;
                    case 'lostdwarf':
                        $this->_character->setDexterity($character['dexterity'] - ($character['dexterity'] * 0.20));
                        $this->_character->setHealth($character['health'] + ($character['health'] * 0.30));               
                        $this->_character->setInteligence($character['inteligence'] - ($character['inteligence'] * 0.15));
                        $this->_character->setVitality($character['vitality'] + $character['vitality'] * 0.20);
                        $this->_character->setApparence($character['apparence'] - ($character['apparence'] * 0.20));
                        $this->_character->setPerception($character['perception']);
                        $this->_character->setStrenght($character['strenght'] + ($character['strenght'] * 0.30));
                        break;
                    case 'nekromancer':
                        $this->_character->setDexterity($character['dexterity']);
                        $this->_character->setHealth($character['health'] - ($character['health'] * 0.05));               
                        $this->_character->setInteligence($character['inteligence'] + ($character['inteligence'] * 0.30));
                        $this->_character->setVitality($character['vitality']);
                        $this->_character->setApparence($character['apparence'] - ($character['apparence'] * 0.20));
                        $this->_character->setPerception($character['perception'] - ($characte['perception'] * 0.05));
                        $this->_character->setStrenght($character['strenght']);
                                                                                                                 
                }
                 
                $this->_character->setExperince($character['experince']);
                $this->_character->setNextLevel($character['nextlevel']);
                $this->_character->setLevel($character['level']);
                $this->_character->setId($character['id']);
                $this->_character->setGold($character['gold']);
            }else{
                throw new Exception('Nie moge uaktualnic statystyk :(');
            }         
            }
            
            catch(Exception $error){
                echo 'Wystapil blad3:' . $error->getMessage();
            }          
            }
            
             if($nick == 0 && $id > 0){
                try{
            
            
                
            
            $db = $this->_db->_pdo->prepare('SELECT * FROM user_character WHERE id = :id');
            $db->execute(array(':id' => $id));

            if($character = $db->fetch()){
                   $this->_character->setNick($character['nick']);
                    $this->_character->setRace($character['race']);
                    $this->_character->setClass($character['class']);
                switch($character['race']){
                    case 'dwarf':
                        $this->_character->setDexterity($character['dexterity'] - ($character['dexterity'] * 0.20));
                        $this->_character->setHealth($character['health'] + ($character['health'] * 0.25));               
                        $this->_character->setInteligence($character['inteligence'] - ($character['inteligence'] * 0.15));
                        $this->_character->setVitality($character['vitality'] + $character['vitality'] * 0.20);
                        $this->_character->setApparence($character['apparence']);
                        $this->_character->setPerception($character['perception']);
                        $this->_character->setStrenght($character['strenght'] + ($character['strenght'] * 0.25));
                        break;
                    case 'elf':
                        $this->_character->setDexterity($character['dexterity'] + ($character['dexterity'] * 0.10));
                        $this->_character->setHealth($character['health'] - ($character['health'] * 0.15));               
                        $this->_character->setInteligence($character['inteligence'] + ($character['inteligence'] * 0.15));
                        $this->_character->setVitality($character['vitality'] - ($character['vitality'] * 0.10));
                        $this->_character->setApparence($character['apparence']);
                        $this->_character->setPerception($character['perception'] + ($characte['perception'] * 0.15));
                        $this->_character->setStrenght($character['strenght']) - ($character['strenght'] * 0.10);
                        break;
                    case 'human':
                        $this->_character->setDexterity($character['dexterity']);
                        $this->_character->setHealth($character['health'] + ($character['health'] * 0.05));               
                        $this->_character->setInteligence($character['inteligence'] + ($character['inteligence'] * 0.10));
                        $this->_character->setVitality($character['vitality']);
                        $this->_character->setApparence($character['apparence'] + ($character['apparence'] * 0.10));
                        $this->_character->setPerception($character['perception'] + ($characte['perception'] * 0.05));
                        $this->_character->setStrenght($character['strenght']);
                        break;
                    case 'darkelf':
                        $this->_character->setDexterity($character['dexterity'] + ($character['dexterity'] * 0.10));
                        $this->_character->setHealth($character['health'] - ($character['health'] * 0.15));               
                        $this->_character->setInteligence($character['inteligence'] + ($character['inteligence'] * 0.20));
                        $this->_character->setVitality($character['vitality'] - ($character['vitality'] * 0.10));
                        $this->_character->setApparence($character['apparence'] - ($character['apparence'] * 0.10));
                        $this->_character->setPerception($character['perception'] + ($characte['perception'] * 0.20));
                        $this->_character->setStrenght($character['strenght']) - ($character['strenght'] * 0.10);
                        break;
                    case 'lostdwarf':
                        $this->_character->setDexterity($character['dexterity'] - ($character['dexterity'] * 0.20));
                        $this->_character->setHealth($character['health'] + ($character['health'] * 0.30));               
                        $this->_character->setInteligence($character['inteligence'] - ($character['inteligence'] * 0.15));
                        $this->_character->setVitality($character['vitality'] + $character['vitality'] * 0.20);
                        $this->_character->setApparence($character['apparence'] - ($character['apparence'] * 0.20));
                        $this->_character->setPerception($character['perception']);
                        $this->_character->setStrenght($character['strenght'] + ($character['strenght'] * 0.30));
                        break;
                    case 'nekromancer':
                        $this->_character->setDexterity($character['dexterity']);
                        $this->_character->setHealth($character['health'] - ($character['health'] * 0.05));               
                        $this->_character->setInteligence($character['inteligence'] + ($character['inteligence'] * 0.30));
                        $this->_character->setVitality($character['vitality']);
                        $this->_character->setApparence($character['apparence'] - ($character['apparence'] * 0.20));
                        $this->_character->setPerception($character['perception'] - ($characte['perception'] * 0.05));
                        $this->_character->setStrenght($character['strenght']);
                                                                                                                 
                }
                 
                $this->_character->setExperince($character['experince']);
                $this->_character->setNextLevel($character['nextlevel']);
                $this->_character->setLevel($character['level']);
                $this->_character->setId($character['id']);
                $this->_character->setGold($character['gold']);
            }else{
                throw new Exception('Nie moge uaktualnic statystyk :(');
            }         
            }
            
            catch(Exception $error){
                echo 'Wystapil blad3:' . $error->getMessage();
            }          
            }
            
        }

        public function create(){
            $q = $this->_db->_pdo->prepare('INSERT INTO user_character VALUES(:id,:nick,:race,:class,10,10,10,10,10,10,1000,200,1000,1,0)');
            $q->execute(array(':id' => $this->_character->getIdFromSession(), ':nick' => $this->_character->getNick(), ':race' => $this->_character->getRace(), 'class' => $this->_character->getClass()));
        
        }

        public function display(){
            include './views/newcharacter.php';
        }
        
        public function showRank(){
            $q = $this->_db->_pdo->prepare('SELECT * FROM user_character ORDER BY experince DESC');
            $q->execute();
            $i=1;
            echo "<div id = character2>";
            while($data = $q->fetch()){
               echo $i .". " .$data['nick']." - ".$data['experince']." doświadczenia||<a href='./game.php?action=profile&id=".$data['id']."'>Profil</a><br>";
               $i++;
            }
            echo "</div>";
        }
        
   
}
?>
