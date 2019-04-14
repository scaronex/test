<?php
include 'dbconnect.php'?>
<?php
if (isset($_POST['zapisz']))
{

  $rok = $_POST['rok'];
   echo "<p> twoj login to  {$rok} logni </p>" ;
  $mounth = $_POST['mounth'];
   echo "<p> twoj login to  {$mounth} logni </p>" ;
  $login =  $_POST['login'];
   echo "<p> twoj login to  {$login} logni </p>" ;
 
}

?>


<!DOCTYPE html >

<html>
   <head> <title>raport sprzeda?y </title> </head>
     
	  <body>
         <form method="post" action="index.php">
		 
					<div class="fline">
					  <div class="block1">
						<p>Raport</p>

					<div class="fline">

							<select name="rok">
							  <option value="2019">2018</option>
							  <option value="2019">2019</option>
							  <option value="2020">2020</option>
							  <option value="2021">2021</option>
							  <option value="2022">2022</option>
							</select>
							
						   <select name="mounth">
							  <option value="01">stycze?</option>
							  <option value="02">luty</option>
							  <option value="03">marzec</option>
							  <option value="04">kwiecie?</option>
							  <option value="05">maj</option>
							  <option value="06">czerwiec</option>
							  <option value="07">lipiec</option>
							  <option value="08">sierpien</option>
							  <option value="09">wrzesien</option>
							  <option value="10">pazdziernik</option>
							  <option value="11">listopad</option>
							  <option value="12">grudzien</option>
							</select>

						   
						  <div class="fline-input-l">
								 <label>login</label>
							 <input type="text" name="login"value="<?php echo $login; ?>">
						 </div>


					<div class="fline">
						<div class="Nextz">
							<input type="submit" class="btn" name="zapisz" >
							

						</div>
					</div>
				    </div>
					</div>
        </form>
     <body>
