<div class="hbar">Pałac</div>
<div id="character2" class="radius">
    <center><span class="castleh">Imię:</span> <?php echo $Character->getNick(); ?></center>
    <center><span class="castleh">Rasa:</span> <?php echo $Character->getRace(); ?></center>
    <center><span class="castleh">Klasa:</span> <?php echo $Character->getClass(); ?></center>
    <div style="text-align:center;"><img src="public/hero.png" width="200" height="300"></div>
Wyglad : <div class="toright"><?php echo $Character->getApparence();?></div>
<br>Sila : <div class="toright"><?php echo $Character->getStrenght();?></div>
<br>Zrecznosc : <div class="toright"><?php echo $Character->getDexterity();?></div>
<br>Inteligencja: <div class="toright"><?php echo $Character->getInteligence();?></div>
<br>Percepcja : <div class="toright"><?php echo $Character->getPerception();?></div>
<br>Zywotnosc : <div class="toright"><?php echo $Character->getVitality();?></div>
<hr>
<b>Punkty zycia : <div class="toright"><?php echo $Character->getHealth();?></b></div>
<br><b>Poziom : <div class="toright"><?php echo $Character->getLevel();?></b></div>
<br><b>Doswiadczenie : <div class="toright"><?php echo $Character->getExperince();?> / <?php echo $Character->getNextLevel();?></b></div>
<br><b>Złoto : <div class="toright"><?php echo $Character->getGold();?></b></div>
</div>

