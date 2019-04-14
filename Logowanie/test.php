<?php
include'dbconnect.php'?>
<?php
$db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
mysqli_set_charset($db,"utf8");
$q = ("SELECT * FROM klient ORDER BY klient ASC");
$query=mysqli_query($db, $q)or die("Problemy z zapisem odczytem  bazy ") ;
mysqli_close($db);
######### Pobieranie Danych #########

echo '<select name="dane">';
echo '<option value="">Klient</option>';
while($option = mysqli_fetch_assoc($query))

{

echo '<option value="'.$option['id'].'">'.$option['klient'].'</option>';
}
echo '</select>';

?>

