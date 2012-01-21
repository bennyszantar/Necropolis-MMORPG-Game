<?php
$Profile = new Profile();
$ProfileManager = new ProfileManager($Profile);
$ProfileManager->setProfile($_GET['id']);

$Character = new Character();
$CharacterManager = new CharacterManager($Character);
$CharacterManager->setCharacterData($_GET['id'], 0);


require './views/profile.php';

?>
