:</h1> <!---для шаблона, часть 2--->    
            <?php      
$result=$mysqli->query("SELECT article_id, article_creator FROM article WHERE article_address='".trim($_SERVER['REQUEST_URI'],"/")."'");
    $test=mysqli_fetch_assoc($result);

       if($test['article_creator']==$_COOKIE['id']){
echo "<button class='edit' onClick='teleport3(".$test['article_id'].",".$test['article_creator'].")'>Редактировать</button>
     
     <button class='edit' id='delete' onClick='popUp(".$test['article_id'].")'>Удалить</button>";
    }
?>
   <!---для шаблона, часть 2 конец--->    
             <hr class="main_line"/>
        <section class="article_list">
            
            <div id="text" style="padding-left:70px; padding-right:70px;font-size:14pt;
                    font-family:Times New Roman;line-height: 1.5; text-align:justify; padding-bottom:50px;">
<!---text begin-->