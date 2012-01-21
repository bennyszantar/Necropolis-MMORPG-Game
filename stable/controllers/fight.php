<?php
if($_POST){
    $Character1 = new Character();
    $Character2 = new Character();

    $CharacterManager1 = new CharacterManager($Character1);
    $CharacterManager1->setCharacterData(0,0);
    $CharacterManager1->_db->disconnect();
    $CharacterManager2 = new CharacterManager($Character2);
    $CharacterManager2->setCharacterData(0,$_POST['nick']);
    $CharacterManager2->_db->disconnect();

    $Fight = new Fight($Character1,$Character2);
    $Fight->Fight();
}else{
    include './views/fight.php';
    
}
?>
