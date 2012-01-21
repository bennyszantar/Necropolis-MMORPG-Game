<?php

if($_POST){
    $ViewDisplayer = new ViewDisplayer();
    
    $User = new User($_POST['login'], $_POST['pass'], $_POST['email']);
    $UserManager = new UserManager($User);
    $UserManager->create();
    $ViewDisplayer->displayRegister();
    
}
else{
    $FormDisplayer = new FormDisplayer();
    $FormDisplayer->displayRegisterForm();
}
?>
