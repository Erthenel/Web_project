<?php

// Скрипт проверки

# Соединямся с БД

$mysqli = new mysqli("localhost", "root", "", "WebSite");


if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{   
    $result = $mysqli->query("SELECT *,INET_NTOA(user_ip) FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
	
    $userdata = mysqli_fetch_assoc($result);
			
    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])
 or (($userdata['user_ip'] !== $_SERVER['REMOTE_ADDR'])  and ($userdata['user_ip'] == "0")))

    {
        print "Вероятнее всего проблемы с IP";
         //echo '<a class="login_open" onClick="flip_login_bar()">ВОЙТИ</a>';
    }

    else

    {
        echo '<a class="login_open" onClick="flip_login_bar()">'.strtoupper($userdata['user_login']).'</a>';
		$loggedin=1;
	
		
    }
	
}

else

{
    echo '<a class="login_open" onClick="flip_login_bar()">ВОЙТИ</a>';
}

?>
