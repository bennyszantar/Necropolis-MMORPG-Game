<div id="character2">
<hr>

<center><span class="castleh">Imię:</span> <?php echo $Character->getNick(); ?></center>
    <center><span class="castleh">Rasa:</span> <?php echo $Character->getRace(); ?></center>
    <center><span class="castleh">Klasa:</span> <?php echo $Character->getClass(); ?></center>
<hr>
Wygrane walki: <?php echo $Profile->getWins()?><br>
Przegrane walki: <?php echo $Profile->getLoses()?><br>
Udane wyprawy: <?php echo $Profile->getWintravels()?><br>
Nieudane wyprawy: <?php echo $Profile->getLosetravels()?><br>
Opis: <?php echo $Profile->getDiscription()?><br>
Wygrane walki pod rząd: <?php echo $Profile->getKillstreak()?><br>
Udane wyprawy pod rząd: <?php echo $Profile->getTravelstreak()?><br>



</br></div>
