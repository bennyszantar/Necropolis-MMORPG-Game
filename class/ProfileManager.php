<?php
class ProfileManager {

    function __construct($profile) {
        $this->_profile = $profile;
        $this->_db = new Database();
        $this->_db->connect();
        
    }
    
    public function setProfile($id){
        $db = $this->_db->_pdo->prepare('SELECT * FROM user_profile WHERE id = :id');
        $db->execute(array(':id' => $id));
        
        $data = $db->fetch();
        $this->_profile->setWins($data['wins']);
        $this->_profile->setLoses($data['loses']);
        $this->_profile->setWintravels($data['wintravels']);
        $this->_profile->setLosetravels($data['losetravels']);
        $this->_profile->setDiscription($data['discription']);
        $this->_profile->setKillstreak($data['killstreak']);
        $this->_profile->setTravelstreak($data['travelstreak']);
        $this->_profile->setId($data['id']);
    }
    
    public function updateProfile($what,$howmuch){
        $db = $this->_db->_pdo->prepare('UPDATE user_profile SET '.$what.' = '.$what.' + :how_much WHERE id = :id');
        $db->execute(array(':how_much' => $howmuch, ':id' => $this->_profile->getId() ));
    }

}
?>
