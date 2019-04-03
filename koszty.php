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
         <li><a href="#">Koszty</a></li>
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

  <?php
    if (isset($_POST['zapisz']))
    {
      if ($_POST['rodzaj'] < 3)
       {
          $date_in =  $_POST['date_in'];
          $rodzaj =  $_POST['rodzaj'];
          $kwota =  $_POST['kwota'];
          $dane =  $_POST['dane'];


          $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
          mysqli_set_charset($db,"utf8");
          $query = "INSERT INTO koszty(date_in,fl_rodzaj,kwota,rodzaj_koszt)
          VALUES('$date_in','$rodzaj','$kwota','$dane')";
          mysqli_query($db, $query)or die("1") ;

        }
      else
        {
          echo "<script language='javascript' type='text/javascript'>alert('Brak wybranej formy dokumentu'); </script>";
          header('refresh: 1;');
        }


    }
  ?>



		<div class="container">

				<form id="contact" action="" method="post">
				  <h3>Koszty</h3>
				  <h4>Dane</h4>


				  <fieldset>
            <div class="radio">
  					       <input placeholder="Data" name="date_in" type="date" tabindex="1" required autofocus>
                   <input type="radio" name="rodzaj" value="1"> KP
                   <input type="radio" name="rodzaj" value="2"> KW
                   <input type="radio" name="rodzaj" value="3" checked="checked">
            </div>
				  </fieldset>
				  <fieldset>
					         <input placeholder="Kwota"  name="kwota" type="number" tabindex="1" required autofocus>
				  </fieldset>
          <fieldset>
            <?php

                $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
                 mysqli_set_charset($db,"utf8");

                $q = ("SELECT * FROM slowniki ORDER BY nazwa ASC");
                $query=mysqli_query($db, $q)or die("błąd 3") ;

                ######### Pobieranie Danych #########

                echo '<select name="dane">';
                echo '<option value="1">Rodzaj Kosztów</option>';
                while($option = mysqli_fetch_assoc($query))
                {
                echo '<option value="'.$option['nazwa'].'">'.$option['nazwa'].'</option>';
                $klient ='';
                }
                echo '</select>';

                mysqli_close($db);
            ?>


              <a href="Klientokn.php" target="_blank" class="button"onclick="window.open('Klientokn.php', 'Nowe_okno', 'height=530,width=505');">Dodaj Rodzaj</a>
         </fieldset>
				  <fieldset>
					<button name="zapisz" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
				  </fieldset>
				</form>
		  </div>
  </div>

</body>
</html>
