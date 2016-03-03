<?php
      include_once ('logs.php'); 

if (isset($_POST["delete2"])&isset($_POST["article_info"])){
    $mysqli = new mysqli("localhost", "root", "", "WebSite");
    
    $result=$mysqli->query("DELETE FROM article WHERE article_id='".$_POST["article_info"]."'");
     $result=$mysqli->query("DELETE FROM commentaries WHERE comms_article_id='".$_POST["article_info"]."'");
} 
?>
<!DOCTYPE html>
<html>
    <head>
       <title>CN - Мои статьи</title>
       <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="main.css" />
        
        <script src="jquery-2.1.4.js"></script>
        <script src="script.js">
        </script>
        
        
    </head>
    <body>
      <div id="wrapbox" style="position:fixed;background-color:rgba(0, 0, 0, 0.69);width:100%;height:100%;z-index:3;">
          <div id="popupBlock" style="position:relative; top:40vh;left:60vh;width:400px;height:100px;background-color:#e7e7ea;color:black;padding-top:40px;text-align:center; box-shadow: 0 0 3px #383840;">Вы действительно хотите удалить данную статью?<br/>
              <form method="POST">
        <button class="popup" name="delete2" id="delete2">Удалить</button>
        <input type="hidden" name="article_info" id="article_info" value="">         
        <button class="popup" onClick="popUp()">Отмена</button>
              </form>
              
        </div>
        </div>
        <header class="page_header">
        
        <nav class="main_menu">
                <ul>
             <li><a href="index.php">Главная</a></li> 
             <li><a href="developer.php" >Разработка</a></li> 
             <li><a href="forum.php">Форум</a></li> 
             <li><a href="feedback.php">Обратная связь</a></li>
              </ul>
              
            </nav>
             <script type="text/javascript">highlight();</script>  
<!---Начало формы логина!--->
<?php
include_once ('check_login.php');
?>
            <div class="login_panel" id="logblock1">
            
 <?php
if (isset($err_col)){
echo '<span style="font-size:15px; color:red;">'.$err_col.'</span>';}
if (!isset($loggedin)){
include_once('log_uni.html');} 
   else
  {
    include_once('user_uni.php');
  }
?>
            
            </div>
            <div class="login_panel2" id="logblock2"></div>
            
            <!---Конец формы логина!--->
        </header>
        
    
        <main>
        
        <h1 style="padding:5px;margin-left:20px;margin-top:80px;">Мои статьи:</h1>
            <?php
if (isset($loggedin)){
            echo '<button type="button" onclick="teleport2()";>Добавить статью</button>';} else { echo "<script type='text/javascript'>window.location = 'index.php';</script>";}
            ?>
             <hr class="main_line"/>
        <section class="article_list">

<?php
if(isset($loggedin)){
$result=$mysqli->query("SELECT * FROM article WHERE article_creator='".$_COOKIE['id']."' ORDER BY article_id DESC");
$counter=1;

while($test=mysqli_fetch_assoc($result))
{
    $result2=$mysqli->query("SELECT user_login FROM users WHERE user_id='".$test['article_creator']."'");
$creator_login=mysqli_fetch_assoc($result2);
    
  echo "<input type='hidden' id='user_login_info".$test['article_creator']."' value='".$creator_login['user_login']."'/>";
    echo "<span onClick='show_me_user(".$test['article_creator'].")' class='counter_number'>".$counter.". Автор: <span style='color:#830000;'> ".$creator_login['user_login']."&nbsp</span></span><br/>";
     
    $counter++;


echo "<article><h3>".$test['article_name']."</h3>";
        
    echo "<button class='readbt' id='read' onClick='teleport4(".$test['article_id'].")'>Читать</button>";
    
      if($test['article_creator']==$_COOKIE['id']){
       
echo "<button class='edit' onClick='teleport3(".$test['article_id'].",".$test['article_creator'].")'>Редактировать</button>
     
     <button class='edit' id='delete' onClick='popUp(".$test['article_id'].")'>Удалить</button>";
    }
    echo "<br/>Описание: ".$test['article_desc']."<br/>"; 
    
       $result3=$mysqli->query("SELECT count(comms_id) FROM commentaries WHERE comms_article_id='".$test['article_id']."' AND comms_answer_id=0");
        $count=mysqli_fetch_array($result3);
    
    
    echo "<hr style='margin-left:-5px;border:1px solid #B8B8BF;box-shadow: 0px 0px 1px 1px rgba(0, 0, 0, 0.4);width:98%'/><p align='justify' style='margin:0px'>Комментарии:<span style='font-weight:bold;color:#830000;'>".$count[0]."</span><span style='padding-right:5px;'>.</span>";
    echo "Дата создания:<span style='font-weight:bold;color:#830000;'> ".$test['article_cdate']."</span><span style='padding-right:5px;'>.</span>";
    if (!empty($test['article_ndate'])){ 
        echo "Дата изменения:<span style='font-weight:bold;color:#830000;'> ".$test['article_ndate']."</span><span style='padding-right:5px;'>.</span>
       .</p>";}
    else echo "</p>";
//echo "<button class='readbt' id='read' onClick='teleport4(".$test['article_name'].")'>Читать</button>";
 //echo "<a class='readbt' id='read' href='".$test['article_address']."'>Читать</a>";
 
   echo "</article><br/>";   
}
    if ($counter==1){echo "Ваши публикации статей не найдены.";}

} else {echo "Зарегистрируйтесь на сайте для получения доступа к личному кабинету.";}
?>        
</section>
        
        </main>
        
        
        
        <footer class="page_footer">
            
            <div class="orient">
        <section class="mail">eugenious-yakovlev@yandex.ru</section>
        <section class="copyright"> © 2015—2016, Яковлев Евгений, гр.3321</section>
            </div>
            
        </footer>
        
         </body>
</html>