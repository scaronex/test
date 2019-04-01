<?php include('dbconnect.php')?>
<!DOCTYPE html>
<html>
<head>
  <title>Opcje</title>
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
  $opc =  $_POST['nazop'];

  $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
   mysqli_set_charset($db,"utf8");
  $query = "INSERT INTO slownikiopcje(nazwa)
   VALUES('$opc')";
  mysqli_query($db, $query)or die("1") ;

  }
?>
<div class="container">

        <form id="contact" action="" method="post">
          <h3>Opcje</h3>
          <h4>Wprowadzanie opcji</h4>
          <fieldset>
            <input placeholder="Nazwa opcji" name="nazop" type="text" tabindex="1" required autofocus>
          </fieldset>

          <fieldset>
            <button name="zapisz" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
          </fieldset>
        </form>
  </div>
  </div>

</body>
</html>
