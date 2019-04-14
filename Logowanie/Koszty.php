<?php include('serwer.php')?>
<!DOCTYPE html>
<html>
<head>
  <title>Koszty</title>
  <link rel="stylesheet" type="text/css" href="stylek.css">
</head>
<body>
<?php
if (isset($_POST['zapisz']))
{

  $data = mysqli_real_escape_string($db, $_POST['Data']);
  $czas = mysqli_real_escape_string($db, $_POST['czas']);
  $kli = mysqli_real_escape_string($db, $_POST['Klient']);
  $wyk1 = mysqli_real_escape_string($db, $_POST['Dowykonania']);
  $wyk2 = mysqli_real_escape_string($db, $_POST['Wykonano']);


  if(($_POST['Klient']=='') || ($_POST['Data']=='0000-00-00'))
    {
      echo '<div style="font-size:1.25em;color:red">Nie podano Klienta Zapis się nie powiódł: </div>';

    }
    else
    {

    $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
    mysqli_set_charset($db,"utf8");
    $query = "INSERT INTO zgloszenie(data,czasod,czasdo,klient,zrodlo,dowyk,wyk)
          VALUES('$data','$czas','$cza2','$kli','','$wyk1','$wyk2')";
    mysqli_query($db, $query)or die("Problemy z zapisem do bazy ") ;
    mysqli_close($db);
    	header('location: dane_zap.php');
    }
}
?>
<div class="kontener">
    <div class="daneheader">
  	   <h2>Koszty</h2>
    </div>

  <form method="post" action="Dane.php">
  	<?php include('errors.php'); ?>
    <div class="fline">

          <div class="fline-input">
          	  <label>Data</label>
          	  <input type="date" name="Data" value="<?php echo $data; ?>">
          </div>

            <div class="fline-input">
              <label>czas od</label>
              <input type="time" name="czas" value="<?php echo $czas; ?>">
           </div>

    </div>
    <div class="line">
    <div class="kline">
      <div class="block_k">

         <div class="koszty-input-klient">
            <label>Klient</label>
            <input type="text" name="Klient" value="<?php echo $kli; ?>">
        </div>
    </div>

      <div class="block_k">
       <div class="koszty-input-klient">
            <label>Klient</label>
            <input type="text" name="Klient" value="<?php echo $kli; ?>">
        </div>
    </div>
</div>
<div class="kline">
  <div class="block_k">

     <div class="koszty-input-klient">
        <label>Klient</label>
        <input type="text" name="Klient" value="<?php echo $kli; ?>">
    </div>
</div>

  <div class="block_k">
   <div class="koszty-input-klient">
        <label>Klient</label>
        <input type="text" name="Klient" value="<?php echo $kli; ?>">
    </div>
</div>
</div>
</div>
    <div class="fline">

            <div class="fline-input-l">
                  <label>Zlecenia</label>
              <input type="text" name="Dowykonania" value="<?php echo $wyk1; ?>">
           </div>

           <div class="fline-input-l">
                  <label>Wykonano</label>
              <input type="text" name="Wykonano"value="<?php echo $wyk2; ?>">
          </div>
    </div>
    <div class="fline">
       	<div class="Nextz">
    	      <button type="submit" class="btn" name="zapisz">Zapisz</button>

      	</div>
        <div class="Nextz">
            <button type="buton"class='btn' href="Dane.php">Kolejne</a>
       </div>
    </div>
</div>
</form>
</body>
</html>
