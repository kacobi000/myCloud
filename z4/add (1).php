<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
$user = htmlentities ($_POST['user'], ENT_QUOTES, "UTF-8"); 
$pass = htmlentities ($_POST['pass'], ENT_QUOTES, "UTF-8"); 
$pass2 = htmlentities ($_POST['pass2'], ENT_QUOTES, "UTF-8"); 

 $link = mysqli_connect("sql200.epizy.com", "epiz_32755305", "De2wZ7MYlv", "epiz_32755305_z4"); 
 if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } 
 mysqli_query($link, "SET NAMES 'utf8'"); 
 $result = mysqli_query($link, "SELECT * FROM users WHERE username='$user'"); 
 $rekord = mysqli_fetch_array($result); 

 if($rekord)
 {
 mysqli_close($link);
 header('Location: index3.php');
 }
 else
 { 
 if($pass2==$pass)
 {
    mysqli_query($link, "INSERT INTO `users` (`username`, `password`)
    VALUES ('".$user."', '".$pass."');");
    mkdir("./{$user}");
    header('Location: index3.php');
 }
 else
 {
 mysqli_close($link);
 header('Location: rejestruj.php');
 }
 }
?>
</BODY>
</HTML>