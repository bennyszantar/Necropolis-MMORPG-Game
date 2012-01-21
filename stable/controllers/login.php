<?php

    if($_POST){
        
        $ViewDisplayer = new ViewDisplayer;
       
        $User = new User($_POST['login'], md5($_POST['pass']), null) ;
        $UserAuthorisation = new UserAuthoristation($User);
        if($UserAuthorisation->Logon() == true){
            $UserAuthorisation->message = " Zostałeś zalogowany! ";
        }else{
            $UserAuthorisation->message = " Logowanie nieudane! ";
        }
        $Character = new Character($User->getId());
        $CharacterValidation = new CharacterValidation($Character);

         if($CharacterValidation->checkCharacterExists() == true){
                
         }else{
                $UserAuthorisation->message = "Najpierw musisz stworzyć postać ! <a href='./game.php?action=newcharacter'>Stwórz</a> ";
         }

        include './views/login.php';
      
        
    }else{
        
        $UserAuthorisation = new UserAuthoristation(0,0,null);
        $UserAuthorisation->Logout();
        $UserAuthorisation->message =  "Zostałeś wylogowany ! Do zobaczenia !";
        include './views/index.php';
    }
   
?>
