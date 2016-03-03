<div class="logform">
    <?php                 
    $result=$mysqli->query("SELECT user_login FROM users WHERE user_id='".$_COOKIE['id']."'");
$user_login=mysqli_fetch_assoc($result);
echo  '<input type="hidden" id="user_login_info'.$test['article_creator'].'" value="'.$user_login['user_login'].'"/>'
                     ?>
    <div style="position:absolute;top:-10px;left:70px;font-size:20px;">Личный кабинет</div>
    <img src="Images/noavatar.png" width="100px;" style="position:absolute;top:20px;right:-10px;"/>
    <ul class="user_options" style="margin-top:35px;">
        <li onClick="show_me_user(0)">Мой профиль</li>
        <li onClick="window.location='my_articles.php'">Мои статьи <?php
        $result=$mysqli->query("SELECT COUNT(article_id) FROM article WHERE article_creator='".$_COOKIE['id']."'");
    $output2=mysqli_fetch_array($result);
      echo "(<span style='color:#830000;font-weight:bold;'>".$output2[0]."</span>)";
        ?>
        </li>
        <li onClick="window.location='my_commentaries.php'">Мои комментарии <?php 
             $result=$mysqli->query("SELECT COUNT(comms_id) FROM commentaries WHERE comms_user_id='".$_COOKIE['id']."' AND comms_answer_id=0");
    $output2=mysqli_fetch_array($result);
            echo "(<span style='color:#830000;font-weight:bold;'>".$output2[0]."</span>)";
        ?></li>
    </ul>
   
    <?php
//echo "IP адрес:".long2ip($userdata['user_ip']);
$mysqli->query("UPDATE users SET user_ldate='".date('d.m.y в G:i')."' WHERE user_id='".$_COOKIE['id']."'");
?>
    <input class="loginButton" type="submit" name="flip_" value="Cвернуть" onClick="flip_login_bar()">
    <input class="loginButton" type="submit" value="Выйти" onClick="DelCookieMin1()">
    
    
    
    </div>