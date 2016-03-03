<!---для шаблона, часть 0--->  
<?php
      include_once ('logs.php'); 
 
if (isset($_POST["delete2"])&isset($_POST["article_info"])){
    $mysqli = new mysqli("localhost", "root", "", "WebSite");
    $result=$mysqli->query("SELECT article_address FROM article WHERE article_id='".$_POST["article_info"]."'");
    $address=mysqli_fetch_assoc($result);
    $file=$address['article_address'];
    
    unlink($file);
    $result=$mysqli->query("DELETE FROM article WHERE article_id='".$_POST["article_info"]."'");
   echo "<script type='text/javascript'>location.replace('index.php');</script>";
} 
?>
<!---для шаблона, часть 0 конец--->  
<!DOCTYPE html>
<html>
    <head>
       <title>CN - 