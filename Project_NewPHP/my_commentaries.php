<?php
      include_once ('logs.php'); 
      include_once ('add_comms2.php'); 

$result=$mysqli->query("SELECT * FROM article WHERE article_id='".$_GET["id"]."'");
    $show=mysqli_fetch_assoc($result);

if (isset($_POST["delete2"])&isset($_POST["comment_info"])){
    $mysqli = new mysqli("localhost", "root", "", "WebSite");

  $result=$mysqli->query("DELETE FROM commentaries WHERE comms_id='".$_POST["comment_info"]."'");
      $result=$mysqli->query("DELETE FROM commentaries WHERE comms_answer_id='".$_POST["comment_info"]."'");
} 
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
       <title>CN - <?php  
          
           echo "Мои комментарии";
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
//if (empty($show)){echo "<script type='text/javascript'>window.location = 'index.php';</script>";}

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
        
        <h1 style="padding:5px;margin-left:20px;margin-top:80px;"><?php  
           $result=$mysqli->query("SELECT COUNT(comms_id) FROM commentaries WHERE comms_user_id='".$_COOKIE['id']."' AND comms_answer_id=0");
    $show=mysqli_fetch_array($result);

           echo "Мои комментарии (".$show[0].")";
        ?>
            :</h1> <!---для шаблона, часть 2--->    
            
   <!---для шаблона, часть 2 конец--->    
             <hr class="main_line"/>

    <section>
        
        <div style="padding-left:70px; font-size:14pt;
                    font-family:Times New Roman;line-height:1.5; padding-bottom:50px;">
            
        
<?php
//массив для поиска одинаковых записей
$similar=array();

if (!isset($loggedin)){echo "<script type='text/javascript'>window.location = 'index.php';</script>";}
 
if ($show[0]==0){echo "Вы не оставляли комментарии на сайте";}

  $result=$mysqli->query("SELECT * FROM commentaries WHERE comms_user_id='".$_COOKIE['id']."' ORDER BY comms_article_id DESC, comms_answer_id ASC");
