<?php
class Item {

    function __construct() {
       
    }
    
    public $_id;
    public $_prefix;
    public $_sufix;
    public $_base;
    public $_quality;
    public $_level;
    public $_race;
    public $_class;
    public $_strenght;
    public $_dexterity;
    public $_inteligence;
    public $_vitality;
    public $_apparence;
    public $_perception;
    public $_damage;
    public $_name;
    
    public function getDamage() {
        return $this->_damage;
    }

    public function setDamage($_damage) {
        $this->_damage = $_damage;
    }

        
    public function getName() {
        return $this->_name;
    }

    public function setName($_name) {
        $this->_name = $_name;
    }

        
    public function getId() {
        return $this->_id;
    }

    public function setId($_id) {
        $this->_id = $_id;
    }

    public function getPrefix() {
        return $this->_prefix;
    }

    public function setPrefix($_prefix) {
        $this->_prefix = $_prefix;
    }

    public function getSufix() {
        return $this->_sufix;
    }

    public function setSufix($_sufix) {
        $this->_sufix = $_sufix;
    }

    public function getBase() {
        return $this->_base;
    }

    public function setBase($_base) {
        $this->_base = $_base;
    }

    public function getQuality() {
        return $this->_quality;
    }

    public function setQuality($_quality) {
        $this->_quality = $_quality;
    }

    public function getLevel() {
        return $this->_level;
    }

    public function setLevel($_level) {
        $this->_level = $_level;
    }

    public function getRace() {
        return $this->_race;
    }

    public function setRace($_race) {
        $this->_race = $_race;
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
    
    public function getIdFromPost(){
        $this->_id = $_POST[item_id];
    }

    




}
?>
