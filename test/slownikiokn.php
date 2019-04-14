<?php include('dbconnect.php')?>


<!DOCTYPE html>
<html>
<head>
  <title>Dane</title>
  <link rel="stylesheet" type="text/css" href="css/styleokn.css">
</head>
<body>


<div class="all">

<?php
  if (isset($_POST['zapisz']))
  {
  $opc =  $_POST['nazop'];
  $dane =  $_POST['dane'];
  $opis =  $_POST['opis'];

  $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
   mysqli_set_charset($db,"utf8");
  $query = "INSERT INTO slowniki(nazwa,opcja,opis)
   VALUES('$opc','$dane','$opis')";
  mysqli_query($db, $query)or die("1") ;

  }
?>
<div class="container">

        <form id="contact" action="" method="post">
          <h3>Rodzaj</h3>
          <h4>Wprowadzanie Danych</h4>
          <fieldset>
            <input placeholder="Nazwa opcji" name="nazop" type="text" tabindex="1" required autofocus>
          </fieldset>
            <fieldset>
    <?php

        $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
         mysqli_set_charset($db,"utf8");

        $q = ("SELECT * FROM slownikiopcje ORDER BY nazwa ASC");
        $query=mysqli_query($db, $q)or die("błąd 3") ;

        ######### Pobieranie Danych #########

        echo '<select name="dane">';
        echo '<option value="">Opcja</option>';
        while($option = mysqli_fetch_assoc($query))
        {
        echo '<option value="'.$option['id'].'">'.$option['nazwa'].'</option>';
        $klient ='';
        }
        echo '</select>';

        mysqli_close($db);
    ?>
      </fieldset>
          <fieldset>
            <input placeholder="Opis " name="opis" type="text" tabindex="1" required autofocus>
          </fieldset>

          <fieldset>
            <button name="zapisz" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
          </fieldset>
        </form>
  </div>
  </div>

</body>
</html>
