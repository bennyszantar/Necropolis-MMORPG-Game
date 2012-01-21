<?php
class Message {

    function __construct() {
        
        $this->_db = new Database;
        $this->_db->connect();      
    }

    function setUnreadNews($unreadnews){
        $this->unreadnews = $unreadnews;
    }
    function setNewsContent($newscontent){
        $this->newscontent = $newscontent;
    }
    function setNewsTitle($newstitle){
        $this->newstitle = $newstitle;
    }

    function getUnreadNews(){
        echo $this->unreadnews;
    }
    function getNewsContent(){
        echo $this->newscontent;
    }
    function getNewsTitle(){
        echo $this->newstitle;
    }

    function newNews($id, $title, $content){
        
        $db = $this->_db->_pdo->prepare('INSERT INTO user_news VALUES(null,:id,:content,0,:title)');
        $db->execute(array(':id' => $id,':title' => $title,':content' => $content));
        echo "cos";
    }

    function checkNews($id){
        
        $db = $this->_db->_pdo->prepare('SELECT `id` FROM user_news WHERE owner_id = :id AND `read` = 0');
        $db->execute(array(':id' => $id));      
        $this->setUnreadNews($db->rowCount());

         
    }

    function getNewsTitles($id,$how_much){
        
        $readed = $this->_db->_pdo->prepare('SELECT * FROM user_news WHERE owner_id=:id AND `read` = 1 ORDER BY id DESC ');
        $readed->execute(array(':id' => $id ));
        
       
        $unreaded = $this->_db->_pdo->prepare('SELECT * FROM user_news WHERE owner_id=:id AND `read` = 0 ORDER BY id DESC ');
        $unreaded->execute(array(':id' => $id ));
        
        $i = 1;
        while($dreaded = $readed->fetch()){
            $this->oldtitles[$i] = $dreaded['title'];
            $this->oldids[$i] = $dreaded['id'];
            $this->oldmaxtitles = $readed->rowCount();
            $i++;
        }
        $i = 1;
        while($dunreaded = $unreaded->fetch()){
            $this->newtitles[$i] = $dunreaded['title'];
            $this->newids[$i] = $dunreaded['id'];
            $this->newmaxtitles = $unreaded->rowCount();
            $i++;
        }
    }

    function setNews($news_id, $owner_id){       
        $readed = $this->_db->_pdo->prepare('SELECT * FROM user_news WHERE id = :news_id AND owner_id = :owner_id');
        $readed->execute(array(':owner_id' => $owner_id,':news_id' => $news_id));
        if($data = $readed->fetch() ){
           
            $this->setNewsContent($data['content']);
            $this->setNewsTitle($data['title']);         
            $news = $this->_db->_pdo->prepare('UPDATE user_news SET `read` = 1 WHERE id = :news_id AND owner_id = :owner_id');
            $news->execute(array(':owner_id' => $owner_id,':news_id' => $news_id));
        }


    }

    function deleteNews($news_id,$owner_id){
       
        $query = $this->_db->_pdo->prepare('DELETE FROM user_news WHERE id = :news_id AND owner_id = :owner_id LIMIT 1');
        $query->execute(array(':owner_id' => $owner_id,':news_id' => $news_id));
    }
    
    function deleteAll(){
       
        $query = $this->_db->_pdo->prepare('DELETE FROM user_news WHERE owner_id = :owner_id');
        $query->execute(array(':owner_id' => $_SESSION['id']));
    }
    function deleteAllReaded(){
       
        $query = $this->_db->_pdo->prepare('DELETE FROM user_news WHERE owner_id = :owner_id AND `read` = 1');
        $query->execute(array(':owner_id' => $_SESSION['id']));
    }

    function renderNewsTitles(){
        include './views/news_titles.php';
    }

    function renderNews(){
        include './views/news.php';
    }

}

?>
