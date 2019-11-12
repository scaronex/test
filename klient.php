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



<?php
  if (isset($_POST['zapisz']))
  {
  $nazwa =  $_POST['nazwa'];
  $nazwaskr =  $_POST['nazwaskr'];
  $kod =  $_POST['kod'];
  $miasto =  $_POST['miasto'];
  $ulica =  $_POST['ulica'];
  $nip =  $_POST['nip'];
  $email =  $_POST['email'];
  $tel =  $_POST['tel'];

  $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
   mysqli_set_charset($db,"utf8");
  $query = "INSERT INTO klient(nazwa,nazwas,kod,miasto,ulica,nip,email,numertel)
   VALUES('$nazwa','$nazwaskr','$kod','$miasto','$ulica','$nip','$email','$tel')";
  mysqli_query($db, $query)or die("1") ;

  }
?>


<div class="all">

<div class="container">

        <form id="contact" action="" method="post">
          <h3>Dane</h3>
          <h4>Wprowadzanie Danych</h4>
          <fieldset>
            <input placeholder="Nazwa" name="nazwa" type="text" tabindex="1" required autofocus>
          </fieldset>
          <fieldset>
            <input placeholder="Nazwa Skrócona" name="nazwaskr" type="text" tabindex="1" required autofocus>
          </fieldset>
          <fieldset>
            <input placeholder="Kod Pocztowy" name="kod" type="text"  tabindex="2" >
          </fieldset>
          <fieldset>
            <input placeholder="Miasto" name="miasto" type="text"  tabindex="2" >
          </fieldset>
          <fieldset>
            <input placeholder="Ulica"name="ulica"  type="text"  tabindex="2" >
          </fieldset>
          <fieldset>
            <fieldset>
              <input placeholder="NIP" name="nip" type="text" tabindex="2" >
            </fieldset>
            <input placeholder="Email Address" name="email" type="email" tabindex="2" >
          </fieldset>
          <fieldset>
            <input placeholder=" Number Telefonu (optional)" name="tel" type="tel" tabindex="3" >
          </fieldset>
          <fieldset>
            <button name="zapisz" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
          </fieldset>
        </form>
  </div>
  </div>

</body>
</html>
