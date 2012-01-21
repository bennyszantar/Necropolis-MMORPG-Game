<?php
class Travel {

    function __construct($id) {
        $this->setId($id);
    }
    
    private $_id;
    private $_time;
    private $_name;
    private $_minlimit;
    private $_statistic;
    private $_experince;
    private $_gold;
    
    public function getGold() {
        return $this->_gold;
    }

    public function setGold($_gold) {
        $this->_gold = $_gold;
    }

        
    public function getId() {
        return $this->_id;
    }

    public function setId($_id) {
        $this->_id = $_id;
    }

    public function getExperince() {
        return $this->_experince;
    }

    public function setExperince($_experince) {
        $this->_experince = $_experince;
    }

        
    public function getTime() {
        return $this->_time;
    }

    public function setTime($_time) {
        $this->_time = $_time;
    }

    public function getName() {
        return $this->_name;
    }

    public function setName($_name) {
        $this->_name = $_name;
    }

    public function getMinlimit() {
        return $this->_minlimit;
    }

    public function setMinlimit($_minlimit) {
        $this->_minlimit = $_minlimit;
    }

    public function getStatistic() {
        return $this->_statistic;
    }

    public function setStatistic($_statistic) {
        $this->_statistic = $_statistic;
    }

        
    

}
?>
