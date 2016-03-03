<?php
      include_once ('logs.php'); 
      include_once ('clean_article.php');
?>

<!DOCTYPE html>
<html>
    <head>
       <title>CN - Добавить статью</title>
       <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="main.css" />
        
        <script src="jquery-2.1.4.js"></script>
        <script src="script.js">
        </script>
        
        
    </head>
    <body>
      
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
<!--только для зарегистрированных пользователей--->
             

        <h1 style="padding:5px;margin-left:20px;margin-top:80px;">Добавить статью:</h1>
             <hr class="main_line"/>
        <section class="article_list">
            <?php
            if ($errors==1){
            print "<b>При регистрации произошли следующие ошибки:</b><br>";

             foreach($err AS $error)
             {
            print $error."<br/>";
             }
            }
              ?>
        <?php
if (isset($loggedin)){
include_once('article_uni.html');
}
else {echo "Авторизуйтесь или пройдите регистрацию для того, чтобы добавить статью";}
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