<?php

class ItemGenerator {

    function __construct() {

        $this->_db = new Database;
        $this->_db->connect();
    }

    function __destruct() {
        $this->_db->disconnect();
    }

    public $Item;

    public function generateExistingItem($id) {

        $db = $this->_db->_pdo->prepare('SELECT prefix,base,sufix,itemtype FROM user_items WHERE item_id = :id');
        $db->execute(array(':id' => $id));


        if ($itemsid = $db->fetch()) {
            if ($itemsid['itemtype'] == 6) {

                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix WHERE id = :pref');
                $db->execute(array(':pref' => $itemsid['prefix']));

                $this->Item = new Item();
                $this->Item->setId($id);
                if ($item_prefix = $db->fetch()) {
                    $this->Item->setPrefix($item_prefix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_prefix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_prefix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_prefix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_prefix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_prefix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_prefix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_prefix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_prefix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_prefix['name']);
                } else {
                    
                }



                $db = $this->_db->_pdo->prepare('SELECT * FROM game_base WHERE id = :base');
                $db->execute(array(':base' => $itemsid['base']));

                if ($item_base = $db->fetch()) {
                    $this->Item->setBase($item_base['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_base['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_base['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_base['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_base['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_base['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_base['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_base['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_base['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_base['name']);
                } else {
                    
                }


                $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix WHERE id = :suf');
                $db->execute(array(':suf' => $itemsid['sufix']));




                if ($item_sufix = $db->fetch()) {
                    $this->Item->setSufix($item_sufix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_sufix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_sufix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_sufix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_sufix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_sufix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_sufix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_sufix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_sufix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_sufix['name']);
                } else {
                    
                }
            }
            if ($itemsid['itemtype'] == 1) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix_helment WHERE id = :pref');
                $db->execute(array(':pref' => $itemsid['prefix']));

                $this->Item = new Item();
                $this->Item->setId($id);
                if ($item_prefix = $db->fetch()) {
                    $this->Item->setPrefix($item_prefix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_prefix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_prefix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_prefix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_prefix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_prefix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_prefix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_prefix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_prefix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_prefix['name']);
                } else {
                    
                }



                $db = $this->_db->_pdo->prepare('SELECT * FROM game_base_helment WHERE id = :base');
                $db->execute(array(':base' => $itemsid['base']));

                if ($item_base = $db->fetch()) {
                    $this->Item->setBase($item_base['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_base['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_base['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_base['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_base['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_base['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_base['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_base['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_base['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_base['name']);
                } else {
                    
                }


                $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix_helment WHERE id = :suf');
                $db->execute(array(':suf' => $itemsid['sufix']));




                if ($item_sufix = $db->fetch()) {
                    $this->Item->setSufix($item_sufix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_sufix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_sufix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_sufix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_sufix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_sufix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_sufix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_sufix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_sufix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_sufix['name']);
                }
            }
            
            if ($itemsid['itemtype'] == 2) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix_shoulder WHERE id = :pref');
                $db->execute(array(':pref' => $itemsid['prefix']));

                $this->Item = new Item();
                $this->Item->setId($id);
                if ($item_prefix = $db->fetch()) {
                    $this->Item->setPrefix($item_prefix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_prefix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_prefix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_prefix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_prefix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_prefix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_prefix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_prefix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_prefix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_prefix['name']);
                } else {
                    
                }



                $db = $this->_db->_pdo->prepare('SELECT * FROM game_base_shoulder WHERE id = :base');
                $db->execute(array(':base' => $itemsid['base']));

                if ($item_base = $db->fetch()) {
                    $this->Item->setBase($item_base['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_base['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_base['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_base['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_base['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_base['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_base['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_base['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_base['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_base['name']);
                } else {
                    
                }


                $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix_shoulder WHERE id = :suf');
                $db->execute(array(':suf' => $itemsid['sufix']));




                if ($item_sufix = $db->fetch()) {
                    $this->Item->setSufix($item_sufix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_sufix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_sufix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_sufix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_sufix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_sufix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_sufix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_sufix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_sufix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_sufix['name']);
                }
            }
            
            if ($itemsid['itemtype'] == 3) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix_armor WHERE id = :pref');
                $db->execute(array(':pref' => $itemsid['prefix']));

                $this->Item = new Item();
                $this->Item->setId($id);
                if ($item_prefix = $db->fetch()) {
                    $this->Item->setPrefix($item_prefix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_prefix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_prefix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_prefix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_prefix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_prefix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_prefix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_prefix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_prefix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_prefix['name']);
                } else {
                    
                }



                $db = $this->_db->_pdo->prepare('SELECT * FROM game_base_armor WHERE id = :base');
                $db->execute(array(':base' => $itemsid['base']));

                if ($item_base = $db->fetch()) {
                    $this->Item->setBase($item_base['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_base['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_base['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_base['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_base['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_base['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_base['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_base['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_base['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_base['name']);
                } else {
                    
                }


                $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix_armor WHERE id = :suf');
                $db->execute(array(':suf' => $itemsid['sufix']));




                if ($item_sufix = $db->fetch()) {
                    $this->Item->setSufix($item_sufix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_sufix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_sufix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_sufix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_sufix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_sufix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_sufix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_sufix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_sufix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_sufix['name']);
                }
            }
            
            if ($itemsid['itemtype'] == 4) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix_belt WHERE id = :pref');
                $db->execute(array(':pref' => $itemsid['prefix']));

                $this->Item = new Item();
                $this->Item->setId($id);
                if ($item_prefix = $db->fetch()) {
                    $this->Item->setPrefix($item_prefix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_prefix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_prefix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_prefix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_prefix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_prefix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_prefix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_prefix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_prefix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_prefix['name']);
                } else {
                    
                }



                $db = $this->_db->_pdo->prepare('SELECT * FROM game_base_belt WHERE id = :base');
                $db->execute(array(':base' => $itemsid['base']));

                if ($item_base = $db->fetch()) {
                    $this->Item->setBase($item_base['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_base['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_base['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_base['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_base['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_base['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_base['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_base['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_base['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_base['name']);
                } else {
                    
                }


                $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix_belt WHERE id = :suf');
                $db->execute(array(':suf' => $itemsid['sufix']));




                if ($item_sufix = $db->fetch()) {
                    $this->Item->setSufix($item_sufix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_sufix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_sufix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_sufix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_sufix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_sufix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_sufix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_sufix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_sufix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_sufix['name']);
                }
            }
            
            if ($itemsid['itemtype'] == 5) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix_boots WHERE id = :pref');
                $db->execute(array(':pref' => $itemsid['prefix']));

                $this->Item = new Item();
                $this->Item->setId($id);
                if ($item_prefix = $db->fetch()) {
                    $this->Item->setPrefix($item_prefix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_prefix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_prefix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_prefix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_prefix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_prefix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_prefix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_prefix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_prefix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_prefix['name']);
                } else {
                    
                }



                $db = $this->_db->_pdo->prepare('SELECT * FROM game_base_boots WHERE id = :base');
                $db->execute(array(':base' => $itemsid['base']));

                if ($item_base = $db->fetch()) {
                    $this->Item->setBase($item_base['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_base['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_base['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_base['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_base['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_base['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_base['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_base['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_base['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_base['name']);
                } else {
                    
                }


                $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix_boots WHERE id = :suf');
                $db->execute(array(':suf' => $itemsid['sufix']));




                if ($item_sufix = $db->fetch()) {
                    $this->Item->setSufix($item_sufix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_sufix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_sufix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_sufix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_sufix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_sufix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_sufix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_sufix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_sufix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_sufix['name']);
                }
            }
            
            if ($itemsid['itemtype'] == 7) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix_shield WHERE id = :pref');
                $db->execute(array(':pref' => $itemsid['prefix']));

                $this->Item = new Item();
                $this->Item->setId($id);
                if ($item_prefix = $db->fetch()) {
                    $this->Item->setPrefix($item_prefix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_prefix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_prefix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_prefix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_prefix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_prefix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_prefix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_prefix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_prefix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_prefix['name']);
                } else {
                    
                }



                $db = $this->_db->_pdo->prepare('SELECT * FROM game_base_shield WHERE id = :base');
                $db->execute(array(':base' => $itemsid['base']));

                if ($item_base = $db->fetch()) {
                    $this->Item->setBase($item_base['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_base['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_base['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_base['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_base['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_base['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_base['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_base['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_base['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_base['name']);
                } else {
                    
                }


                $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix_shield WHERE id = :suf');
                $db->execute(array(':suf' => $itemsid['sufix']));




                if ($item_sufix = $db->fetch()) {
                    $this->Item->setSufix($item_sufix['id']);
                    $this->Item->setApparence($this->Item->_apparence + $item_sufix['apparence']);
                    $this->Item->setDexterity($this->Item->_dexterity + $item_sufix['dexterity']);
                    $this->Item->setInteligence($this->Item->_inteligence + $item_sufix['inteligence']);
                    $this->Item->setLevel($this->Item->_level + $item_sufix['level']);
                    $this->Item->setPerception($this->Item->_perception + $item_sufix['perception']);
                    $this->Item->setStrenght($this->Item->_strenght + $item_sufix['strenght']);
                    $this->Item->setVitality($this->Item->_vitality + $item_sufix['vitality']);
                    $this->Item->setDamage($this->Item->_damage + $item_sufix['damage']);
                    $this->Item->setName($this->Item->_name .= ' ' . $item_sufix['name']);
                }
            }
            
            
        }
    }

    public function generateNewItem() {
        $ready = 0;
        $rand = mt_rand(1, 7);
        if ($rand == 1 AND $ready == 0) {
            $ready = 1;
            

            $Item = new Item();

             if (mt_rand(1, 100) > 70) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix_helment WHERE id = ' . mt_rand(1, 1) . '');
                $db->execute();

                if ($item_prefix = $db->fetch()) {
                    $Item->setPrefix($item_prefix['id']);
                    $Item->setApparence($Item->_apparence + $item_prefix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_prefix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_prefix['inteligence']);
                    $Item->setLevel($Item->_level + $item_prefix['level']);
                    $Item->setPerception($Item->_perception + $item_prefix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_prefix['strenght']);
                    $Item->setDamage($Item->_damage + $item_prefix['damage']);
                    $Item->setVitality($Item->_vitality + $item_prefix['vitality']);
                   $this->Item = $Item->_name .= ' ' . $item_prefix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - prefix  :(');
                }
            } else {
                $Item->setPrefix(0);
            }

            $db = $this->_db->_pdo->prepare('SELECT * FROM game_base_helment WHERE id = ' . mt_rand(1, 1) . '');
            $db->execute();

            if ($item_base = $db->fetch()) {
                $Item->setBase($item_base['id']);
                $Item->setApparence($Item->_apparence + $item_base['apparence']);
                $Item->setDexterity($Item->_dexterity + $item_base['dexterity']);
                $Item->setInteligence($Item->_inteligence + $item_base['inteligence']);
                $Item->setLevel($Item->_level + $item_base['level']);
                $Item->setPerception($Item->_perception + $item_base['perception']);
                $Item->setStrenght($Item->_strenght + $item_base['strenght']);
                $Item->setDamage($Item->_damage + $item_base['damage']);
                $Item->setVitality($Item->_vitality + $item_base['vitality']);
                $this->Item = $Item->_name .= ' ' . $item_base['name'];
            } else {
                throw new Exception('Nie moge zbudowac przedmiotu - base  :(');
            }

           
            
             if (mt_rand(1, 100) > 70) {

                $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix_helment WHERE id = ' . mt_rand(1, 1) . '');
                 $db->execute(); 
                if ($item_sufix = $db->fetch()) {
                    $Item->setSufix($item_sufix['id']);
                    $Item->setApparence($Item->_apparence + $item_sufix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_sufix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_sufix['inteligence']);
                    $Item->setLevel($Item->_level + $item_sufix['level']);
                    $Item->setPerception($Item->_perception + $item_sufix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_sufix['strenght']);
                    $Item->setDamage($Item->_damage + $item_sufix['damage']);
                    $Item->setVitality($Item->_vitality + $item_sufix['vitality']);
                   $this->Item = $Item->_name .= ' ' . $item_sufix['name'];
                    
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - sufix  :(');
                }
            } else {
                $Item->setSufix(0);
            }
            
            $db = $this->_db->_pdo->prepare('INSERT INTO user_items VALUES(null,' . $Item->getPrefix() . ',' . $Item->getBase() . ',' . $Item->getSufix() . ',' . $_SESSION['id'] . ',1)');
            $db->execute();
        }
        if ($rand == 6 AND $ready == 0) {
            $ready = 1;
            
            $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix WHERE id = ' . mt_rand(1, 38) . '');
            $db->execute();

            $Item = new Item();

            if (mt_rand(1, 100) > 70) {


                if ($item_sufix = $db->fetch()) {
                    $Item->setSufix($item_sufix['id']);
                    $Item->setApparence($Item->_apparence + $item_sufix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_sufix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_sufix['inteligence']);
                    $Item->setLevel($Item->_level + $item_sufix['level']);
                    $Item->setPerception($Item->_perception + $item_sufix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_sufix['strenght']);
                    $Item->setDamage($Item->_damage + $item_sufix['damage']);
                    $Item->setVitality($Item->_vitality + $item_sufix['vitality']);
                    $this->Item = $Item->_name .= ' ' . $item_sufix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - sufix  :(');
                }
            } else {
                $Item->setSufix(0);
            }

            $db = $this->_db->_pdo->prepare('SELECT * FROM game_base WHERE id = ' . mt_rand(1, 32) . '');
            $db->execute();

            if ($item_base = $db->fetch()) {
                $Item->setBase($item_base['id']);
                $Item->setApparence($Item->_apparence + $item_base['apparence']);
                $Item->setDexterity($Item->_dexterity + $item_base['dexterity']);
                $Item->setInteligence($Item->_inteligence + $item_base['inteligence']);
                $Item->setLevel($Item->_level + $item_base['level']);
                $Item->setPerception($Item->_perception + $item_base['perception']);
                $Item->setStrenght($Item->_strenght + $item_base['strenght']);
                $Item->setDamage($Item->_damage + $item_base['damage']);
                $Item->setVitality($Item->_vitality + $item_base['vitality']);
                $this->Item = $Item->_name .= ' ' . $item_base['name'];
            } else {
                throw new Exception('Nie moge zbudowac przedmiotu - base  :(');
            }

            if (mt_rand(1, 100) > 70) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix WHERE id = ' . mt_rand(1, 18) . '');
                $db->execute();

                if ($item_prefix = $db->fetch()) {
                    $Item->setPrefix($item_prefix['id']);
                    $Item->setApparence($Item->_apparence + $item_prefix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_prefix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_prefix['inteligence']);
                    $Item->setLevel($Item->_level + $item_prefix['level']);
                    $Item->setPerception($Item->_perception + $item_prefix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_prefix['strenght']);
                    $Item->setDamage($Item->_damage + $item_prefix['damage']);
                    $Item->setVitality($Item->_vitality + $item_prefix['vitality']);
                    $this->Item = $Item->_name .= ' ' . $item_prefix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - prefix  :(');
                }
            } else {
                $Item->setPrefix(0);
            }
            
            
            
            
            $db = $this->_db->_pdo->prepare('INSERT INTO user_items VALUES(null,' . $Item->getPrefix() . ',' . $Item->getBase() . ',' . $Item->getSufix() . ',' . $_SESSION['id'] . ',6)');
            $db->execute();
        }
        
        if ($rand == 2 AND $ready == 0) {
            $ready = 1;
            
            $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix_shoulder WHERE id = ' . mt_rand(1, 1) . '');
            $db->execute();

            $Item = new Item();

            if (mt_rand(1, 100) > 70) {


                if ($item_sufix = $db->fetch()) {
                    $Item->setSufix($item_sufix['id']);
                    $Item->setApparence($Item->_apparence + $item_sufix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_sufix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_sufix['inteligence']);
                    $Item->setLevel($Item->_level + $item_sufix['level']);
                    $Item->setPerception($Item->_perception + $item_sufix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_sufix['strenght']);
                    $Item->setDamage($Item->_damage + $item_sufix['damage']);
                    $Item->setVitality($Item->_vitality + $item_sufix['vitality']);
                    $this->Item = $Item->_name .= ' ' . $item_sufix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - sufix  :(');
                }
            } else {
                $Item->setSufix(0);
            }

            $db = $this->_db->_pdo->prepare('SELECT * FROM game_base_shoulder WHERE id = ' . mt_rand(1, 1) . '');
            $db->execute();

            if ($item_base = $db->fetch()) {
                $Item->setBase($item_base['id']);
                $Item->setApparence($Item->_apparence + $item_base['apparence']);
                $Item->setDexterity($Item->_dexterity + $item_base['dexterity']);
                $Item->setInteligence($Item->_inteligence + $item_base['inteligence']);
                $Item->setLevel($Item->_level + $item_base['level']);
                $Item->setPerception($Item->_perception + $item_base['perception']);
                $Item->setStrenght($Item->_strenght + $item_base['strenght']);
                $Item->setDamage($Item->_damage + $item_base['damage']);
                $Item->setVitality($Item->_vitality + $item_base['vitality']);
                $this->Item = $Item->_name .= ' ' . $item_base['name'];
            } else {
                throw new Exception('Nie moge zbudowac przedmiotu - base  :(');
            }

            if (mt_rand(1, 100) > 70) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix_shoulder WHERE id = ' . mt_rand(1, 1) . '');
                $db->execute();

                if ($item_prefix = $db->fetch()) {
                    $Item->setPrefix($item_prefix['id']);
                    $Item->setApparence($Item->_apparence + $item_prefix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_prefix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_prefix['inteligence']);
                    $Item->setLevel($Item->_level + $item_prefix['level']);
                    $Item->setPerception($Item->_perception + $item_prefix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_prefix['strenght']);
                    $Item->setDamage($Item->_damage + $item_prefix['damage']);
                    $Item->setVitality($Item->_vitality + $item_prefix['vitality']);
                    $this->Item = $Item->_name .= ' ' . $item_prefix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - prefix  :(');
                }
            } else {
                $Item->setPrefix(0);
            }
            
            
            
            
            $db = $this->_db->_pdo->prepare('INSERT INTO user_items VALUES(null,' . $Item->getPrefix() . ',' . $Item->getBase() . ',' . $Item->getSufix() . ',' . $_SESSION['id'] . ',2)');
            $db->execute();
        }
        
        if ($rand == 3 AND $ready == 0) {
            $ready = 1;
            
            $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix_armor WHERE id = ' . mt_rand(1,1) . '');
            $db->execute();

            $Item = new Item();

            if (mt_rand(1, 100) > 70) {


                if ($item_sufix = $db->fetch()) {
                    $Item->setSufix($item_sufix['id']);
                    $Item->setApparence($Item->_apparence + $item_sufix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_sufix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_sufix['inteligence']);
                    $Item->setLevel($Item->_level + $item_sufix['level']);
                    $Item->setPerception($Item->_perception + $item_sufix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_sufix['strenght']);
                    $Item->setDamage($Item->_damage + $item_sufix['damage']);
                    $Item->setVitality($Item->_vitality + $item_sufix['vitality']);
                    $this->Item = $Item->_name .= ' ' . $item_sufix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - sufix  :(');
                }
            } else {
                $Item->setSufix(0);
            }

            $db = $this->_db->_pdo->prepare('SELECT * FROM game_base_armor WHERE id = ' . mt_rand(1, 1) . '');
            $db->execute();

            if ($item_base = $db->fetch()) {
                $Item->setBase($item_base['id']);
                $Item->setApparence($Item->_apparence + $item_base['apparence']);
                $Item->setDexterity($Item->_dexterity + $item_base['dexterity']);
                $Item->setInteligence($Item->_inteligence + $item_base['inteligence']);
                $Item->setLevel($Item->_level + $item_base['level']);
                $Item->setPerception($Item->_perception + $item_base['perception']);
                $Item->setStrenght($Item->_strenght + $item_base['strenght']);
                $Item->setDamage($Item->_damage + $item_base['damage']);
                $Item->setVitality($Item->_vitality + $item_base['vitality']);
                $this->Item = $Item->_name .= ' ' . $item_base['name'];
            } else {
                throw new Exception('Nie moge zbudowac przedmiotu - base  :(');
            }

            if (mt_rand(1, 100) > 70) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix_armor WHERE id = ' . mt_rand(1, 1) . '');
                $db->execute();

                if ($item_prefix = $db->fetch()) {
                    $Item->setPrefix($item_prefix['id']);
                    $Item->setApparence($Item->_apparence + $item_prefix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_prefix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_prefix['inteligence']);
                    $Item->setLevel($Item->_level + $item_prefix['level']);
                    $Item->setPerception($Item->_perception + $item_prefix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_prefix['strenght']);
                    $Item->setDamage($Item->_damage + $item_prefix['damage']);
                    $Item->setVitality($Item->_vitality + $item_prefix['vitality']);
                    $this->Item = $Item->_name .= ' ' . $item_prefix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - prefix  :(');
                }
            } else {
                $Item->setPrefix(0);
            }
            
            
            
            
            $db = $this->_db->_pdo->prepare('INSERT INTO user_items VALUES(null,' . $Item->getPrefix() . ',' . $Item->getBase() . ',' . $Item->getSufix() . ',' . $_SESSION['id'] . ',3)');
            $db->execute();
        }
        
        if ($rand == 4 AND $ready == 0) {
            $ready = 1;
            
            $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix_belt WHERE id = ' . mt_rand(1, 1) . '');
            $db->execute();

            $Item = new Item();

            if (mt_rand(1, 100) > 70) {


                if ($item_sufix = $db->fetch()) {
                    $Item->setSufix($item_sufix['id']);
                    $Item->setApparence($Item->_apparence + $item_sufix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_sufix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_sufix['inteligence']);
                    $Item->setLevel($Item->_level + $item_sufix['level']);
                    $Item->setPerception($Item->_perception + $item_sufix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_sufix['strenght']);
                    $Item->setDamage($Item->_damage + $item_sufix['damage']);
                    $Item->setVitality($Item->_vitality + $item_sufix['vitality']);
                    $this->Item = $Item->_name .= ' ' . $item_sufix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - sufix  :(');
                }
            } else {
                $Item->setSufix(0);
            }

            $db = $this->_db->_pdo->prepare('SELECT * FROM game_base_belt WHERE id = ' . mt_rand(1, 1) . '');
            $db->execute();

            if ($item_base = $db->fetch()) {
                $Item->setBase($item_base['id']);
                $Item->setApparence($Item->_apparence + $item_base['apparence']);
                $Item->setDexterity($Item->_dexterity + $item_base['dexterity']);
                $Item->setInteligence($Item->_inteligence + $item_base['inteligence']);
                $Item->setLevel($Item->_level + $item_base['level']);
                $Item->setPerception($Item->_perception + $item_base['perception']);
                $Item->setStrenght($Item->_strenght + $item_base['strenght']);
                $Item->setDamage($Item->_damage + $item_base['damage']);
                $Item->setVitality($Item->_vitality + $item_base['vitality']);
                $this->Item = $Item->_name .= ' ' . $item_base['name'];
            } else {
                throw new Exception('Nie moge zbudowac przedmiotu - base  :(');
            }

            if (mt_rand(1, 100) > 70) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix_belt WHERE id = ' . mt_rand(1,1) . '');
                $db->execute();

                if ($item_prefix = $db->fetch()) {
                    $Item->setPrefix($item_prefix['id']);
                    $Item->setApparence($Item->_apparence + $item_prefix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_prefix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_prefix['inteligence']);
                    $Item->setLevel($Item->_level + $item_prefix['level']);
                    $Item->setPerception($Item->_perception + $item_prefix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_prefix['strenght']);
                    $Item->setDamage($Item->_damage + $item_prefix['damage']);
                    $Item->setVitality($Item->_vitality + $item_prefix['vitality']);
                    $this->Item = $Item->_name .= ' ' . $item_prefix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - prefix  :(');
                }
            } else {
                $Item->setPrefix(0);
            }
            
            
            
            
            $db = $this->_db->_pdo->prepare('INSERT INTO user_items VALUES(null,' . $Item->getPrefix() . ',' . $Item->getBase() . ',' . $Item->getSufix() . ',' . $_SESSION['id'] . ',4)');
            $db->execute();
        }
        
        if ($rand == 5 AND $ready == 0) {
            $ready = 1;
            
            $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix_boots WHERE id = ' . mt_rand(1, 1) . '');
            $db->execute();

            $Item = new Item();

            if (mt_rand(1, 100) > 70) {


                if ($item_sufix = $db->fetch()) {
                    $Item->setSufix($item_sufix['id']);
                    $Item->setApparence($Item->_apparence + $item_sufix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_sufix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_sufix['inteligence']);
                    $Item->setLevel($Item->_level + $item_sufix['level']);
                    $Item->setPerception($Item->_perception + $item_sufix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_sufix['strenght']);
                    $Item->setDamage($Item->_damage + $item_sufix['damage']);
                    $Item->setVitality($Item->_vitality + $item_sufix['vitality']);
                    $this->Item = $Item->_name .= ' ' . $item_sufix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - sufix  :(');
                }
            } else {
                $Item->setSufix(0);
            }

            $db = $this->_db->_pdo->prepare('SELECT * FROM game_base_boots WHERE id = ' . mt_rand(1,1) . '');
            $db->execute();

            if ($item_base = $db->fetch()) {
                $Item->setBase($item_base['id']);
                $Item->setApparence($Item->_apparence + $item_base['apparence']);
                $Item->setDexterity($Item->_dexterity + $item_base['dexterity']);
                $Item->setInteligence($Item->_inteligence + $item_base['inteligence']);
                $Item->setLevel($Item->_level + $item_base['level']);
                $Item->setPerception($Item->_perception + $item_base['perception']);
                $Item->setStrenght($Item->_strenght + $item_base['strenght']);
                $Item->setDamage($Item->_damage + $item_base['damage']);
                $Item->setVitality($Item->_vitality + $item_base['vitality']);
                $this->Item = $Item->_name .= ' ' . $item_base['name'];
            } else {
                throw new Exception('Nie moge zbudowac przedmiotu - base  :(');
            }

            if (mt_rand(1, 100) > 70) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix_boots WHERE id = ' . mt_rand(1, 1) . '');
                $db->execute();

                if ($item_prefix = $db->fetch()) {
                    $Item->setPrefix($item_prefix['id']);
                    $Item->setApparence($Item->_apparence + $item_prefix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_prefix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_prefix['inteligence']);
                    $Item->setLevel($Item->_level + $item_prefix['level']);
                    $Item->setPerception($Item->_perception + $item_prefix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_prefix['strenght']);
                    $Item->setDamage($Item->_damage + $item_prefix['damage']);
                    $Item->setVitality($Item->_vitality + $item_prefix['vitality']);
                    $this->Item = $Item->_name .= ' ' . $item_prefix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - prefix  :(');
                }
            } else {
                $Item->setPrefix(0);
            }
            
            
            
            
            $db = $this->_db->_pdo->prepare('INSERT INTO user_items VALUES(null,' . $Item->getPrefix() . ',' . $Item->getBase() . ',' . $Item->getSufix() . ',' . $_SESSION['id'] . ',5)');
            $db->execute();
        }
        
        if ($rand == 7 AND $ready == 0) {
            $ready = 1;
            
            $db = $this->_db->_pdo->prepare('SELECT * FROM game_sufix_shield WHERE id = ' . mt_rand(1, 1) . '');
            $db->execute();

            $Item = new Item();

            if (mt_rand(1, 100) > 70) {


                if ($item_sufix = $db->fetch()) {
                    $Item->setSufix($item_sufix['id']);
                    $Item->setApparence($Item->_apparence + $item_sufix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_sufix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_sufix['inteligence']);
                    $Item->setLevel($Item->_level + $item_sufix['level']);
                    $Item->setPerception($Item->_perception + $item_sufix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_sufix['strenght']);
                    $Item->setDamage($Item->_damage + $item_sufix['damage']);
                    $Item->setVitality($Item->_vitality + $item_sufix['vitality']);
                    $this->Item = $Item->_name .= ' ' . $item_sufix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - sufix  :(');
                }
            } else {
                $Item->setSufix(0);
            }

            $db = $this->_db->_pdo->prepare('SELECT * FROM game_base_shield WHERE id = ' . mt_rand(1, 1) . '');
            $db->execute();

            if ($item_base = $db->fetch()) {
                $Item->setBase($item_base['id']);
                $Item->setApparence($Item->_apparence + $item_base['apparence']);
                $Item->setDexterity($Item->_dexterity + $item_base['dexterity']);
                $Item->setInteligence($Item->_inteligence + $item_base['inteligence']);
                $Item->setLevel($Item->_level + $item_base['level']);
                $Item->setPerception($Item->_perception + $item_base['perception']);
                $Item->setStrenght($Item->_strenght + $item_base['strenght']);
                $Item->setDamage($Item->_damage + $item_base['damage']);
                $Item->setVitality($Item->_vitality + $item_base['vitality']);
                $this->Item = $Item->_name .= ' ' . $item_base['name'];
            } else {
                throw new Exception('Nie moge zbudowac przedmiotu - base  :(');
            }

            if (mt_rand(1, 100) > 70) {
                $db = $this->_db->_pdo->prepare('SELECT * FROM game_prefix_shield WHERE id = ' . mt_rand(1, 1) . '');
                $db->execute();

                if ($item_prefix = $db->fetch()) {
                    $Item->setPrefix($item_prefix['id']);
                    $Item->setApparence($Item->_apparence + $item_prefix['apparence']);
                    $Item->setDexterity($Item->_dexterity + $item_prefix['dexterity']);
                    $Item->setInteligence($Item->_inteligence + $item_prefix['inteligence']);
                    $Item->setLevel($Item->_level + $item_prefix['level']);
                    $Item->setPerception($Item->_perception + $item_prefix['perception']);
                    $Item->setStrenght($Item->_strenght + $item_prefix['strenght']);
                    $Item->setDamage($Item->_damage + $item_prefix['damage']);
                    $Item->setVitality($Item->_vitality + $item_prefix['vitality']);
                    $this->Item = $Item->_name .= ' ' . $item_prefix['name'];
                } else {
                    throw new Exception('Nie moge zbudowac przedmiotu - prefix  :(');
                }
            } else {
                $Item->setPrefix(0);
            }
            
            
            
            
            $db = $this->_db->_pdo->prepare('INSERT INTO user_items VALUES(null,' . $Item->getPrefix() . ',' . $Item->getBase() . ',' . $Item->getSufix() . ',' . $_SESSION['id'] . ',7)');
            $db->execute();
        }
    }

}

?>
