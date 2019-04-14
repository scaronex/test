<?php include('serwer.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="stylelog.css">
</head>
<body>
  <div class="header">
  	<h2>Zlecenie zapisane</h2>
  </div>

  <form method="post" action="Dane.php">
<?php include('errors.php'); ?>



  	<div class="input-group">
  		<button type="submit" class="btn" name="Następne zlecenie">Następne  zlecenie</button>
      <button type="submit" class="btn" name="Następne zlecenie">Następne  zlecenie</button>
  	</div>

  </form>
</body>
</html>
