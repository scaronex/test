<?php include('dbconnect.php')?>
<!DOCTYPE html>
<html>
<head>
  <title>Dane</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


  <div class="menu">
    <div class="listwa">
        <div class="backbroundlogo"></div>
        <div class="logo"> </div>

    </div>

    <ol>
      <li><a href="#">Zgłoszenia</a>
        <ul>
          <li><a href="zgloszenie.php">Zgłoszenia</a></li>
          <li><a href="klient.php">Klient</a></li>
        </ul>
       </li>

       <li><a href="#">Rozliczenia</a>
         <ul>
           <li><a href="koszty.php">Koszty </a></li>
           <li><a href="autokoszty.php">Koszty auto</a></li>
         </ul>
        </li>

       <li><a href="#">Auto</a>
         <ul>
           <li><a href="autotrasa.php">Trasy</a></li>
           <li><a href="autokoszty.php">Koszty</a></li>
         </ul>
        </li>
     <li><a href="#">Raportu</a>
       <ul>
         <li><a href="raport1dana.php">Zgłoszenia</a></li>
         <li><a href="raport2dana.php">Koszty</a></li>
       </ul>
      </li>
      <li><a href="#">Ustawienia</a>
        <ul>
          <li><a href="slownikiopc.php">Grupy</a></li>
          <li><a href="slowniki.php">Słowniki</a></li>
        </ul>
       </li>
     </ol>
   </div>


<div class="all">

<div class="container">

        <form id="contact" action="" method="post">
          <h3>Zadanie </h3>
          <h4>Wprowadzanie zgłoszenia</h4>

          <?php
            if (isset($_POST['zapisz']))
            {
            $data =  $_POST['data'];
            $czasod =  $_POST['czasod'];
            $czasdo =  $_POST['czasdo'];
            $klient=  $_POST['dane'];
            $dowyk =  $_POST['dowyk'];
            $wyk=  $_POST['wyk'];

            $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
             mysqli_set_charset($db,"utf8");
            $query = "INSERT INTO zgloszenie(data,czasod,czasdo,klient,dowyk,wyk)
             VALUES('$data','$czasod','$czasdo','$klient','$dowyk','$wyk')";
            mysqli_query($db, $query)or die("1") ;

            mysqli_close($db);
            }

          ?>


          <fieldset>
            <input type="date" name="data"tabindex="1" required autofocus>
              <input  type="time"name="czasod" tabindex="1" required autofocus>
                <input  type="time"  name="czasdo"tabindex="2" required>
          </fieldset>
            <fieldset>
          <?php

              $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
               mysqli_set_charset($db,"utf8");

              $q = ("SELECT * FROM klient ORDER BY nazwa ASC");
              $query=mysqli_query($db, $q)or die("błąd 3") ;

              ######### Pobieranie Danych #########

              echo '<select name="dane">';
              echo '<option value="1">Wybór Klienta</option>';
              while($option = mysqli_fetch_assoc($query))
              {
              echo '<option value="'.$option['nazwa'].'">'.$option['nazwa'].'</option>';
              $klient ='';
              }
              echo '</select>';

              mysqli_close($db);
          ?>
          <a href="Klientokn.php" target="_blank" class="button"onclick="window.open('Klientokn.php', 'Nowe_okno', 'height=590,width=505');">Dodaj Klienta</a>

            </fieldset>
          <fieldset>
            <fieldset>
              <input placeholder="zgłoszenie " name="dowyk" type="text" tabindex="2" required>
            </fieldset>
            <input placeholder="wykonano"  name="wyk" type="text" tabindex="2" required>
          </fieldset>
          <fieldset>
            <button name="zapisz" type="submit" id="contact-submit" data-submit="...Sending">Zapisz</button>
          </fieldset>
        </form>
  </div>
  </div>

</body>
</html>
