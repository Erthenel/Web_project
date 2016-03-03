<?php
      include_once ('logs.php'); 
      include_once ('add_comms.php'); 

$result=$mysqli->query("SELECT * FROM article WHERE article_id='".$_GET["id"]."'");
    $show=mysqli_fetch_assoc($result);

if (isset($_POST["delete2"])&isset($_POST["comment_info"])){
    $mysqli = new mysqli("localhost", "root", "", "WebSite");

  $result=$mysqli->query("DELETE FROM commentaries WHERE comms_id='".$_POST["comment_info"]."'");
      $result=$mysqli->query("DELETE FROM commentaries WHERE comms_answer_id='".$_POST["comment_info"]."'");
} 

if (isset($_POST["delete2"])&isset($_POST["article_info"])&($_POST["article_info"]!="")){
    $mysqli = new mysqli("localhost", "root", "", "WebSite");
    
    $result=$mysqli->query("DELETE FROM article WHERE article_id='".$_POST["article_info"]."'");
     $result=$mysqli->query("DELETE FROM commentaries WHERE comms_article_id='".$_POST["article_info"]."'");
    header('Location:index.php');
} 

?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
       <title>CN - <?php  
          
           echo $show['article_name'];
        ?>
           </title>
       <meta charset="utf-8">
    
    <link rel="stylesheet" type="text/css" href="main.css" />
        
        <script src="jquery-2.1.4.js"></script>
        <script src="script.js">
        </script>
        <script src="Hyphenator.js">
        </script> 
        
    </head>
    <body>
        <div id="wrapbox" style="position:fixed;background-color:rgba(0, 0, 0, 0.69);width:100%;height:100%;z-index:3;">
          <div id="popupBlock" style="position:relative; top:40vh;left:60vh;width:400px;height:100px;background-color:#e7e7ea;color:black;padding-top:40px;text-align:center; box-shadow: 0 0 3px #383840;">Вы действительно хотите удалить данную запись?<br/>
              <form method="POST">
        <button class="popup" name="delete2" id="delete2">Удалить</button>
     <input type="hidden" name="article_info" id="article_info" value="">  
    <input type="hidden" name="comment_info" id="comment_info" value="">         
        <button class="popup" onClick="popUp2()">Отмена</button>
              </form>
              
        </div>
        </div>
        
        <!---для шаблона, часть 1.конец--->  
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
if (empty($show)){echo "<script type='text/javascript'>window.location = 'index.php';</script>";}

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
        <table id="stretch" style="width:100%;"><tr><td>
        <h1 style="padding:5px;margin-left:20px;margin-top:80px;"><?php  
           
           echo $show['article_name'];
        ?>
            :</h1> <!---для шаблона, часть 2--->    
            
   <!---для шаблона, часть 2 конец--->    
             <hr class="main_line"/>
        <section class="article_list">
            
            <div id="text" style="padding-left:70px; padding-right:70px;font-size:14pt;
                    font-family:Times New Roman;line-height: 1.5; text-align:justify; padding-bottom:50px;" class="hyphenate" >
<!---text begin-->
              
                <?php
 function replaceBBCode($text_post) {
    $str_search = array(
      "#\\\n#is",
      "#\[b\](.+?)\[\/b\]#is",
      "#\[i\](.+?)\[\/i\]#is",
      "#\[u\](.+?)\[\/u\]#is",
      "#\[code\](.+?)\[\/code\]#is",
      "#\[quote\](.+?)\[\/quote\]#is",
      "#\[url=(.+?)\](.+?)\[\/url\]#is",
      "#\[url\](.+?)\[\/url\]#is",
      "#\[img\](.+?)\[\/img\]#is",
      "#\[size=(.+?)\](.+?)\[\/size\]#is",
      "#\[color=(.+?)\](.+?)\[\/color\]#is",
      "#\[list\](.+?)\[\/list\]#is",
      "#\[listn](.+?)\[\/listn\]#is",
      "#\[\*\](.+?)\[\/\*\]#",
      "#\[video\](.+?)\[\/video\]#is",
      "#\[c\](.+?)\[\/c\]#is",
      "#\[l\](.+?)\[\/l\]#is",
      "#\[r\](.+?)\[\/r\]#is",
       "#\[j\](.+?)\[\/j\]#is",
       "#\[font=(.+?)\](.+?)\[\/font\]#is",
        "#\[audio\](.+?)\[\/audio\]#is"
    );
    $str_replace = array(
      "<br />",
      "<b>\\1</b>",
      "<i>\\1</i>",
      "<span style='text-decoration:underline'>\\1</span>",
      "<code class='code'>\\1</code>",
      "<table width = '95%'><tr><td>Цитата</td></tr><tr><td class='quote'>\\1</td></tr></table>",
      "<a href='\\1'>\\2</a>",
      "<a href='\\1'>\\1</a>",
      "<img src='\\1' alt = 'Изображение' />",
      "<span style='font-size:\\1em'>\\2</span>",
      "<span style='color:\\1'>\\2</span>",
      "<ul>\\1</ul>",
      "<ol>\\1</ol>",
      "<li>\\1</li>",
      "<video src='\\1' alt = 'Видео' controls='controls'></video>",
      "<p align='center'>\\1</p>",
      "<p align='left'>\\1</p>",
      "<p align='right'>\\1</p>",
       "<p align='justify'>\\1</p>",
        "<span style='font-family:\\1'>\\2</span>",
        "<audio src='\\1' alt = 'Аудио' controls='controls'></audio>",
    );
    return preg_replace($str_search, $str_replace, $text_post);
  }     
          
  
