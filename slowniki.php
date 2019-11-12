<?php include('dbconnect.php')?>
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
      <li><a href="#"><font color="FDD700"> _</font></a></li>
      <li><a href="#"><font color="FDD700"> _</font></a></li>
      <li><a href="#"><font color="FDD700"> _</font></a></li>
      <li><a href="#"><font color="FDD700"> _</font></a></li>
       </li>
       <li><a href="logout.php" >Wylogowanie </a>
       </li>
     </ol>
   </div>


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
