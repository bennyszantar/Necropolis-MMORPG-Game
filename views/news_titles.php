<div id = "news">
    <div class="hbar">Powiadomienia <?php
    $Message = new Message;
    $Message->checkNews($_SESSION['id']);
    
    echo "".$Message->getUnreadNews()." nowych";
    ?> </div>
    <div id ="character2" style="font-size:15px">
    <a href ="./game.php?action=news&deleteall=1">Usuń wszystkie wiadomości</a> | <a href ="./game.php?action=news&deleteall=2">Usuń wszystkie przeczytane wiadomości</a> <br />      
    <?php
        $i = 1;
        $Message->getNewsTitles($_SESSION['id'], 10);
        echo "Nowe powiadomienia($Message->newmaxtitles)<br />";
        while($i <= $Message->newmaxtitles ){
             echo "<div class = message><a style='color:white;' href='game.php?action=news&id=".$Message->newids[$i]."'>".$Message->newtitles[$i]."</a></div>";
             $i++;
        }
        echo "Stare powiadomienia($Message->oldmaxtitles) <br />";
        $i = 1;
        while($i <= $Message->oldmaxtitles ){
            echo "<div class=message><a style='color:red' href='game.php?action=news&id=".$Message->oldids[$i]."'>".$Message->oldtitles[$i]."</a><span style='float:right;'><a href = 'game.php?action=news&deleteid=".$Message->oldids[$i]." #content''  alt='' >Usun</a></span></div>";
            $i++;
        }
        $Message->_db->disconnect();
    ?>
        </div>
</div>