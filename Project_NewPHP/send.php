<?
if((isset($_POST['theme'])&&$_POST['theme']!="")&&(isset($_POST['msg'])&&$_POST['msg']!="")){ //Проверка отправилось ли наше поля name и не пустые ли они
        $to = 'eugenious-yakovlev@yandex.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = 'Тест/'.$_POST['theme']; //Загаловок сообщения
    
    $result=$mysqli->query("SELECT user_login FROM users WHERE user_id='".$_COOKIE["id"]."'");
    $show=mysqli_fetch_array($result);
    
        $message = '
                <html>
                    <head>
                        <title>'.$_POST['theme'].'</title>
                    </head>
                    <body>
                        <p>Тема: '.$_POST['theme'].'</p>
                        <p>Пользователь: '.$show[0].'.</p>
                        <p>Содержание: '.$_POST['msg'].'</p>                        
                    </body>
                </html>';  
        $headers = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: Отправитель site_there@inbox.ru\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
   header("Location:index.php");
}
?>