<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<BODY>

<?php
 
session_start(); 
if (isset($_SESSION["locked"]))
{
    $difference = time() - $_SESSION["locked"];

    if ($difference > 60)
    {
        unset($_SESSION["locked"]);
        unset($_SESSION["login_attempts"]);
    }
}

if ($_SESSION["login_attempts"] > 2)
{
    $_SESSION["brute_force"] = true;
    if(!isset($_SESSION["locked"])) {

    $link = mysqli_connect("sql200.epizy.com", "epiz_32755305", "De2wZ7MYlv", "epiz_32755305_z4");

    if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); }
    mysqli_query($link, "SET NAMES 'utf8'");
    $random = rand();
    $ipaddress = $_SERVER["REMOTE_ADDR"];

    $sql = "INSERT INTO burglary (ipaddress) VALUES ('$ipaddress')";
    if(mysqli_query($link, $sql)){
        
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    }

    $_SESSION["locked"] = time();
    echo "Please wait for 60 seconds";
    
    mysqli_close($link);
    }
else
{
 
?>
Formularz logowania
<form method="post" action="weryfikuj3.php">
Login:<input type="text" name="user" maxlength="20" size="20"><br>
Hasło:<input type="password" name="pass" maxlength="20" size="20"><br>
<input type="submit" value="Send"/>
</br></br><a href="/z4/rejestruj.php"> Zarejestruj </a>
</form>
 
<?php
 
}
 
?>
</BODY>
</HTML>