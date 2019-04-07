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

				  <h4>Logowanie</h4>
          <fieldset>
            <?php

                $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
                 mysqli_set_charset($db,"utf8");

                $q = ("SELECT * FROM users ORDER BY username ASC");
                $query=mysqli_query($db, $q)or die("błąd 3") ;

                ######### Pobieranie Danych #########

                echo '<select name="dane">';
                echo '<option value="1">Login</option>';
                while($option = mysqli_fetch_assoc($query))
                {
                echo '<option value="'.$option['id'].'">'.$option['username'].'</option>';
                $klient ='';
                }
                echo '</select>';

                mysqli_close($db);
            ?>


         </fieldset>
				  <fieldset>
					<button name="zapisz" type="submit" id="contact-submit" data-submit="...Sending">Logowanie</button>
				  </fieldset>
				</form>
		  </div>
  </div>

</body>
</html>
