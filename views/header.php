<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="public/css.css" media="all" rel="stylesheet" type="text/css" />
    <link type="text/css" href="public/css/smoothness/jquery-ui-1.7.3.custom.css" rel="stylesheet" />
    <link href="public/jquery.tooltip.css" media="all" rel="stylesheet" type="text/css" />
    <link href="public/jquery.countdown.css" media="all" rel="stylesheet" type="text/css" />
     <script type="text/javascript" src="public/jquery-1.6.2.min.js"></script>   
      <script type="text/javascript" src="public/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="public/jquery.countdown.js"></script>
    
    
    <script type="text/javascript">
        <?php 
            $Character = new Character();
            $CharacterManager = new CharacterManager($Character);
            $CharacterManager->setCharacterData(0, 0);
            $CharacterManager->_db->disconnect();
            $Message = new Message;
            $Message->checkNews($_SESSION['id']);
            $Message->_db->disconnect();
       
            
                   
          
          ?>
 
//$(function() {
//$("#progressbar").progressbar({ value: , max: });
//setTimeout(updateProgress, 1000);
//});

$("#progressbar").attr("rel") 
parseInt($("#progressbar").attr("rel"))


$(document).ready(function () {
    
     $(".link3").live("click", function(){
              $('#content').load($(this).attr('alt'));
              $('#content').load('./game.php?action=news #news');
              
        });
    
    
    
  $("#progressbar").progressbar({
    value: parseInt($("#progressbar").attr("alt")),
    max: parseInt($("#progressbar").attr("alt2"))
    
  });
  setTimeout(updateProgress, 1000);
});
$(function() {
    $("#progressbar2").progressbar({ value: <?php echo $Character->getExperince()?>, max: <?php echo $Character->getNextLevel() ?>});
    
    
});

function updateProgress() {
  var progress;
  progress = $("#progressbar")
    .progressbar("option","value");
  if (progress > 0) {
      $("#progressbar")
        .progressbar("option", "value", progress - 1);
      setTimeout(updateProgress, 1000);
      
  }
  if(progress == 0){
      $('#content').load("game.php?action=travel #content");
  }
}

        
        
      
         

</script>
  </head>
  <body>
      
      <div id = "container">
      <div id = "logo">
          <div id="status" class="radius"><div id="miniavatar"></div>
          <b><?php echo $Character->getNick();?><div style="float:right;"><?php echo "".$Message->getUnreadNews()." wiadomości" ; ?></div><br>Doświadczenie:<div style="float:right;"> <?php echo $Character->getExperince()?> / <?php echo $Character->getNextLevel() ?></div> <div id="progressbar2" style="width:75%;height:30px"></div></div></b>
       
      </div>
      
      
      <div id="leftmenu" class="radius">
          <ul>
       <li> <a href ="./game.php?action=castle" alt ="tip"  >Pałac</a> </li>
       <li> <a href ="./game.php?action=fight" >Walka</a> </li>
       <li> <a href ="./game.php?action=travel" >Wyprawa</a> </li>
       <li> <a href ="./game.php?action=equipment" >Ekwipunek</a> </li>
      <li> <a href ="./game.php?action=news" >Wiadomości</a> </li>
      <li> <a href ="./game.php?action=rank" >Ranking</a> </li>
       <li> <a href ="./game.php?action=login" > Wyloguj</a> </li>
        </ul>
      </div>
       
         
      <div id = "content" class="radius">
          
         
      
       


          