$check=0;
    while($test=mysqli_fetch_assoc($result)) {
        if ($test['comms_article_id']!=$theme_shout){
             unset($similar);
                 $similar[]=array();
             $check=0;
            if (!empty($theme_shout)){echo "<br/><hr style='margin-left:-100px;border:1px solid black;box-shadow:0 0 1px #789cef;margin-bottom:-15px;'/>";}
        $theme_shout=$test['comms_article_id'];
            $check=0;
        $result2=$mysqli->query("SELECT article_name FROM article WHERE article_id='".$theme_shout."'");
        $show=mysqli_fetch_array($result2);
            
            echo "<br/>Комментарии к статье: <span style='font-weight:bold;'>".$show[0]."</span>.<br/>";
        }
        
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
 <textarea rows="3" id="comment" name="comment" cols="30" required style="width:685px;font-size:15px;padding:5px;" placeholder="не более 500 символов и не менее 5" pattern="[\sA-za-zА-Яа-я0-9?!@#$%^\&*\(\.~\'}|{+_)]{1,}"></textarea> 
  <input type="hidden" name="article_id_info"  value="'.$test['comms_article_id'].'"/>
 <input type="hidden" name="answer_id" value="'.$test['comms_id'].'"/>
       <p style="text-align:center;margin:0px;"> <input type="submit" name="send_comms" value="Отправить" style="position:relative;top:-8px;font-size:14px;width:auto;padding:5px;"/></p>
            </form>';
            
        }
    echo '<br/></div></aside>';
      } else {
      // это ответ, надо вывести комментарий другого пользователя
          // условие на проверку нужного комментария
    $check_existence=$mysqli->query("SELECT * FROM commentaries WHERE comms_answer_id='0' AND comms_id='".$test['comms_answer_id']."' AND comms_user_id!='".$_COOKIE['id']."'");
          $outp=mysqli_fetch_array($check_existence);
    
          if (!empty($outp[0])){
                  $check=1;
              $outp=$test['comms_answer_id'];
                  foreach ($similar As $value){
                  if ($value==$test['comms_answer_id']){
                   $check=0;   
                  }
              }
//---------------------------
        
          if ($check==1){
            if (count($similar)==1){  
             echo "<br/><span style='font-style:italic;font-size:17px;'>Мои ответы на комментарии других пользователей к данной статье:</span><br/>";
            }
              $similar[]=$test['comms_answer_id'];
            // Вывести комментарий  другого пользователя с ответами
                   
                $result4=$mysqli->query("SELECT * FROM commentaries WHERE comms_id='".$outp."' ORDER BY comms_id DESC");
                   
            while($test3=mysqli_fetch_assoc($result4)){
//Start-----------------------------------------------------------------    
                 echo " <span class='edit2' id='show_comms".$test3['comms_id']."' onClick='show_add_comms2(".$test3['comms_id'].")' style='position:relative;left:84%;top:25px;width:60px;text-align:center;'>↓</span>";
          
          if ($_COOKIE['id']==$test3['comms_user_id']){
            
          echo " <span class='edit2' style='position:relative;left:71%;top:25px;' onClick='popUp2(".$test3['comms_id'].")'>✖</span>";
          }
                else {
              
               echo " <span class='edit2'  style='position:relative;left:72%;top:25px;visibility:hidden;' onClick=''>✖</span>";
              
          }
          
    echo "<aside style='border:3px solid #747070; width:90%;padding-left:20px;margin-top:-10px;border-top-left-radius:20px;border-bottom-right-radius:20px;'>";
          
         $result5=$mysqli->query("SELECT user_login FROM users WHERE user_id='".$test3['comms_user_id']."'");
        $show=mysqli_fetch_array($result5);   
                
        $result6=$mysqli->query("SELECT count(comms_id) FROM commentaries WHERE comms_answer_id='".$test3['comms_id']."'");
        $count=mysqli_fetch_array($result6);
          
     echo "<span style='margin-left:0px;font-weight:bold;'>".$show[0]."</span>";
          
   
   
   echo "<br/>".$test3['comms_content']."<br/><span style='font-style:italic;font-size:14px;'>Комментарий добавлен ".
    $test3['comms_date']."; Ответов ".$count[0].".</span>";
        
        $result3=$mysqli->query("SELECT * FROM commentaries WHERE comms_answer_id='".$test3['comms_id']."'");
          echo '<div id="comms'.$test3['comms_id'].'"style="display:none;">';
        while($test4=mysqli_fetch_assoc($result3)){
            
            $result4=$mysqli->query("SELECT user_login FROM users WHERE user_id='".$test4['comms_user_id']."'");
        $show2=mysqli_fetch_array($result4);
            
          if ($_COOKIE['id']==$test4['comms_user_id']){
            
          echo " <span class='edit2' style='position:relative;left:88%;top:15px;' onClick='popUp2(".$test4['comms_id'].")'>✖</span>";
          }
            else {
              
               echo " <span class='edit2'  style='position:relative;left:88%;top:15px;visibility:hidden;' onClick=''>✖</span>";
              
          }
            
           echo "<aside style='border:3px solid #747070; width:90%;padding-left:20px;margin-top:10px;border-top-left-radius:20px;border-bottom-right-radius:20px;margin-top:-20px;'><span style='margin-left:-10px;font-weight:bold;'>".$show2[0]."</span> <br/>".$test4['comms_content'].
               
            "<br/> <span style='font-style:italic;font-size:14px;'>Ответ добавлен ".
    $test4['comms_date'].".</span>
    
    </aside>"; 
        }
        
        if (isset($loggedin)){
        echo '<br/><form method="post">
              <span style="font-style:italic;font-weight:bold;">Ваш ответ:</span>  
 <textarea rows="3" id="comment" name="comment" cols="30" required style="width:685px;font-size:15px;padding:5px;" placeholder="не более 500 символов и не менее 5" pattern="[\sA-za-zА-Яа-я0-9?!@#$%^\&*\(\.~\'}|{+_)]{1,}"></textarea>
 <input type="hidden" name="article_id_info"  value="'.$test3['comms_article_id'].'"/>
 <input type="hidden" name="answer_id" value="'.$test3['comms_id'].'"/>
       <p style="text-align:center;margin:0px;"> <input type="submit" name="send_comms" value="Отправить" style="position:relative;top:-8px;font-size:14px;width:auto;padding:5px;"/></p>
            </form>';
           
        }
    echo '<br/></div></aside>';
    //end==--------------------------------------------------------
                }
                
                
            }
 //-------------------------   
                         
          }
          
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
