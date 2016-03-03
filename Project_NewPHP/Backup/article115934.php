<?php
      include_once ('logs.php'); 
?>

<!DOCTYPE html>
<html>
    <head>
       <title>CN - Практическая работа №1. Основы HTML</title>
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
        
        <h1 style="padding:5px;margin-left:20px;margin-top:80px;">Практическая работа №1. Основы HTML:</h1>
             <hr class="main_line"/>
        <section class="article_list">
            
            <div id="text" style="padding-left:70px; padding-right:70px;font-size:14pt;
                    font-family:Times New Roman;line-height: 1.5; text-align:justify; padding-bottom:50px;">
<!---text begin--><map name="myMap">
<area href="javascript:history.back()" alt="Предудущая страница" title="Предыдущая страница" shape="rect" coords="0,40,104,136"/>
<area href="index.php" alt="Следующая страница" title="Главная страница" shape="rect" coords="105,0,249,134"/>
<area href="feedback.php" alt="Следующая страница" title="Следующая страница" shape="rect" coords="250,40,350,136"/>

</map>
<img src="Images/navigation_bar.gif" width="350" height="138" alt="карта" usemap="#myMap"/> 


<hr/>
<h6>Заголовок шестого уровня </h6>
 
<h5>Заголовок пятого уровня</h5> 
 
<h4>Заголовок четвертого уровня</h4> 
 
<h3>Заголовок третьего уровня</h3> 
 
<h2>Заголовок второго уровня</h2> 
 
<h1>Заголовок первого уровня</h1> 
 
<ins><h1>Основной текст</h1></ins> 
 
<p><code>Народная поговорка: </code><q>Тонко, да звонко, густо, да пусто. </q></p>

<h3><mark>Галикарнас</mark><em> (лат. Halicarnassus)</em> – <ins>древний город в Карии на <br/>
средиземноморском побережье Малой Азии. Основан греческими<br/> 
поселенцами. В настоящее время на его руинах располагается турецкий <br/>
город-курорт Бодрум. </ins></h3>

<h1><ins>Математические формулы</ins></h1> 
  

cos<small><sup>2</sup></small><var>x</var><small><sub>1</sub></small>-cos<small><sup>2</sup></small><var>x</var><small><sub>2</sub></small> = sin(<var>x</var><small><sub>1</sub></small>+<var>x</var><small><sub>2</sub></small>)*sin(<var>x</var><small><sub>1</sub></small>-<var>x</var><small><sub>2</sub></small>)<br/> 
cos(2<var>α</var>) = cos<small><sup>2</sup></small><var>α</var> - sin<small><sup>2</sup></small><var>α</var> = 1 - 2sin<small><sup>2</sup></small><var>α</var> <br/>
(log<var><small><sub>a</sub></small>x</var>)′ = 1/(<var>x</var>*ln<var>a</var>) <br/>

<div style="float: left;"><h1><ins>Ненумерованный список</ins>   </h1>
<ul><li><ins>Цвета схемы CMYK </ins><ul><li><em>Голубой</em> </li>
<li><em>Жёлтый</em></li>
<li><em>Малиновый</em></li>
<li><em>Чёрный</em></li></ul></li>
 <li><ins>Системы счисления</ins> <ul>
<li><em>Позиционные</em></li>
<li><em>Непозиционные</em></li></ul></li>
</ul> 
</div>

<div style="float:left">
<h1><ins> Нумерованный список</ins> </h1>
<ol><li><ins>Цвета схемы CMYK </ins><ol><li><em>Голубой </em></li>
<li><em>Жёлтый</em></li>
<li><em>Малиновый</em></li>
<li><em>Чёрный</em></li></ol></li>
 <li><ins>Системы счисления</ins><ol>
<li><em>Позиционные</em></li>
<li><em>Непозиционные</em></li></ol></li>
</ol>
<br/>
 </div>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<h1><ins>Форматирование текста</ins></h1> 
<table border="1" >
 
<tr>
<td rowspan=4>объединеие 1,2,3,4 строк;<br/>первый столбец</td>

 <td>первая строка<br/>второй столбец </td>
   <td>первая строка<br/>третий столбец </td>
  <td colspan=2>первая строка<br/> объединие 4,5 столбцов</td>
 </tr>

 <tr>

  <td>вторая строка<br/>второй столбец </td>
<td rowspan=3>объединеие 2,3,4 строк;<br/>третий столбец</td>
  
  <td>вторая строка<br/>четвёртый столбец </td>
  <td rowspan=2>объединеие 2,3, строк;<br/>пятый столбец</td>
 </tr>

 <tr>
<td rowspan=3>объединеие 3,4,5 строк;<br/>второй столбец</td>
  <td>третья строка<br/> четвёртый столбец </td>
  
 </tr>

 <tr>
  
  
 
  <td>четвёртая строка<br/> четвёртый столбец </td>
  <td>четвёртая строка<br/> пятый столбец </td>
 </tr>




 <tr>

  <td>пятая строка<br/>первый столбец </td>
 
  <td>пятая строка<br/>третий столбец </td>
 <td colspan=2>пятая строка<br/> объединие 4,5 столбцов</td>
 </tr>
 <tr>
  <td>шестая строка<br/>первый столбец </td>
    <td>шестая строка<br/>второй столбец </td>
   <td>шестая строка<br/>третий столбец </td>
  <td>шестая строка<br/>четвёртый столбец </td>
  <td>шестая строка<br/>пятый столбец </td>
 </tr>
</table>

<br/>
<hr/>

<h1><ins>Картинки в HTML5</ins></h1>
<img src="files/html_13.jpg" width="400" alt="im_failed"/>
 
 
 
<h1><ins>Аудио в HTML5</ins></h1> 
 <audio src="files/music.mp3" controls="controls"></audio>
<h1><ins>Видео в HTML5</ins></h1>
<video src="files/video.mp4" controls="controls" width="400"></video>
<br/>
<hr/>
<h1><ins>Пример HTML-документа</ins></h1>

<code>
&lt;!DOCTYPE html&gt; <br/>
&lt;html&gt; <br/>
 &lt;head&gt; <br/>
 &lt;meta charset="utf-8"&gt;<br/> 
 &lt;title&gt;Notepad++&lt;/title&gt; <br/>
 &lt;/head&gt; <br/>
 &lt;body&gt; <br/>
 &lt;h1&gt;Notepad++&lt;/h1&gt; <br/>
 &lt;b&gt;Notepad++&lt;/b&gt; - &lt;i&gt; свободный текстовый редактор&lt;/i&gt;, с открытым исходным 
кодом для Windows с подсветкой синтаксиса большого количества языков 
программирования и разметки. <br/>
 
 Основные возможности редактора: <br/>
 &lt;ul&gt; <br/>
 &lt;li&gt;Подсветка синтаксиса&lt;/li&gt; <br/>
 &lt;li&gt;Сворачивание кода&lt;/li&gt; <br/>
 &lt;li&gt;Автодополнение и автоматическое закрытие скобок и тэгов&lt;/li&gt; <br/>
 &lt;li&gt;Регулярные выражения для поиска и замены&lt;/li&gt; <br/>
 &lt;li&gt;Менеджер проектов&lt;/li&gt; <br/>
 &lt;li&gt;Карта документа&lt;/li&gt; <br/>
 &lt;/ul&gt; <br/>
 
 Скриншот программы &lt;em&gt;Notepad++&lt;/em&gt; <br/>
 &lt;img src="screenshot.jpg"&gt; <br/>
 &lt;/body&gt; <br/>
&lt;/html&gt; <br/>

</code> </div>
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