echo replaceBBCode($show['article_content']);

?>
                </div>
            
                    
            </section>
            
             <?php      
 
     echo ' <hr class="main_line"/>';

$result=$mysqli->query("SELECT article_id FROM article ORDER BY article_id ASC LIMIT 1");
$test=mysqli_fetch_assoc($result);
$begin=$test['article_id']; 
$result=$mysqli->query("SELECT article_id FROM article ORDER BY article_id ASC");

while($test=mysqli_fetch_assoc($result))
{
      if (intval($test['article_id'])!=intval($_GET['id'])){$previous=$test['article_id'];}
   else {
       $test=mysqli_fetch_assoc($result);
       $next=$test['article_id'];
       break;} 
}

echo "<p align='center'>";
if (!empty($next)){
 echo "<span  class='edit2' onClick='teleport4(".$next.")'>Предыдущая статья</span>";}
else {
   // echo "<button  class='edit2' onClick='teleport()'>Предыдущая статья</button>";
}

if ((intval(previous)!=intval($_GET['id']))&&(!empty($previous))){
echo "<span class='edit2'  onClick='teleport4(".$previous.")'>Следующая статья</span>";}
else {
  //  echo "<button class='edit2'  onClick='teleport()'>Следующая статья</button>"; 
}


if($show['article_creator']==$_COOKIE['id']){
echo "<span class='edit2' onClick='teleport3(".$show['article_id'].",".$show['article_creator'].")'>Редактировать</span>
     
     <span style='margin-left:-4px; ' class='edit2' id='delete' onClick='popUp(".$show['article_id'].")'>Удалить</span>";
    }
if(isset($loggedin)){
echo "<span class='edit2' id='add_conns' onClick='show_add_comms()'>Добавить комментарий</span> ";} 

echo "</p>";
   
?>
      
            
      <hr class="main_line"/>
            </td></tr> </table>  
        
    <section>
        
        <div style="padding-left:70px; font-size:14pt;
                    font-family:Times New Roman;line-height:1.5; padding-bottom:50px;">
            
          
            <form method="post" id="comms" style="display:none;">
                <span style="font-style:italic;font-weight:bold;">Ваш комментарий:</span>
                
 <textarea rows="3" id="comment" name="comment" cols="30" required style="width:750px;font-size:15px;padding:5px;" placeholder="не более 500 символов и не менее 5" pattern="[\sA-za-zА-Яа-я0-9?!@#$%^\&*\(\.~}|{+_)]{1,}"></textarea> 
       <p style="text-align:center;margin:0px;"> <input type="submit" name="send_comms" value="Отправить" style="position:relative;top:-8px;font-size:14px;width:auto;padding:5px;"/></p>
            </form>
        
