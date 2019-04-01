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
    $data =  $_POST['data'];
    $ilosckm =  $_POST['ilosckm'];
    $start =  $_POST['start'];
    $meta=  $_POST['meta'];


    $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
     mysqli_set_charset($db,"utf8");
    $query = "INSERT INTO trasa(data,ilosckm,start,meta)
     VALUES('$data','$ilosckm','$start','$meta')";
    mysqli_query($db, $query)or die("1") ;

    }
  ?>
		<div class="container">

				<form id="contact" action="" method="post">
				  <h3>Dane</h3>
				  <h4>Wprowadzanie Trasę </h4>
				  <fieldset>
					<input placeholder="Data" name="data" type="date" tabindex="1" required autofocus>
				  </fieldset>
				  <fieldset>
					<input placeholder="Ilość kilometrów" name="ilosckm" type="number" tabindex="1" required autofocus>
				  </fieldset>
				  <fieldset>
					<input placeholder="Start"  type="text" name="start"  tabindex="2" required>
				  </fieldset>
				  <fieldset>
					<input placeholder="Meta" type="text" name="meta"  tabindex="2" required>

				  </fieldset>
				  <fieldset>
					<button name="zapisz" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
				  </fieldset>
				</form>
		  </div>
  </div>

</body>
</html>
