<?php 
$mysqli=mysqli_connect('localhost', 'root','','WebSite');
mb_internal_encoding("UTF-8");

if(isset($_POST['send_comms']))

{
    $err = array();
    
    if(!isset($_POST['comment']))

    {

        $err[] = "Комментарий не указан";
    }
    
    if(mb_strlen($_POST['comment']) < 2 or mb_strlen($_POST['comment']) > 500){
   $err[]="Объём комментария не соответствует требованиям: не более 50 символов и не менее 2";
    }
        
     if(count($err) == 0) {    
        
        $content=str_replace("<","&lt;",$_POST['comment']);
         if (isset($_POST['article_id_info'])){
        $article_id=$_POST['article_id_info'];
         } else {$article_id=222;}
        $user_id=intval($_COOKIE['id']);
        if (isset($_POST['answer_id'])){
        $answer=$_POST['answer_id'];//???
        } else {$answer=0;}
        $rdate=date('d.m.y в G:i:s'); 
        $errors=0;
        $result=$mysqli->query("INSERT INTO commentaries SET comms_article_id='".$article_id."', comms_user_id='".$user_id."', comms_content='".$content."', comms_date='".$rdate."', comms_answer_id='".$answer."'");
        
        
       header("Refresh:0");
     } else {$errors=1;}
    
}
?>