<?php
$result=$mysqli->query("SELECT COUNT(comms_id) FROM commentaries WHERE comms_article_id='".$_GET['id']."' AND comms_answer_id=0");
    $show=mysqli_fetch_array($result);
    echo "</br></br><span style='font-size:30px;font-weight:bold;'>КОММЕНТАРИИ (".$show[0].")</span><br/>";  



  $result=$mysqli->query("SELECT * FROM commentaries WHERE comms_article_id='".$_GET["id"]."' ORDER BY comms_id DESC");
    
    while($test=mysqli_fetch_assoc($result)) {
      if ($test['comms_answer_id']==0){
        $result2=$mysqli->query("SELECT user_login FROM users WHERE user_id='".$test['comms_user_id']."'");
        $show=mysqli_fetch_array($result2);
       
         $result6=$mysqli->query("SELECT count(comms_id) FROM commentaries WHERE comms_answer_id='".$test['comms_id']."'");
        $count=mysqli_fetch_array($result6);
        
          if ($count[0]!=0){ 
  echo " <span class='edit2' id='show_comms".$test['comms_id']."' onClick='show_add_comms2(".$test['comms_id'].")' style='position:relative;left:84%;top:25px;width:60px;text-align:center;'>↓</span>";}
          else if (isset($loggedin)){
          echo "<span class='edit2' id='show_comms".$test['comms_id']."' onClick='show_add_comms3(".$test['comms_id'].")' style='position:relative;left:84%;top:25px;width:60px;text-align:center;'>Ответить</span>";
          }
          
          
          if ($_COOKIE['id']==$test['comms_user_id']){
            
          echo " <span class='edit2' style='position:relative;left:71%;top:25px;' onClick='popUp2(".$test['comms_id'].")'>✖</span>";
          }else {
              
               echo " <span class='edit2'  style='position:relative;left:72%;top:25px;visibility:hidden;' onClick=''>✖</span>";
              
          }
          
    echo "<aside style='border:3px solid #747070; width:90%;padding-left:20px;margin-top:-10px;border-top-left-radius:20px;border-bottom-right-radius:20px;'>";
          
          
          
     echo "<span style='margin-left:0px;font-weight:bold;'>".$show[0]."</span>";
          
   
   
   echo "<br/>".$test['comms_content']."<br/><span style='font-style:italic;font-size:14px;'>Комментарий добавлен ".
    $test['comms_date']."; Ответов ".$count[0].".</span>";
        
        $result3=$mysqli->query("SELECT * FROM commentaries WHERE comms_answer_id='".$test['comms_id']."'");
          echo '<div id="comms'.$test['comms_id'].'"style="display:none;">';
        while($test2=mysqli_fetch_assoc($result3)){
            
            $result4=$mysqli->query("SELECT user_login FROM users WHERE user_id='".$test2['comms_user_id']."'");
        $show2=mysqli_fetch_array($result4);
            
          if ($_COOKIE['id']==$test2['comms_user_id']){
            
          echo " <span class='edit2' style='position:relative;left:88%;top:15px;' onClick='popUp2(".$test2['comms_id'].")'>✖</span>";
          }else {
              
               echo " <span class='edit2'  style='position:relative;left:88%;top:15px;visibility:hidden;' onClick=''>✖</span>";
              
          }
            
           echo "<aside style='border:3px solid #747070; width:90%;padding-left:20px;margin-top:10px;border-top-left-radius:20px;border-bottom-right-radius:20px;margin-top:-20px;'><span style='margin-left:-10px;font-weight:bold;'>".$show2[0]."</span> <br/>".$test2['comms_content'].
               
            "<br/> <span style='font-style:italic;font-size:14px;'>Ответ добавлен ".
    $test2['comms_date'].".</span>
    
    </aside>"; 
        }
        
        if (isset($loggedin)){
        echo '<br/><form method="post">
              <span style="font-style:italic;font-weight:bold;">Ваш ответ:</span>  
 <textarea rows="3" id="comment" name="comment" cols="30" required style="width:685px;font-size:15px;padding:5px;" placeholder="не более 500 символов и не менее 5" pattern="[\sA-za-zА-Яа-я0-9?!@#$%^\&*\(\.~}|{+_)]{1,}"></textarea> 
 <input type="hidden" name="answer_id" value="'.$test['comms_id'].'"/>
       <p style="text-align:center;margin:0px;"> <input type="submit" name="send_comms" value="Отправить" style="position:relative;top:-8px;font-size:14px;width:auto;padding:5px;"/></p>
            </form>';
            
        }
    echo '<br/></div></aside>';
      }
    }
    
    ?>
            
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
    <script type="text/javascript">
        Hyphenator.run() 
        $('td').hyphenate();
    var arg1=document.getElementById('stretch');
    
    if (arg1.scrollWidth>arg1.offsetWidth){
      arg1.style.width=arg1.scrollWidth+'px';  
       
   }
    
    </script>
</html>