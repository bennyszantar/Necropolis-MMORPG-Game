<?php
$Character = new Character();
$CharacterManager = new CharacterManager($Character);
$CharacterManager->setCharacterData(0,0);
$Equipment = new Equipment();
$Equipment->addStatsToCharacter($Character);


include './views/castle.php';


?>
