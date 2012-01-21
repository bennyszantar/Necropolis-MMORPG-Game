<?php

class Profile {

    function __construct() {
        
    }

    public $wins;
    public $loses;
    public $wintravels;
    public $losetravels;
    public $discription;
    public $killstreak;
    public $travelstreak;
    public $id;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

        
    public function getWins() {
        return $this->wins;
    }

    public function setWins($wins) {
        $this->wins = $wins;
    }

    public function getLoses() {
        return $this->loses;
    }

    public function setLoses($loses) {
        $this->loses = $loses;
    }

    public function getWintravels() {
        return $this->wintravels;
    }

    public function setWintravels($wintravels) {
        $this->wintravels = $wintravels;
    }

    public function getLosetravels() {
        return $this->losetravels;
    }

    public function setLosetravels($losetravels) {
        $this->losetravels = $losetravels;
    }

    public function getDiscription() {
        return $this->discription;
    }

    public function setDiscription($discription) {
        $this->discription = $discription;
    }

    public function getKillstreak() {
        return $this->killstreak;
    }

    public function setKillstreak($killstreak) {
        $this->killstreak = $killstreak;
    }

    public function getTravelstreak() {
        return $this->travelstreak;
    }

    public function setTravelstreak($travelstreak) {
        $this->travelstreak = $travelstreak;
    }


    
}

?>
