<?php
if (isset($loggedin)){
header("Location:redirect.php");exit;}
	  include_once('clean.php');
	  include_once ('logs.php');
?>

<!DOCTYPE html>
<html>
    <head>
       <title>CN - Регистрация</title>
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
    echo '<input style="margin-left:60px;" type="submit" value="Выйти" onclick="DelCookieMin1()">';
  }
?>
            
            </div>
            <div class="login_panel2" id="logblock2"></div>
            
            <!---Конец формы логина!--->
        </header>
        
    
        <main>
        
        <h1 style="padding:5px;margin-left:20px;margin-top:80px;">Регистрация:</h1>
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
            

<form id="addreg" name="addnote" method="post" action="">
<label>Логин<span style="color:red">*</span>:</label><br/><input type="text" name="login" id="login" size="30" class="reg_rows" maxlength="10" required autofocus pattern="[A-za-z]{1}[A-za-z0-9]{2,9}"><br/>
    
<label>Email<span style="color:red">*</span>:</label><br/><input type="text" name="email" id="email" size="30" class="reg_rows" maxlength="40" required pattern="^[A-za-z]{1,}[A-za-z0-9_-]*@{1}[A-za-z]{2,}[.]{1}[A-za-z]{2,}"><br/>
<label>Пароль<span style="color:red">*</span>:</label><br/><input name="password" type="password" size="30" class="reg_rows" maxlength="15" required pattern="[A-za-z0-9_-]{5,15}"><br/>
<label>Подтверждение пароля<span style="color:red">*</span>:</label><br/><input name="pass" type="password" size="30" class="reg_rows" maxlength="15" required pattern="[A-za-z0-9_-]{5,15}"><br/>

<input name="submit" type="submit" value="Отправить">
</form>


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