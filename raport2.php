<?php include 'dbconnect.php'?>
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dane</title>
  <link rel="stylesheet" type="text/css" href="css/rap.css">
</head>
<body>



<?php
$day1 = $_POST['Data'];
$day2 = $_POST['Data1'];

$db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
 mysqli_set_charset($db,"utf8");
$q = "SELECT * FROM raportkasowy where DATA between '{$day1}' and '{$day2}'ORDER BY 'id zgloszenia'";
$result = mysqli_query($db, $q)or die("błąd połączenia ") ;
echo<<<END
<table>
       <thead>
          <tr>
            <th> ID ZGŁOSZENIA </th>
            <th> DATA ZGŁOSZENIA </th>
            <th>CZAS ZLECENIA</th>
            <th>NAZWA KLIENTA</th>
            <th>ZLECENIE</th>
            <th>KOSZT</th>
			<th>SALDO</th>
          </tr>
      </thead>
      <tbody>
END;

while($row = mysqli_fetch_assoc($result))
{
echo "<tr><td>"
.$row["Id zgloszenia"]."</td><td>"
.$row['Data']."<td>"
.$row['Czas zlecenia']."<td>"
.$row['Nazwa Klienta']."<td>"
.$row['Zadanie']."<td>"
.$row['Koszt']."<td>"
.$row['saldo']."</td></tr>";
}
echo<<<END
    </tbody>
  </table>
END;

?>
