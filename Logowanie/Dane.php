<?php include('serwer.php')?>
<!DOCTYPE html>
<html>
<head>
  <title>Dane</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
if (isset($_POST['zapisz']))
{

  $data = mysqli_real_escape_string($db, $_POST['Data']);
  $cza1 = mysqli_real_escape_string($db, $_POST['czasod']);
  $cza2 = mysqli_real_escape_string($db, $_POST['czasdo']);
  $kli = mysqli_real_escape_string($db, $_POST['Klient']);
  $wyk1 = mysqli_real_escape_string($db, $_POST['Dowykonania']);
  $wyk2 = mysqli_real_escape_string($db, $_POST['Wykonano']);
 
  

  
  if(($_POST['Data']=='0000-00-00')||($_POST['Klient']==''))
    {
      echo '<div style="font-size:1.25em;color:red">Nie podano Klienta Zapis się nie powiódł: </div>';

    }
    else
    {
         
		
         $db = mysqli_connect($host, $login,$pass, $dbname) or die("Błąd połączenia !") ;
          mysqli_set_charset($db,"utf8");
         $query = "INSERT INTO zgloszenie(data,czasod,czasdo,klient,zrodlo,dowyk,wyk)
          VALUES('$data','$cza1','$cza2','$kli','','$wyk1','$wyk2')";	  
		  mysqli_query($db, $query)or die("1") ;
		
		
		       ######### Pobieranie Danych #########
				$spr_klient = ("SELECT * FROM klient ORDER BY klient ASC");
				$query=mysqli_query($db, $spr_klient)or die("2") ;
				
				######### Sprawdzanie czy klient w bazie już istnieje  #########

				while($option = mysqli_fetch_assoc($query))
				{
				        $a=$option['klient'];
						if ($kli == $a )
						{
							$flg =1;
							
						}
						
						
                }
					######### Jeżeli nie istnieje zapisz klienta   #########
				if ($flg !=1)
				{
				 echo $flg;
				 $query1 = "INSERT INTO klient(klient)VALUES('$kli')";
				  mysqli_query($db, $query1)or die("Problemy z zapisem do bazy Klent 1") ;
				 mysqli_close($db);
				 $flg =0;
			    }				   
    }
	######### przekierowania do formularza    #########
	header('location: dane_zap.php'); 
}

?>
<div class="kontener">
    <div class="daneheader">
  	   <h2>Zadanie</h2>
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
              <input type="time" name="czasod" value="<?php echo $cza1; ?>">
           </div>

           <div class="fline-input">
              <label>czas do</label>
              <input type="time" name="czasdo" value="<?php echo $cza2; ?>">
          </div>
    </div>

    <div class="fline">
         <div class="fline-input-klient">
		 
            <label>Klient</label>
            <input type="text" name="Klient" value="<?php echo $kli; ?>">
			<?php

					$q = ("SELECT * FROM klient ORDER BY klient ASC");
					$query=mysqli_query($db, $q)or die("błąd 3") ;
					
					######### Pobieranie Danych #########

					echo '<select name="dane">';
					echo '<option value="">Klient</option>';
					while($option = mysqli_fetch_assoc($query))
					{
					echo '<option value="'.$option['id'].'">'.$option['klient'].'</option>';
					}
					echo '</select>';
					
					mysqli_close($db);
			?>	
			
        </div>
    </div>

    <div class="fline">
      <div class="block1">
        <p>Żródło zgłoszenia</p>
      </div>
        <div class="block1">
              <input type="radio" name="rodzaj" value="Telefoniczne" > Tel
              <input type="radio" name="rodzaj" value="Mailowe"> Email
              <input type="radio" name="rodzaj" value="Portal"> Portal
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
    	      <button type="submit" class="btn" name="zapisz">Zapisz </button>

      	</div>
        <div class="Nextz">
            <button type="buton"class='btn' href="Dane.php">Kolejne</a>
       </div>
    </div>
</div>
</form>
</body>
</html>
