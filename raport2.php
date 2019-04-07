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
$q = "SELECT * FROM saldo where add_date between '{$day1}' and '{$day2}'ORDER BY id  asc";
$result = mysqli_query($db, $q)or die("błąd połączenia1 ") ;
echo<<<END
<table>
       <thead>
          <tr>
            <th> DATA ZADANIA </th>
            <th> RODZAJ </th>
            <th>  KP  </th>
            <th>  KW  </th>
            <th>ZADANIE</th>
            <th>SALDO</th>
          </tr>
      </thead>
      <tbody>
END;

while($row = mysqli_fetch_assoc($result))
{

      if ($row['fl_rodzaj']!=1) {
      $kpczykw="KW";
      } else
      {
      $kpczykw="KP";
      }
      $idfetch=$row['jakie_idd'];

      $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia2 !") ;
       mysqli_set_charset($db,"utf8");
      $q = "SELECT sl.opis  FROM koszty as ko
            join slowniki as sl on ko.rodzaj_koszt = sl.id
            where ko.id=$idfetch";
      $rodzaj = mysqli_query($db, $q)or die("błąd połączenia1 ") ;
      $rodzajkosztu=$rodzaj;

echo "<tr><td>".$row["add_date"]."</td><td>".$rodzajkosztu."<td>".$row['kwota']."<td>".$row['kwota'].
"<td>".$row['kwota']."<td>".$row['zliczsaldo']."<td>".$kpczykw."</td></tr>";
}
echo<<<END
    </tbody>
  </table>
END;

?>
