<a href="/z4/katalog.php">Powrót</a> <br>
<?php
session_start();


if(isset($_SESSION['link'])) {
    $target_dir = $_SESSION['user'] . "/" . $_SESSION['link'];
} else {
    $target_dir = $_SESSION['user'];
}

$target_file = $target_dir . "/". basename($_FILES["file"]["name"]);
if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
{ 
echo "Plik został zaimportowany";
}
?>

<form method="post"  enctype="multipart/form-data" >
 
<label for="file"><span>Filename:</span></label>
 
<input type="file" name="file" id="file" /> 
 
<br />
<input type="submit" name="submit" value="Submit" />
</form>