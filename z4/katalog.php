<!DOCTYPE html>
<html>
<body>
<a href="index4.php">Powrót</a>
<?php
session_start();
$target_dir = $_SESSION['user'];
unset($_SESSION['link']);

echo "<div><h2>Pliki i Katalogi</h2><a href='DodajKatalog.php'>Dodaj Katalog</a>
<a href='Dodaj.php'>Dodaj Plik</a></div>";


if ($handle = opendir("./{$target_dir}")) {

    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            if(strpos($entry, ".png") !== false){
                echo "<div><a href='./{$target_dir}/{$entry}' download>$entry</a><a href='Usun.php?link=$subDirectory/$entry'> Usuń</a></div>";
                echo "<img src='./{$target_dir}/{$entry}' /></br></br>";
            } else if(strpos($entry, ".jpg") !== false){
                echo "<div><a href='./{$target_dir}/{$entry}' download>$entry</a><a href='Usun.php?link=$subDirectory/$entry'> Usuń</a></div>";
                echo "<img src='./{$target_dir}/{$entry}' /></br></br>";
            } else if(strpos($entry, ".gif") !== false){
                echo "<div><a href='./{$target_dir}/{$entry}' download>$entry</a><a href='Usun.php?link=$subDirectory/$entry'> Usuń</a></div>";
                echo "<img src='./{$target_dir}/{$entry}' /></br></br>";
            } else if(strpos($entry, ".mp3") !== false){
                echo "<div><a href='./{$target_dir}/{$entry}' download>$entry</a><a href='Usun.php?link=$subDirectory/$entry'> Usuń</a></div>";
                echo "<audio controls src='./{$target_dir}/{$entry}'></audio></br></br>";
            } else if(strpos($entry, ".mp4") !== false){
                echo "<div><a href='./{$target_dir}/{$entry}' download>$entry</a><a href='Usun.php?link=$subDirectory/$entry'> Usuń</a></div>";
                echo "<video controls muted><source src='./{$target_dir}/{$entry}' type='video/mp4'></video></br></br>";
            } else if(is_dir("./{$target_dir}/{$entry}")){
                echo "<div><a href='podkatalog.php?link=$entry'><p>$entry</a><a href='Usun.php?link=$entry'> Usuń</a></div>";
            } else {
                echo "<div><a href='./{$target_dir}/{$entry}' download>$entry</a><a href='Usun.php?link=$subDirectory/$entry'> Usuń</a></div>";
            }
        }
    }

    closedir($handle);
}

?>

</body>
</html>