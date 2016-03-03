<?php

// Страница авторизации

# Функция для генерации случайной строки

function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];  
    }

    return $code;

}

# Соединямся с БД


$mysqli = new mysqli("localhost", "root", "", "WebSite");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

}



 
if(isset($_POST['sbm']))

{

    # Вытаскиваем из БД запись, у которой логин равняеться введенному
	$login=$mysqli->real_escape_string($_POST['login']);


   
$result=$mysqli->query("SELECT user_id, user_password FROM users WHERE user_login='".$login."' LIMIT 1");
$data = mysqli_fetch_assoc($result);
 
    # Сравниваем пароли

    if($data['user_password'] === md5(md5($_POST['password'])))

    {
	
      # Генерируем случайное число и шифруем его

        $hash = md5(generateCode(10));

            

        if($_POST['attach_ip'])
 
        {

            # Если пользователя выбрал привязку к IP

            # Переводим IP в строку

            $insip = ", user_ip=INET_aton('".$_SERVER['REMOTE_ADDR']."')";

        }
 
    

        # Записываем в БД новый хеш авторизации и IP

        $mysqli->query("UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");
		


        # Ставим куки

        setcookie("id", $data['user_id'], time()+60*60*24*30);

        setcookie("hash", $hash, time()+60*60*24*30);

     
        # Переадресовываем браузер на страницу  скрипта
		$red=$_SERVER['REQUEST_URI'];
header("Location: $red"); exit;
    }

    else

    {
$err_col="<span style='position:absolute;top:35px;left:20px;z-index:100;'>Вы ввели неправильный логин/пароль</span>";
     $err[]="password wrong";   

    }

}

?>