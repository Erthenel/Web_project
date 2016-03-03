<?php 
$mysqli=mysqli_connect('localhost', 'root','','WebSite');
mb_internal_encoding("UTF-8");
if(isset($_POST['send']))

{
    $err = array();
    if(!isset($_POST['theme']))

    {

        $err[] = "Укажите название темы";

    }
     if(mb_strlen($_POST['theme']) < 3 or mb_strlen($_POST['theme']) > 50)

    {
        $err[] = "Название статьи должно быть не меньше 3-х символов и не больше 50. Текущая длина ".strlen($_POST['theme'])." символов";
    }
     if(!isset($_POST['desc']))

    {

        $err[] = "Укажите краткое описание";

    }
     if(!isset($_POST['content']))  {

        $err[] = "Укажите содержание";

    }
    
   if(mb_strlen($_POST['desc']) < 10 or mb_strlen($_POST['desc']) > 150){
   $err[]="Объём краткого содержания не соответствует требованиям: не более 150 символов и не менее 10";
    }
       if(mb_strlen($_POST['content']) < 10 or mb_strlen($_POST['content']) > 5000){
   $err[]="Объём содержания не соответствует требованиям: не более 5000 символов и не менее 150";
    }
//------BB Коды
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
          
  
    
     if(count($err) == 0) {    
        $theme = str_replace("<","&lt;",$_POST['theme']);
        $desc=str_replace("<","&lt;",$_POST['desc']);
         //Добавление автоперевода+обезвреживание вредоносного кода
        $content=str_replace("<","&lt;",$_POST['content']);
         
        $creator=$_COOKIE['id'];
        $regdate=date('d.m.y в G:i:s'); 
        $errors=0;
        

$mysqli->query("INSERT INTO article SET article_name='".$theme."', article_desc='".$desc."', article_content='".$content."',  article_creator='".$creator."', article_cdate='".$regdate."',article_ndate='".$null."'");
         //Создание страницы
//$file = $address; // Путь к файлу
//$structure = file_get_contents('part1.php').$theme.file_get_contents('part2.php').$theme.file_get_contents('part3.php').replaceBBCode($content).file_get_contents('part4.php'); // Содержимое
         
//if (file_exists($file)) {
//echo "Ошибка, страница с таким именем уже есть!";
//} else {
//$handle = fopen($file,"w+"); // Создать файл, вернуть дескриптор в $handle
//fwrite($handle,$structure); // Записать содержимое в дескриптор
//fclose($handle); // Закрыть файл
//}
         
        $mysqli->close();
		header("Location:redirect2.php");exit;
    }

    else

    {
$errors=1;
       

    }

    
    
    
}
?>