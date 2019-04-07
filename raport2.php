<?php include 'dbconnect.php'?>

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

$db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia2 !") ;
 mysqli_set_charset($db,"utf8");
$q = "SELECT * FROM saldo where date_in between '{$day1}' and '{$day2}'ORDER BY date_in asc";
$result = mysqli_query($db, $q)or die("błąd połączenia1 ") ;
echo<<<END
<table>
       <thead>
          <tr>
            <th> DATA ZADANIA </th>
            <th>Rodzaj</th>
            <th>kwota</th>
            <th>KLIENT</th>
            <th>ZADANIE</th>
          </tr>
      </thead>
      <tbody>
END;

while($row = mysqli_fetch_assoc($result))
{

      if ($row['fl_rodzaj']=1) {
      $coto="kp";
      } else
      {
      $coto="kw";
      }


echo "<tr><td>".$row["date_in"]."</td><td>".$row['fl_rodzaj']."<td>".$row['kwota']."<td>"
.$row['rodzaj_koszt']."<td>".$coto."</td></tr>";
}
echo<<<END
    </tbody>
  </table>
END;

?>
