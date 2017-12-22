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
			<?php
				$newestPost = 5; 

				$sql = "SELECT * FROM images ORDER BY imageId DESC LIMIT $newestPost"; 
				foreach($pdo->query($sql) as $user){
					echo '<div class="images">'.'<img src="users/'.$user['userName'].'/'.$user['userName'].'_'.$user['userImagenumber'].'.'.$user['datatype'].'" height="90%" width="80%">'.'<br/>';  
				}
			?>
		</section>
	</article>
	<?php
	include('menu3.php');	
	include('content.php');	
	include('footer.php');
	?>
	</body>
</html>