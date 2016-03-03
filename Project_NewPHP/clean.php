<?php 
$mysqli=mysqli_connect('localhost', 'root','','WebSite');

if(isset($_POST['submit']))

{
    $err = array();
    # проверям логин

    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))

    {

        $err[] = "Логин может состоять только из букв английского алфавита и цифр";

    }

    
    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)

    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    # проверяем, не сущестует ли пользователя с таким именем
	
	$login=$mysqli->real_escape_string($_POST['login']);
	
    $result=$mysqli->query("SELECT COUNT(user_id) FROM users WHERE user_login='".$login."'");
	
 $result = $result->fetch_array();
 
 if ($result->errno) { 
    $err[]="Ошибка в SQL-запросе!"; 
} 
    if($result[0]> 0)

    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    } 
    
     
    #Проверка введённого пароля
	 if(($_POST['password']) !=($_POST['pass']))
    {
        $err[] = "Не получено подтверждение пароля";
    }
	 if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['password']))
    {
        $err[] = "Пароль может состоять только из букв английского алфавита и цифр";
    }
	#Проверка введённого email
	if (strlen($_POST['email']) < 5 or strlen($_POST['email']) > 20)

    {
        $err[] = "Неправильно введен email";

    }
     # проверяем, не сущестует ли пользователя с таким email
	$email=$mysqli->real_escape_string($_POST['email']);
	
    $result=$mysqli->query("SELECT COUNT(user_id) FROM users WHERE user_email='".$email."'");
	
 $result = $result->fetch_array();
    if($result[0]> 0)

    {
        $err[] = "Пользователь с таким email уже существует в базе данных";
    } 
	
    # Если нет ошибок, то добавляем в БД нового пользователя

    if(count($err) == 0)

    {    
        $login = $_POST['login'];
        $email=$_POST['email'];
        # Убираем лишние пробелы и делаем двойное шифрование
        $password = md5(md5(trim($_POST['password'])));
        $regdate=date('d.m.y в G:i'); 
        $errors=0;
        

        $mysqli->query("INSERT INTO users SET user_login='".$login."', user_password='".$password."', user_email='".$email."', user_rdate='".$regdate."', user_ldate='".$null."'");$mysqli->close();
		header("Location:redirect.php");exit;


    }

    else

    {
$errors=1;
       

    }

}

?>