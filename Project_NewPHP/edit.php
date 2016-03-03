<?php
      include_once ('logs.php'); 
      include_once ('edit_article.php');
?>

<!DOCTYPE html>
<html>
    <head>
       <title>CN - Редактировать статью</title>
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
             

        <h1 style="padding:5px;margin-left:20px;margin-top:80px;">Редактировать статью:</h1>
             <hr class="main_line"/>
        <section class="article_list">
            <?php
            if ($errors==1){
            print "<b>При изменении произошли следующие ошибки:</b><br>";

             foreach($err AS $error)
             {
            print $error."<br/>";
             }
            }
              ?>
        <?php
if ((isset($loggedin))&&($_COOKIE['id']==$_GET['user'])){
  
$result=$mysqli->query("SELECT article_name, article_desc,article_content FROM article WHERE article_id='".$_GET['id']."'");
    $inform=mysqli_fetch_assoc($result);
    
    //------BB Коды
  
  
    
    echo '<form id="addreg" name="addnote" method="post" action="">
    <br/>
    
    <label>Название статьи<span style="color:red; font-size:15px;">*</span>:</label><br/>
    
    <input type="text" name="theme" id="theme" size="100" maxlength="100" class="reg_rows" placeholder="не менее 3 символов и не более 50" value="'.$inform['article_name'].'" pattern="[\sA-za-zА-Яа-я0-9?!@#$%^\&*\(\.~}|{+_)]{1,}">
                 <br/>
    
    <label>Краткое описание<span style="color:red; font-size:15px;">*</span>:</label><br/><br/>
    
   <textarea rows="6" name="desc" id="desc" cols="30" required style="width:800px;font-size:15px;padding:5px;" placeholder="не более 150 символов и не менее 10" pattern="[\sA-za-zА-Яа-я0-9?!@#$%^\&*\(\.~}|{+_)]{1,}">'.$inform['article_desc'].'</textarea>
   
                 <br/>
    <label>Содержание<span style="color:red; font-size:15px;">*</span>:</label><br/>
    ';
    ?><br/>
              <div class="bb_bar" >
                  
              
 <a  alt="img" style="margin-left:-61px;cursor: pointer;">Изображение</a>
 <a alt="video" style="cursor: pointer;">Видео</a> 
                  <a alt="audio" style="cursor: pointer;">Аудио</a>  
<a alt='url[=""]' style="cursor: pointer;">Ссылка</a>
<br/>
                   <a  alt="b" style="font-weight:bold;cursor: pointer;top:8px;margin-right:0px;margin-left:-60px;">Ж</a>
 <a alt="i" style="font-style:italic;cursor: pointer;top:8px;">К</a>
 <a  alt="u" style="text-decoration:underline;cursor: pointer;top:8px;">П</a>
 <a alt="l" style="cursor: pointer;top:8px;">По левому краю</a> 
                   <a alt="c" style="cursor: pointer;top:8px;">По центру</a>  
                   <a alt="r" style="cursor: pointer;top:8px;">По правому краю</a> 
                   <a alt="j" style="cursor: pointer;top:8px;">По ширине</a> 
                    <br/>
 <a alt="font" style="cursor: pointer;padding-right:260px;top:11px;">Тип шрифта</a>
<select size="1" name="font_mult" id="font_mult" style="top:8px;position:relative;z-index:3;left:-260px;top:11px;"> 
    <option value="Arial, Helvetica, sans-serif" style="font-family: Arial, Helvetica, sans-serif;font-size:15px;" selected>Arial/Пример</option>
    <option value="'Bookman Old Style', serif" style="font-family: 'Bookman Old Style', serif;font-size:15px;">Bookman Old Style/Пример</option>
    <option value="'Comic Sans MS', cursive" style="font-family: 'Comic Sans MS', cursive;font-size:15px;">Comic Sans MS/Пример</option>
    <option value="'Courier New', Courier, monospace" style="font-family: 'Courier New', Courier, monospace;font-size:15px;">Courier New/Пример</option>
    <option value="Garamond, serif" style="font-family: Garamond, serif;font-size:15px;">Garamond/Пример</option>
    <option value="Georgia, serif" style="font-family: Georgia, serif;font-size:15px;">Georgia/Пример</option>
    <option value="'Times New Roman', Times, serif" style="font-family: 'Times New Roman', Times, serif;font-size:15px;">Times New Roman/Пример</option>
    <option value="Impact, Charcoal, sans-serif" style="font-family: Impact, Charcoal, sans-serif;font-size:15px;">Impact/Пример</option>
    <option value="'Lucida Console', Monaco" style="font-family: 'Lucida Console', Monaco, monospace;font-size:15px;">Lucida Console/Пример</option>
    <option value="Tahoma, Geneva, sans-serif" style="font-family: Tahoma, Geneva, sans-serif;font-size:15px;">Tahoma/Пример</option>
    <option value="'Palatino Linotype', 'Book Antiqua', Palatino, serif" style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;, sans-serif;font-size:15px;">Palatino Linotype/Пример</option>
   </select>
 
                                   
 <a  alt="color" id="test" style="margin-left:-260px;padding-right:60px;cursor: pointer; top:11px;">Цвет шрифта</a>
    <input type="color" name="color" id="color" value="#000000" style="position:relative;left:-62px;z-index:3;top:11px;"/>
       <a alt="size"style="padding-right:112px;cursor: pointer;margin-left:-61px; top:11px;">Размер шрифта </a> 
                  <!--<input type="number" name="number" id="size" min="1" max="7" value="1" style="position:relative;left:-62px;z-index:3;top:11px;"/>-->
                 <select size="1" name="number" id="size" style="position:relative;left:-115px;z-index:3;top:11px;">
                  <option value="1" style="font-size:1em;">1.0em, Пример</option>
                  <option value="1.5" style="font-size:1.5em;">1,5em, Пример</option>
                <option value="2" style="font-size:2em;">2.0em, Пример</option>
                <option value="2.5" style="font-size:2.5em;">2.5em, Пример</option>
                  <option value="3.0" style="font-size:3em;">3.0em, Пример</option>
                      <option value="3.5" style="font-size:3.5em;">3.5em, Пример</option>
                  </select>     
</div>
      <br/>      <?php
    echo '<textarea rows="12" name="content" id="content" cols="30" required style="width:800px;font-size:15px;padding:5px;" placeholder="не более 5000 символов и не менее 150" >'.$inform['article_content'].'</textarea>
                 <br/>
                 
    <input type="submit" name="send" id="send" value="Отправить">
    </form>';

}
else {echo "Вы не обладаете правами для внесения изменений в данной статье";}
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