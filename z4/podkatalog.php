<!DOCTYPE html>
<html>
<body>

<?php
session_start();  
$subDirectory = $_GET['link'];
$target_dir = $_SESSION['user'];

$_SESSION['link'] = $subDirectory;

echo "<div><h2>Pliki</h2><a href='katalog.php'>Wróć</a><br><a href='Dodaj.php'>  Dodaj Plik</a></div>";

if ($handle = opendir("./{$target_dir}/{$subDirectory}")) {

    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            if(strpos($entry, ".png") !== false){
                echo "<div><a href='./{$target_dir}/{$subDirectory}/{$entry}' download>$entry</a><a href='Usun.php?link=$subDirectory/$entry'> Usuń</a></div>";
                echo "<img src='./{$target_dir}/{$subDirectory}/{$entry}' /></br></br>";
            } else if(strpos($entry, ".jpg") !== false){
                echo "<div><a href='./{$target_dir}/{$subDirectory}/{$entry}' download>$entry</a><a href='Usun.php?link=$subDirectory/$entry'> Usuń</a></div>";
                echo "<img src='./{$target_dir}/{$subDirectory}/{$entry}' /></br></br>";
            } else if(strpos($entry, ".gif") !== false){
                echo "<div><a href='./{$target_dir}/{$subDirectory}/{$entry}' download>$entry</a></p><a href='Usun.php?link=$subDirectory/$entry'> Usuń</a></div>";
                echo "<img src='./{$target_dir}/{$subDirectory}/{$entry}' /></br></br>";
            } else if(strpos($entry, ".mp3") !== false){
                echo "<div><a href='./{$target_dir}/{$subDirectory}/{$entry}' download>$entry</a></p><a href='Usun.php?link=$subDirectory/$entry'> Usuń</a></div>";
                echo "<audio controls src='./{$target_dir}/{$subDirectory}/{$entry}'></audio></br></br>";
            } else if(strpos($entry, ".mp4") !== false){
                echo "<div><a href='./{$target_dir}/{$subDirectory}/{$entry}' download>$entry</a></p><a href='Usun.php?link=$subDirectory/$entry'> Usuń</a></div>";
                echo "<video controls muted><source src='./{$target_dir}/{$subDirectory}/{$entry}' type='video/mp4'></video></br></br>";
            } else if(is_dir("./{$target_dir}/{$entry}")){
                echo "<div><p>$entry</p></a><a href='Usun.php?link=$entry'> Usuń</a></div>";
            } else {
                echo "<div><a href='./{$target_dir}/{$subDirectory}/{$entry}' download>$entry</a></p><a href='Usun.php?link=$subDirectory/$entry'> Usuń</a></div>";
            }
        }
    }
    } else if(strpos($attachment, ".jpg") !== false){
    
  echo "<h3>$user - $date:</h3>";
    echo "<p>$message</p>";
  echo "<img style='width: 40vh; height: 40vh; object-fit: contain; border: 2px solid black;' src='./$attachment' /></br></br>";
  echo "</br>";

}else if(strpos($attachment, ".gif") !== false){
    
  echo "<h3>$user - $date:</h3>";
    echo "<p>$message</p>";
  echo "<img style='width: 40vh; height: 40vh; object-fit: contain; border: 2px solid black;' src='./$attachment' /></br></br>";
  echo "</br>";

}else if(strpos($attachment, ".mp3") !== false){
    
  echo "<h3>$user - $date:</h3>";
    echo "<p>$message</p>";
  echo "<audio controls src='./$attachment'></audio></br></br>";
  echo "</br>";

}else if(strpos($attachment, ".mp4") !== false){
    
  echo "<h3>$user - $date:</h3>";
    echo "<p>$message</p>";
  echo "<video controls muted autoplay><source src='./$attachment' type='video/mp4'></video></br></br>";
  echo "</br>";


    closedir($handle);
}

?>

</body>
</html>