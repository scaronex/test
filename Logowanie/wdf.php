<?php
include'dbconnect.php'?>
<?php

$db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
mysqli_set_charset($db,"utf8");
$z = ("SELECT * FROM zgloszenie ORDER BY klient ASC");
$query = mysqli_query($db, $z)or die("Problemy z zapisem odczytem  bazy ") ;

while($option = mysqli_fetch_assoc($query))
{
    echo $option['id']. "<br>";
}

mysqli_close($db);
?>
