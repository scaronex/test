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

$db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
 mysqli_set_charset($db,"utf8");
$q = "SELECT * FROM zgloszenie where data between '{$day1}' and '{$day2}'ORDER BY data asc";
$result = mysqli_query($db, $q)or die("błąd połączenia ") ;
echo<<<END
<table>
       <thead>
          <tr>
            <th> DATA ZADANIA </th>
            <th>GODZ STR</th>
            <th>GODZ END</th>
            <th>KLIENT</th>
            <th>ZADANIE</th>
          </tr>
      </thead>
      <tbody>
END;

while($row = mysqli_fetch_assoc($result))
{
echo "<tr><td>".$row["data"]."</td><td>".$row['czasod']."<td>".$row['czasdo']."<td>"
.$row['klient']."<td>".$row['dowyk']."</td></tr>";
}
echo<<<END
    </tbody>
  </table>
END;

?>
