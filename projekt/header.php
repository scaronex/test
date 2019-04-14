<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="to jest przykład meta danych">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title></title>
		<link rel="stylesheet" href="style.css">

	</head>

	<body>

		<header>
			<nav>
				<a class="header-logo" href="index.php">
					<img src="img/logo.png" alt="logo">
				</a>

				<ul>
					<li><a href="#">home</a></li>
					<li><a href="#">home</a></li>
					<li><a href="#">home</a></li>
					<li><a href="#">home</a></li>
				</ul>



					<form action="includes/login.inc.php" method="post">
				<div class="logowanie">
							<input type="text" name="mailuid" placeholder="Username/E-mail">
				</div>
				<div class="logowanie">
						<input type="password" name="pwd" placeholder="Password">
				</div>
				<div class="logowanie">
						<button type="submit" class="btn" name="login-submit">Login</button>
				</div>
			  	</form>


			   <a class="logout"	href="signup.php">Signup</a>
						<form action="includes/login.inc.php" method="post">
							<button type="submit" class="btn" name="logout-submit">logout</button>
						</form>
			

			</nav>

		</header>
	</html>
