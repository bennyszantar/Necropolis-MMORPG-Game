<div class="loginbar">
<h1> Jesteś jednym z nas ? </h1>
<div class="hbar2">Witamy !</div>  
<?php
$FormDisplayer = new FormDisplayer();
$FormDisplayer->displayLoginForm();
?>
</div>
<div class="loginbar" style="float:right;">
<h2> Nie zaznałeś jeszcze smaku władzy, krwi i wojny ? <br><font color="red">Nie trać czasu - zarejestruj się !</font> </h2>
<?php $FormDisplayer->displayRegisterForm() ?>
</div>

