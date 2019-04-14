<?php include('serwer.php') ?>
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
		



//$("#myselect" ).val();
?>

<select id="myselect">
    <option value="1">Mr</option>
    <option value="2">Mrs</option>
    <option value="3">Ms</option>
    <option value="4">Dr</option>
    <option value="5">Prof</option>
</select>


<?php
$("#myselect option:selected").text();

?>
