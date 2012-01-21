<?php

if ($_GET['id']) {
    $Message = new Message();
    $Message->setNews($_GET['id'], $_SESSION['id']);
    $Message->_db->disconnect();

    include './views/news.php';
} else {
    if ($_GET['deleteid']) {
        $Message = new Message();
        $Message->deleteNews($_GET['deleteid'], $_SESSION['id']);
        $Message->_db->disconnect();
    } 
           
    if ($_GET['deleteall'] == 1){
        $Message = new Message();
        $Message->deleteAll();
        $Message->_db->disconnect();
    }
    
    if ($_GET['deleteall'] == 2){
        $Message = new Message();
        $Message->deleteAllReaded();
        $Message->_db->disconnect();
        
    }
    
        include './views/news_titles.php';
    
    
    
}
?>
