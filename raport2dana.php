
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

<div class="container">

        <form id="contact" action="raport2.php" method="post">
          <h3>Raport</h3>
          <h4>Raport zgłoszenia wg Daty</h4>
          <?php
              if (isset($_POST['zapisz']))
                    {
                        $day1 = $_POST['Data'];
                        $day2 = $_POST['Data1'];
                    }
          ?>


          <fieldset>
            <input type="date" name="Data"tabindex="1" required autofocus>
            <input type="date" name="Data1"tabindex="1" required autofocus>
          </fieldset>

          <fieldset>
            <button name="zapisz" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
          </fieldset>
        </form>
      </body>
