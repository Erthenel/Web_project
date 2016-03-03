<?
if((isset($_POST['theme'])&&$_POST['theme']!="")&&(isset($_POST['msg'])&&$_POST['msg']!="")){ //Проверка отправилось ли наше поля name и не пустые ли они
        $to = 'eugenious-yakovlev@yandex.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
        $subject = $theme; //Загаловок сообщения
        $message = '
                <html>
                    <head>
                        <title>'.$theme.'</title>
                    </head>
                    <body>
                        <p>Тема: '.$_POST['name'].'</p>
                        <p>Содержание: '.$_POST['msg'].'</p>                        
                    </body>
                </html>';  
        $headers = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
        $headers .= "From: Отправитель <site_there@inbox.ru>\r\n"; //Наименование и почта отправителя
        mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
}
?>