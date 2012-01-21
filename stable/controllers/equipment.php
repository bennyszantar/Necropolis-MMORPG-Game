<?php
$Equipment = new Equipment;


if($_GET['itemid']){
    if($_GET['itemid']>0){
        $Equipment->equipItem($_GET['itemid']);
    }
}  
if($_GET['itemtype']){
        
        $Equipment->unequipItem($_GET['itemtype']);
    
}   
if($_GET['sellid']){
    $ItemManager = new ItemManager();
    $ItemManager->sell($_GET['sellid']);    
        
    echo "<div id='character2'>Sprzedano za 100 złota</div>";
    
}

if($_GET['sellid'] == -1){
    $ItemManager = new ItemManager();
    $ItemManager->sellAll();
    
    echo "<div id='character2'>Sprzedano wszystkie przedmioty</div>";
}
    

   include './views/equipment.php';



?>
