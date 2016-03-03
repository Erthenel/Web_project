</title>
       <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="main.css" />
        
        <script src="jquery-2.1.4.js"></script>
        <script src="script.js">
        </script>
        
        
    </head>
    <body>
       <!---для шаблона, часть 1--->  
      <div id="wrapbox" style="position:fixed;background-color:rgba(0, 0, 0, 0.69);width:100%;height:100%;z-index:3;">
          <div id="popupBlock" style="position:relative; top:40vh;left:60vh;width:400px;height:100px;background-color:#e7e7ea;color:black;padding-top:40px;text-align:center; box-shadow: 0 0 3px #383840;">Вы действительно хотите удалить данную статью?<br/>
              <form method="POST">
        <button class="popup" name="delete2" id="delete2">Удалить</button>
        <input type="hidden" name="article_info" id="article_info" value="">         
        <button class="popup" onClick="popUp()">Отмена</button>
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
        
        <h1 style="padding:5px;margin-left:20px;margin-top:80px;">