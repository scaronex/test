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
            <th>WPŁATA  KP  </th>
            <th>WYPŁATA  KW  </th>
            <th>ZADANIE</th>
            <th>SALDO</th>
          </tr>
      </thead>
      <tbody>
END;

while($row = mysqli_fetch_assoc($result))
{

      if ($row['fl_rodzaj']!=1)
      {
        $kpczykw="KW";
        $kw=$row['kwota'];
        $kp=0;
      }
       else
      {
        $kpczykw="KP";
        $kp=$row['kwota'];
        $kw=0;
      }
        $idfetch=$row['jakie_idd'];
        $dbs = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia3 !") ;
               mysqli_set_charset($db,"utf8");
        $qs = "SELECT sl.opis  FROM koszty as ko
              join slowniki as sl on ko.rodzaj_koszt = sl.id
              where ko.id=$idfetch";
        $rodzaj = mysqli_query($dbs, $qs)or die("błąd połączenia4 ") ;
        $rodzajkosztu=mysqli_fetch_assoc($rodzaj) ;

echo "<tr><td>".$row["add_date"]."</td><td>".$rodzajkosztu['opis']."<td>".$kp."<td>".$kw.
"<td>".$row['kwota']."<td>".$row['zliczsaldo']."<td>".$kpczykw."</td></tr>";
}
echo<<<END
    </tbody>
  </table>
END;

?>
