<?php
if($_POST){
    $ViewDisplayer = new ViewDisplayer();
 
    $Character = new Character();
    $Character->setStandardData($_POST['nick'],$_POST['class'],$_POST['race']);
    $CharacterManager = new CharacterManager($Character);
    $CharacterManager->create();
   
}
else{
    $ViewDisplayer = new ViewDisplayer();
  
    $ViewDisplayer->displayNewCharacter();
   
}

?>
