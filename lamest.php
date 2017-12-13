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
	</head>
	<body>
	<header>	
		<!-- check if the user is logged in, then display either menu with login/register or logout/profile/upload -->
		<?php
			session_start();
			if(!isset($_SESSION['userid']))
				include('menu.php');
			else 
				include('menu2.php');
		?>
	</header>
	<article>
		<section>
			lamest shown here
		</section>
	</article>
	<?php
	include('menu3.php');	
	include('content.php');	
	include('footer.php');
	?>
	</body>
</html>