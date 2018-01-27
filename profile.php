<?php
    session_start(); 
    $pdo = new PDO('mysql:host=localhost;dbname=neinGag', 'root', '');
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8" >
		<title>neingag</title>
		<link href="./css/style.css" rel="stylesheet" type="text/css"/>
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
	<?php
	include('menu3.php');	
	include('footer.php');
	?>
	
		<article>
			<section class="profilePic_profil">
			<?php

				$sql = "SELECT * FROM users WHERE nickname = '$_SESSION[userid]'";
				$profilePic = $pdo->query($sql)->fetch(); 

				//user has a profile pic
				if($profilePic['profilePic'])
					echo '<section>'.'<img src="users/'.$profilePic['nickname'].'/'.$profilePic['profilePic'].'"width="100%">'.'</section>';	
				
				//default profile pic
				else 
					echo '<section class="profilePic_profil">'.'<img src="users/noPic.jpg" width="20%">'.'</section>';
			
			?>
		
				<!--add profile Pic-->
				<a href="upload.php?profPic=1">+ neues Profilbild</a>
			</section>

			<!--user informations-->
			<section class="userInformations">
				<p>Vorname: </p>
				<p>Nachname: </p>				
				<p>Alter: </p>
			</section>
		</article>
	</body>
</html>