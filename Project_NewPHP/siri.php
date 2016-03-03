<?php
      include_once ('logs.php'); 
?>

<!DOCTYPE html>
<html>
    <head>
       <title>CN - Главная страница</title>
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
        
        <h1 style="padding:5px;margin-left:20px;margin-top:80px;">Введение в AI:</h1>
             <hr class="main_line"/>
        <section class="article_list">
            
            <div id="text" style="padding-left:70px; padding-right:70px;font-size:14pt;
                    font-family:Times New Roman;line-height: 1.5; text-align:justify; padding-bottom:50px;">
<!---text begin-->
<h2>Speech Interpretation and Recognition Interface <img align="right" src="Images/s1.png"></h2> <span style="color:red;"><b>Siri</b></span> — персональный помощник и вопросно-ответная система, адаптированная для <span style="color:purple"><b>iOS</b></span>. Данное приложение использует обработку естественной речи, чтобы отвечать на вопросы и давать рекомендации. <span style="color:red"><b>Siri</b></span> приспосабливается к каждому пользователю индивидуально, изучая его предпочтения в течение долгого времени.
Первоначально <span style="color:red"><b>Siri</b></span> стало доступно в <span style="color:purple"><b>App Store</b></span> как приложение для <span style="color:purple"><b>iOS</b></span> от <span style="color:purple"><b>Siri Inc</b></span>. Вскоре, <span style="color:green"><b>28 апреля 2010 года</b></span>, <span style="color:purple"><b>Siri Inc</b></span>. была приобретена <span style="color:purple"><b>Apple Inc</b></span>. Но ещё до того, как <span style="color:purple"><b>Apple</b></span> купила <span style="color:red"><b>Siri</b></span>, было объявлено, что их программное обеспечение будет доступно для телефонов <span style="color:purple"><b>BlackBerry</b></span> и телефонов под управлением <span style="color:purple"><b>Android</b></span>, затем эти планы были отменены из-за покупки.
Сейчас <span style="color:red"><b>Siri</b></span> — неотъемлемая часть <span style="color:purple"><b>iOS 5</b></span>, <span style="color:purple"><b>iOS 6</b></span> и доступна для <span style="color:purple"><b>iPhone 4S</b></span> и <span style="color:purple"><b>iPhone 5</b></span>. Также, <span style="color:red"><b>Siri</b></span> появилась в <span style="color:purple"><b>iPad</b></span> третьего и четвёртого поколений, <span style="color:purple"><b>iPad mini</b></span>, <span style="color:purple"><b>iPod touch</b></span> пятого поколения. Несмотря на это, хакеры смогли приспособить <font color="red"><b>Siri</b></font> для старых моделей <span style="color:purple"><b>iPhone</b></span>. <span style="color:green"><b>8 ноября 2011</b></span> <span style="color:purple"><b>Apple</b></span> публично заявила, что у неё нет планов на интеграцию <span style="color:red"><b>Siri</b></span> в старые модели <span style="color:purple"><b>iPhone</b></span>, в связи с отсутствием на них чипа фильтрации фонового шума.
        
<p/>
    <p/>
<img src="Images/spic.jpg">

             
             </div>
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