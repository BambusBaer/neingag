<?php
    session_start(); 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>neingag</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css"/>
		<link rel="icon" type="image/png" href="images/logo.png">
	</head>
	<body>
	<header>	
		<!-- check if the user is logged in, then display either menu with login/register or logout/profile/upload -->
		<?php
			if(!isset($_SESSION['userid']))
				include('menu.php');
			else 
				include('menu2.php');
		?>
	</header>
	<nav class="sideNav">
		<ul>
			<li><a class="selected" href="#">Start</a></li>
			<li><a href="lamest.php">Lamest</a></li>
			<li><a href="newest.php">Newest</a></li>
		</ul>
	</nav>
	<?php
	$sort = 0;	
	include('content.php');	
	include('footer.php');
	?>
	</body>
</html>