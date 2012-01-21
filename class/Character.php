<?php
class Character {

    function __construct() {

    }

    public $_nick;
    public $_race;
    public $_class;
    public $_strenght;
    public $_dexterity;
    public $_inteligence;
    public $_vitality;
    public $_apparence;
    public $_perception;
    public $_health;
    public $_id;
    public $_experince;
    public $_nextlevel;
    public $_level;
    public $_gold;
    
    public function getGold() {
        return $this->_gold;
    }

    public function setGold($_gold) {
        $this->_gold = $_gold;
    }

        
    public function setExperince($experince){
        $this->_experince = $experince;
    }

    public function getExperince(){
        return $this->_experince;
    }
    
    public function setNextLevel($nextlevel){
        $this->_nextlevel = $nextlevel;
    }

    public function getNextLevel(){
        return $this->_nextlevel;
    }
    
     public function setLevel($level){
        $this->_level = $level;
    }

    public function getLevel(){
        return $this->_level;
    }
    
    public function setId($id){
        $this->_id = $id;
    }

    public function getId(){
        return $this->_id;
    }

    public function getRace() {
        return $this->_race;
    }

    public function setStandardData($nick, $class, $race){
        $this->setClass($class);
        $this->setNick($nick);
        $this->setRace($race);

        }

    public function setRace($_race) {
        $this->_race = $_race;
    }


    public function getNick() {
        return $this->_nick;
    }

    public function setNick($_nick) {
        $this->_nick = $_nick;
    }

    public function getClass() {
        return $this->_class;
    }

    public function setClass($_class) {
        $this->_class = $_class;
    }

    public function getStrenght() {
        return $this->_strenght;
    }

    public function setStrenght($_strenght) {
        $this->_strenght = $_strenght;
    }

    public function getDexterity() {
        return $this->_dexterity;
    }

    public function setDexterity($_dexterity) {
        $this->_dexterity = $_dexterity;
    }

    public function getInteligence() {
        return $this->_inteligence;
    }

    public function setInteligence($_inteligence) {
        $this->_inteligence = $_inteligence;
    }

    public function getVitality() {
        return $this->_vitality;
    }

    public function setVitality($_vitality) {
        $this->_vitality = $_vitality;
    }

    public function getApparence() {
        return $this->_apparence;
    }

    public function setApparence($_apparence) {
        $this->_apparence = $_apparence;
    }

    public function getPerception() {
        return $this->_perception;
    }

    public function setPerception($_perception) {
        $this->_perception = $_perception;
    }

    public function getHealth() {
        return $this->_health;
    }

    public function setHealth($_health) {
        $this->_health = $_health;
    }

    public function getIdFromSession(){
        return $_SESSION['id'];
    }

    






    
}

?>
